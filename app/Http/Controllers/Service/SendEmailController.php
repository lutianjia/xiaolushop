<?php


namespace App\Http\Controllers\Service;



use App\Entity\Redis;
use App\Http\Controllers\Controller;
use App\Tool\Rand;
use email\email;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    /*
            * 发送邮箱
            */
    public function sendemail($id,$email,$code){
        $content = '请与24小时点击该连接完成验证. http://shop.nyistqiusuo.cn/service/validate_email' . '?id=' . $id . '&code=' . $code;
        Mail::raw($content,function ($msg) use($email){
            $msg->from('1806955048@nyist.edu.cn');
            $msg->subject('小鹿商城');
            $msg->to($email);
        });
//        $mail = new email();
//        $mail->setServer("smtp.exmail.qq.com", "1806955048@nyist.edu.cn", "257LlTtJj139."); //设置smtp服务器 #1:腾讯企业邮箱账号 #2密码
//        $mail->setFrom("1806955048@nyist.edu.cn"); //设置发件人
//        $mail->setReceiver($email); //设置收件人，多个收件人，调用多次
//        $mail->setMailInfo("retailer", '请与24小时点击该连接完成验证. http://ret.com:8080/service/validate_email'
//            . '?id=' . $id
//            . '&code=' . $code); //设置邮件主题、内容
//        $mail->sendMail(); //发送
        return true;
    }

    public function sendEmailCode($email){
        $rand = new Rand();
        $rand = $rand->rand();
        $redis = new Redis();
        $redis->redis($email, $rand);
        $content = "验证码：" . $rand . "泄露有风险，如非本人操作，请忽略！";
        Mail::raw($content,function ($msg) use($email){
            $msg->from('1806955048@nyist.edu.cn');
            $msg->subject('小鹿商城');
            $msg->to($email);
        });
//        $mail = new email();
//        $mail->setServer("smtp.exmail.qq.com", "1806955048@nyist.edu.cn", "257LlTtJj139."); //设置smtp服务器
//        $mail->setFrom("1806955048@nyist.edu.cn"); //设置发件人
//        $mail->setReceiver($email); //设置收件人，多个收件人，调用多次
//            //      $mail->setCc("XXXX"); //设置抄送，多个抄送，调用多次
//            //      $mail->setBcc("XXXXX"); //设置秘密抄送，多个秘密抄送，调用多次
//        $mail->setMailInfo("验证码", "<b>$rand</b>"); //设置邮件主题、内容
//            //        dump(123);exit;
//        $mail->sendMail(); //发送
        return true;
    }
}