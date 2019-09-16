<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
$header = array();
//$url = "http://localhost/unlockdigitalmarketing.com/lms.unlockdigitalmarketing.com/API/index.php";
$url = "http://localhost/API/index.php";
$request = array(
    'SMTPDebug' => 0,
    'to'=> array(
            'email' => 'ankit.vasoya@yahoo.in',
            'name'  => 'suchit'
        ),
    'subject'=>'',
    'message'=>'Disclosure-documents needs to be signd for sureshot 10010 on pride2892.info/abPo 111',
    'SMTPS' => array(
       'hostname' => 'localhost',
        'port' => '25',
        'username' => 'richard-roberts@take3335pd.us',
        'password' => 'balaji#5588',
        'from_email' => 'richard-roberts@take3335pd.us',
        'from_name' => 'richard-roberts',
        'reply_to' => 'richard-roberts@take3335pd.us',
        'reply_to_name' => 'august',
        ),
		'content_type' => 'text/plain',  //  text/plain   text/html
		'x_type' => '3',
		//'x_type_value' => 'Horde Application Framework 5'
		'x_type_value' => 'Horde Mail'
    );

$request = http_build_query($request);
$post = post_curl($url, $request, $header, $time = 10, $post_type=1);
print_r($post);

function post_curl($url, $request, $header, $time = 10, $post_type=1){
        $responce = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST,$post_type);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $time);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $result = curl_exec($ch);
        $p_time = curl_getinfo($ch);
        if (curl_errno($ch)) {
            $result =  "CURL ERROR: ".curl_error($ch);
        }
        elseif(empty($result)){
            $result =  "Blank Response. - ($time secs)"; // Timeout in $time secs 
        }
        curl_close($ch);
        $responce['res'] = $result;

        $responce['posttime'] = $p_time['total_time'];

        return $responce;

}

