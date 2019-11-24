<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class ShowDashaka extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {
        //

        $path = public_path().'/'.$slug.'.html'; 
        $fileExists = File::exists($path);
        $dashakaNumber = str_replace("dashaka","",$slug); // strip 'dashaka' from slug
        $lang = 'en';
        if (strpos($dashakaNumber, 'h'))
            $lang = 'hi';
        $dashakaNumber = str_replace("h", "", $dashakaNumber); // strip h from slug for hindi if it is there
        $dashakaNumber = (int)$dashakaNumber;
        $dashakaText = '';
        if (($fileExists) && ($dashakaNumber > 0))
        {
            $dashakaText = file_get_contents($path);
            return view('dashaka',['slug'=>$slug,
                'dashakaNumber' => $dashakaNumber,
                'dashakaText' => $dashakaText,
                'lang' => $lang]);
        }
        else
            abort(404);

        
    }
}
