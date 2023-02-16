<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FactoHubAzureWebService extends ServiceBase
{

    
    public static function getSession(){
        $apiURLLogin= "http://factohubdemo.azurewebsites.net/api/web/login";
        $user_id="testnew";
        $password="testnew";
    
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $apiURLLogin);
        
        // save cookies to 'public/cookie.txt' you can change this later.
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['username'=>$user_id,'password'=>$password]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,'false');
        //curl_exec($ch);

        $result= curl_exec($ch);
        $message = curl_errno($ch) === CURLE_OK ? 'success' : 'failure';
        //dd($data);
        $data=json_decode($result);
        //return $data;
        //dd($data);

        //store session
        
        $user=\App\User::find(Auth::user()->getKey());
        $user->xsessionid = $data->sessionid;
        $user->xexpires = $data->expires;
        $user->save();
        
    }

    public static function optimize($parameters){
      $user=\App\User::find(Auth::user()->getKey());
      $sessionid= $user->xsessionid;
      $expires = $user->xexpires;
      $reqVars=json_encode($parameters);
      //dd($sessionid);
      //dd($reqVars);
      
      $apiURLOptimizer= "http://factohubdemo.azurewebsites.net/api/web/forms/optimize";
      
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $apiURLOptimizer);
      
      // save cookies to 'public/cookie.txt' you can change this later.
      curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
      curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'x-sessionid'=>$sessionid,
        'x-expires'=>$expires,
        'reqVars'=>$reqVars
        
      ]);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,'false');
      //curl_exec($ch);

      $result= curl_exec($ch);
      //curl_close ($ch);
      $httpcode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
      echo 'HTTP code: ' . $httpcode;
      var_dump($reqVars);
      var_dump($result);
      
      //dd($data);
      $data=json_decode($result);
      //return $data;
      dd($data);
      
      
  }
}