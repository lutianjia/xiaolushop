<?php


namespace App\Http\Controllers\Service;


use App\Entity\Admin;
use App\Entity\History_login;
use App\Entity\Product_category;
use App\Entity\Redis;
use App\Entity\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\qq_connect\Oauth;
use App\Http\Controllers\qq_connect\QC;
use App\Http\Controllers\View\Index\IndexController;
use App\Models\M3Result;
use App\Tool\UUID;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use function Symfony\Component\Console\Tests\Command\createClosure;


class LoginController extends Controller
{
    public function login(Request $request){
        $account = $request->input('account', '');
        $password = $request->input('password', '');
        $validate_code = $request->input('validate_code','');
        $remember = $request->input('remember','');
        $m3_result = new M3Result();

        $validate_code_session = $request->session()->get('validate_code');
//        var_dump($validate_code_session);
//        if($validate_code != $validate_code_session){
//            $m3_result->status = 6;
//            $m3_result->message = '验证码不正确';
//            return $m3_result->tojson();
//        }
        $admin = Admin::where('account', $account)->first();
        $result = $this->checkLogin($admin,$password,$request->ip());
        $re = json_decode($result, true);
        if($re["status"] == 0){
            $request->session()->put('member',$admin);
            if($remember){
                $request->session()->put("account", $account, time()+3600*24*7);
                $request->session()->put("password", $password, time()+3600*24*7);
            }
            $ip = $request->ip();
            $this->update_admin($ip,$admin->id);
        }
        if($result == 2){
            $m3_result->status = 2;
            $m3_result->message = '该用户不存在';
            return $m3_result->toJson();
        }else if($result == 3){
            $m3_result->status = 3;
            $m3_result->message = '密码错误';
            return $m3_result->toJson();
        }else if($result == 4){
            $m3_result->status = 4;
            $m3_result->message = '该用户已被禁用';
            return $m3_result->toJson();
        }else if($result == 0){
            $m3_result->status = 0;
            $m3_result->message = '登陆成功';
            return $m3_result->toJson();
        }
    }

    public function qqLogin(){
        $oauth = new Oauth();
        $oauth->qq_login();
    }

    public function qqCallback(Request $request){
        //请求accesstoken
        $oauth = new Oauth();
        $accesstoken = $oauth->qq_callback();
        //获取open_id
        $openid = $oauth->get_openid();
        //根据accesstoken和open_id获取用户的基本信息
        $qc = new QC($accesstoken,$openid);
        $userinfo = $qc->get_user_info();

        $user = new User();
        $isToken = $user->checkToken($openid);
        $userId = session('retailer.id');

        if($isToken == 0){
            if($userId != ''){
                $data['token'] = $openid;
                $data['qqPro'] = 0;
                DB::table('user')->where('id',$userId)->update($data);
            }else{
                $data['token'] = $openid;
                $data['nameNick'] = $userinfo['nickname'];
                $data['status'] = 1;
                $data['email'] = "";
                $data['password'] = "";
                $data['money'] = 0;
                $data['create_time'] = time();
                $data['update_time'] = time();
                $id = DB::table('user')->insertGetId($data);
                $request->session()->put("retailer.id", $id, time()+3600*24*7);
                $request->session()->put("retailer.account", $userinfo['nickname'], time()+3600*24*7);
            }
        }else{
            if($userId != ''){
                $user = new User();
                $user1 = $user->getPriceById($userId);
                $user2 = $user->getPriceByToken($openid);
                $d['money'] = $user1[0]->money+$user2[0]->money;
                $d['token'] = $openid;
                $d['qqPro'] = 0;
                $a['status'] = 1;
                $a['money'] = 0;
                DB::table('user')->where('token',$openid)->update($a);
                DB::table('user')->where('id',$userId)->update($d);
            }else{
                $message = $user->getMessageByToken($openid);
                $request->session()->put("retailer.id", $message[0]->id, time()+3600*24*7);
                $request->session()->put("retailer.account", $message[0]->nameNick, time()+3600*24*7);
            }
        }
        echo '<meta http-equiv="refresh" content="1;url=http://shop.nyistqiusuo.cn">';
    }
    function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    public function update_admin($ip,$id){
        $login_time = time();
        $data['login_time'] = $login_time;
        $data['ip'] = $ip;
        DB::table('admin')->where('id',$id)->update($data);
    }

    public function checkLogin($admin,$password,$ip){
        $historyLogin = new History_login();
        if(($admin == null) || ($admin->status == -1)){
            return 2;
        }else if($admin->status == 0){
            return 4;
        }else{
            if(md5($password.config('solt.password_pre_halt')) != $admin->password){
                $data['username'] = $admin->username;
                $data['admin_id'] = $admin->id;
                $data['ip'] = $ip;
                $data['content'] = '密码错误';
                $historyLogin->insertIntoTable($data);
                return 3;
            }
            $data['username'] = $admin->username;
            $data['admin_id'] = $admin->id;
            $data['ip'] = $ip;
            $data['content'] = '登陆成功';
            $historyLogin->insertIntoTable($data);
            return 0;
        }
    }

    public function loginOut(Request $request){
        $request->session()->forget('member');
        $m3_result = new M3Result();
        $m3_result->status = 0;
        $m3_result->message = '退出成功';
        return $m3_result->tojson();
    }

