<?php


$list = "list.txt";
$config = "config.txt";
$lines = file($list);
$no_of_lines = count(file($list));

for ($l=0;$l<$no_of_lines;$l++)
{
$site[$l] = $lines[$l] ;
$site[$l] = preg_replace('/\s+/', '', $site[$l]);
$txt[$l] = substr($site[$l], strrpos($site[$l], '/') + 1);
}

for ($i=0;$i<$no_of_lines;$i++)
{
$content[$i] = file_get_contents((($site[$i])));
$price[$i] = search('close":"', '"', $content[$i]);
$txt[$i] = $txt[$i] . ": ".$price[$i][0];


$params = file($config);
$token = $params[0];
$token = preg_replace('/\s+/', '', $token);
$chatid = $params[1];
$chatid = preg_replace('/\s+/', '', $chatid);

sendMessage($chatid, $txt[$i], $token);
}


sendMessage($chatid, "------------------------", $token);

function sendMessage($uid, $txt, $tok) 
{


$url = 'https://api.telegram.org/bot' . $tok . '/sendMessage?chat_id=' . $uid . '&text=' . $txt;
echo "$url";

$api_url = $url;
$ch = curl_init( );
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_TIMEOUT, 5 );
curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 5 );                                 
$response_string = curl_exec( $ch );

echo $response_string;
}


function search($bas, $son, $yazi){ 
    preg_match_all('/' . preg_quote($bas, '/') .'(.*?)'. preg_quote($son, '/').'/si', $yazi, $m); 
    return $m[1]; 
    }  

?>