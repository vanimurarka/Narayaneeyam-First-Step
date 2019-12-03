<?php

namespace App\Http\Controllers;

use Request, Mail;
use App\Mail\Feedback;

class FeedbackController extends Controller
{
    //
    public function showFeedback(Request $request)
    {
        $file = public_path().'/'.'collected_feedback.txt';
        $feedback = file_get_contents($file);
        return view('feedback',['feedback'=>$feedback]);
    }

    public function receiveFeedback(Request $request)
    {

        $_subject = "Narayaneeyam First Step Feedback";
        $_fileToAddTo = public_path().'/'.'collected_feedback.txt';
        $data = 

        $captchaPassed = false;

        $captcha_url = "https://www.google.com/recaptcha/api/siteverify";
        $params = array();
        $params['secret'] = '6LeKPhYTAAAAAMErVME-KhpSvWuo4TOz_ttC3iT9'; 

        $params['response'] = Request::get('g-recaptcha-response');

        $postData = 'secret='.$params['secret'].'&response='.$params['response']; 

        $output = file_get_contents($captcha_url."?".$postData);
        $json = json_decode($output);
        if($json->success == 1) // captcha passed
            $captchaPassed = true;

        if ($captchaPassed)
        {
            $data = Request::all();
            Mail::to(config('mail.to'))
                ->send(new Feedback($data));

            $fileContents = file_get_contents($_fileToAddTo);
            $fileNewContents = "<div id='feedback'>.<span id='name'>Name: ".$data['name']."</span><span id='date'>".date('l jS \of F Y')."</span><br><br>".$data['comments']." </div>".$fileContents;
            file_put_contents($_fileToAddTo, $fileNewContents);

            return redirect('feedback_thankyou.shtml');
        }
    }
}
