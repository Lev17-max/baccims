<?php


 //check number of message left
 function checkServer($apicode)
 {
     $url = 'https://www.itexmo.com/php_api/apicode_info.php?apicode=' . $apicode;
     $data =  json_decode(file_get_contents($url), true);
     return $data;
 }

 //send message
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

///user this lines
//  if ($number_of_ms_left > 0) {
//     $result = itexmo($msg, $num, $apicode, $pass);
//     if ($result == 1) {
//         return 204;
//     } else {
//         return 404;
//     }
// } else {
//     return 504;
// }


// foreach ($arr as $array) {
//     foreach ($array as $key => $value) {
//         if ($key === 'MessagesLeft') {
//             $number_of_ms_left = $value;
//         }
//     }
// }



//
?>