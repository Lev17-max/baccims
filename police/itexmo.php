<?php

// $num = $_POST['num'];
// $mess = $_POST['mes'];
$num = '09055193650';
$mess = 'hi';
include 'api_msg_details.php';
 

function itexmo($number, $message, $apicode, $passwd)
	{
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
	}


        checkapi($apicode);   
    //    foreach ($arr as $key => $value) {
    //        # code...
    //        echo $key;
    //    }    


       function checkapi($apicode)
       {
           $url = 'https://www.itexmo.com/php_api/apicode_info.php?apicode='.$apicode;
           $data =  json_decode(file_get_contents($url, false));
           if(is_array($data)){
            
            echo $data;
           }else{
               return 'This is not array';
           }
       }
        // $result = itexmo($num, $mess, strval($apicode), strval($pass));
        // if ($result == ""){
        //     echo "iTexMo: No response from server!!!
        //     Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        //     Please CONTACT US for help. ";	
        //     }else if ($result == 0){
        //     echo "Message Sent!";
        //     }
        //     else{	
        //     echo "Error Num ". $result . " was encountered!";
        //     }


        




    ?>