    //商城注册
    public function indexRegister(Request $request){
        $data = $request->input();
        unset($data['_token']);
        $validate = new ValidateController();
        $result = $validate->validateRegister($data);
        if($result){
            return json_encode($result);
        }
        $m3_result = new M3Result();
        $user = new User();
        $result = $user->checkRegister($data['email']);
        if($result){
            $m3_result->status = 1;
            $m3_result->message = '该邮箱已经注册';
            return $m3_result->toJson();
        }
        $data['password'] = md5($data['password'].config('solt.password_pre_halt'));

        unset($data['password_confirmation']);
        unset($data['captcha']);
        $data['create_time'] = time();
        $data['update_time'] = time();
        $id = DB::table('user')->insertGetId($data);
        if($id){
            //创建随机数码
            $code = UUID::create();
            $redis = new Redis();
            $k = 'retailer' . $id;
            $redis->redis($k,$code);
            $sendEmail = new SendEmailController();
            $result = $sendEmail->sendemail($id,$data['email'],$code);
            if($result){
                $m3_result->status = 0;
                $m3_result->message = '提交成功，注意查收邮件';
                return $m3_result->toJson();
            }
        }
    }

    //商城登录
    public function indexLogin(Request $request){
        $account = $request->input('account');
        $password = $request->input('password');
        $check = $request->input('check');

        $data['account'] = $account;
        $data['password'] = $password;
        $validate = new ValidateController();
        $m3_result = new M3Result();
        $user = new User();
        $domain = strstr($data['account'], '@');
        if($domain){
            $passwordId = $user->getPasswordByEmail($account);
        }else{
            $passwordId = $user->getPasswordByAccount($account);
        }
        $password = $passwordId->password;
        $id = $passwordId->id;
        $token = $passwordId->token;
        $qqPro = $passwordId->qqPro;
        $this->checkQqBind($token,$qqPro,$id);
        $data['password'] = md5($data['password'].config('solt.password_pre_halt'));
        $result = $validate->validateLogin($data,$password);
        if(empty($password)){
            if(empty($result->account)){
                $result->account[0] = '该账号不存在！';
            }
            return json_encode($result);
        }
        if($result){
            $result = json_decode($result);
            if($data['password'] != $password){
                $result->password[0] = '密码输入错误！';
            }
            return json_encode($result);
        }
        if($check){
            $request->session()->put("retailer.account", $passwordId->nameNick, time()+3600*24*7);
            $request->session()->put("retailer.password", $data['password'], time()+3600*24*7);
            $request->session()->put("retailer.id", $id, time()+3600*24*7);
        }
        $m3_result->status = 0;
        $m3_result->message = '登录成功！';
        return $m3_result->toJson();
    }

    public function checkQqBind($token,$qqPro,$id){
        $data = 0;
        if($token == ''){
            $data = 1;
        }
        $user = User::find($id);
        $user->qqPro = $data;
        $user->save();
    }

    //忘记密码，接收邮箱
    public function getEmail(Request $request){
        $email = $request->input('email');
        $validate = new ValidateController();
        $m3_result = new M3Result();
        $user = new User();
        $result = $validate->checkEmail($email);
        if($result){
            return json_encode($result);
        }
        $result = $user->checkRegister($email);

        if(empty($result)){
            $m3_result->status = 1;
            $m3_result->message = '该邮箱尚未注册！';
            return $m3_result->toJson();
        }else{
            $message = $user->getMessageByEmail($email);

            $id = $message[0]->id;

            $sendEmail = new SendEmailController();
            $sendEmail->sendEmailCode($email);
            $m3_result->id = $id;
            $m3_result->status = 0;
            $m3_result->message = '提交成功，注意查收邮件';
            return $m3_result->toJson();
        }
    }

    //修改密码
    public function changePassword(Request $request){
        $password = $request->input('password','');
        $oldPassword = $request->input('oldPassword','');
        $password_confirmation = $request->input('password_confirmation','');
        $id = $request->input('id','');
        if($id == ''){
            $id = $request->session()->get('retailer.id');
        }
        $code = $request->input('code','');
        $user = new User();
        $m3_result = new M3Result();
        $redis = new Redis();
        if($code != ''){
            $res = $user->checkCode($code,$id);
            if(!$res){
                $m3_result->status = 1;
                $m3_result->message = '验证码错误';
                return $m3_result->toJson();
            }
        }

        $validate = new ValidateController();
        $m3_result = new M3Result();
        $result = $validate->validatePassword($password,$password_confirmation);
        if($result){
            return json_encode($result);
        }
        if($oldPassword){
            $userMessage = $user->getMessageById($id);
            if($userMessage[0]->password != md5($oldPassword.config('solt.password_pre_halt'))){
                $m3_result->status = 1;
                $m3_result->message = '旧密码错误';
                return $m3_result->toJson();
            }
        }
        $user = User::find($id);
        $user->password = md5($password.config('solt.password_pre_halt'));
        $result = $user->save();
        if($result){
            if($code != ''){
                $redis->del($res);
            }
            $m3_result->status = 0;
            $m3_result->message = '修改成功';
            return $m3_result->toJson();
        }
    }

    //商城退出
    public function indexLoginOut(Request $request){
        $request->session()->forget('retailer.account');
        $request->session()->forget('retailer.password');
        $request->session()->forget('retailer.id');
        return redirect('/index/login');
    }
}