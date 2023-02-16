<?php
namespace App\Services;

class JpnIdentityCheckerService extends ServiceBase
{
    /** user id */
    public $userid="zakiah";
    
    /**
     * app id
     */
    public $appid="eaduan";
    
    /**
     * app secret
     */
    public $appsecret="eaduanpassword";
    
    /**
     * Api URL
     */
    public $apiURL= "http://datajpndev.kpdnhep.gov.my/jwtapi/";

    /**
     * Get mykad info
     * @param $mykad string mykad number
     * @return array mykad info
     */
    public function getMyKadInfo($mykad){
        $response=$this->getToken();
        $res=json_decode($response,TRUE);
        $status=$res['response']['status'];
        $result=$res['response']['result'];
        $token=$result['token'];
        //echo "Status: $status TOKEN=>".$token."\n";

        $ret=$this->getIdentity($token,$mykad);
        $res=json_decode($ret,TRUE);
        $result=$res['response']['result'];
        //var_dump($result);
        return $result;
    }

    /**
     * Get identity info
     * @param $token string access token
     * @param $mykad string mykad
     * @return array mykad info
     */
    private function getIdentity($token,$mykad){
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->apiURL,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{
            \"name\":\"getMyIdentity\",
            \"param\":{
                \"nokp\":\"$mykad\"
            }}",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $token",
            "Content-Type: application/json"
          ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        return $response;
    }
    
     /**
     * Get access token
     * @return array access token
     */
    private function getToken(){
        //global $appid,$appsecret,$apiURL;
        //echo "VARS = $appid,$appsecret \n";
        //exit();
    
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->apiURL,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{
            \"name\":\"generateToken\",
            \"param\":{
                \"user_id\":\"$this->userid\",
                \"app_id\":\"$this->appid\",
                \"app_secret\":\"$this->appsecret\"
            }}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
          ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        return $response;
    }






}
