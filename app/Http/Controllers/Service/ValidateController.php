<?php


namespace App\Http\Controllers\Service;


use App\Entity\Redis;
use App\Entity\User;
use App\Http\Controllers\Controller;
use App\Tool\Validate\ValidateCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateController extends Controller
{
    //验证注册链接
    public function validateEmail(){
        $id = $_GET['id'];
        $code = $_GET['code'];
        $redis = new Redis();
        $k = 'retailer' . $id;
        $codee = $redis->redisGet($k);
        if($id == '' || $code == ''){
            return '验证异常';
        }

        $tempEmail = User::where('id', $id)->select('create_time')->get();
        $tempEmail = json_decode($tempEmail);
        if($tempEmail == null){
            return '验证异常';
        }

        if($codee == $code){
            if((time()-strtotime($tempEmail[0]->create_time)) > 8640000){
                return '该链接已失效';
            }

            $member = User::find($id);
            $member->status = 1;
            $member->save();

            return redirect('index/login');
        }else{
            return '该链接已失效';
        }
    }

    public function create(Request $request)
    {
        $validateCode = new ValidateCode;
        $request->session()->put('validate_code', $validateCode->getCode());
        return $validateCode->doimg();
    }

    public function validateRegister($data){
        $validator = Validator::make($data, [
            // 如何在这里转换数据
            'nameNick' => 'required|min:2|max:10',
            'email' => 'required|email',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'nameNick.required' => '请填写名称',
            'email.required' => '请填写邮箱',
            'password.required' => '请填写密码',
            'password_confirmation.required' => '请二次填写密码',
            'captcha.required' => '请填写验证码',
            'nameNick.min' => '名称最少输入2位',
            'nameNick.max' => '名称最多输入10位',
            'email.email' => '邮箱格式错误',
            'password.min' => '密码最少6位',
            'password.max' => '密码最多15位',
            'password.confirmed' => '两次密码输入不一致',
            'captcha.captcha' => '验证码错误',
        ]);

        if($validator->fails()){
            return $validator->messages();
        }
    }

    public function validateLogin($data,$field){
        $domain = strstr($data['account'], '@');
        if($domain){
            $validator = Validator::make($data, [
                // 如何在这里转换数据
                'account' => 'required|email',
                'password' => 'required',
            ],[
                'account.required' => '请填写邮箱',
                'password.required' => '请填写密码',
                'account.email' => '邮箱格式错误',
            ]);
        }else{
            $validator = Validator::make($data, [
                // 如何在这里转换数据
                'account' => 'required|min:2|max:10',
                'password' => "required",
            ],[
                'account.required' => '请填写名称',
                'password.required' => '请填写密码',
                'account.min' => '名称最少输入2位',
                'account.max' => '名称最多输入10位',
            ]);
        }

        if($validator->fails()){
            return $validator->messages();
        }
    }

    public function checkEmail($email){
        $data['email'] = $email;
        $validator = Validator::make($data, [
            // 如何在这里转换数据
            'email' => 'required|email',
        ],[
            'email.required' => '请填写邮箱',
            'email.email' => '邮箱格式错误',
        ]);

        if($validator->fails()){
            return $validator->messages();
        }
    }

    public function validatePassword($password,$password_confirmation){
        $data['password'] = $password;
        $data['password_confirmation'] = $password_confirmation;
        $validator = Validator::make($data, [
            // 如何在这里转换数据
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required',
        ],[
            'password.required' => '请填写密码',
            'password_confirmation.required' => '请二次填写密码',
            'password.min' => '密码最少6位',
            'password.max' => '密码最多15位',
            'password.confirmed' => '两次密码输入不一致',
        ]);

        if($validator->fails()){
            return $validator->messages();
        }
    }
}