<?php
//
// Copyright (c) 2019 Daniel Vigano
// MIT-License (see LICENSE file)
//

$token = "YOUR_TOKEN";

function sendMessage($token, $chatid, $text) {
   $sendto = "https://api.telegram.org/bot".$token."/sendmessage?chat_id=".$chatid."&text=".$text;
   file_get_contents($sendto);
}

$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$user = $update["message"]["from"]["first_name"];
$gettext = $update["message"]["text"];

if($gettext == "/start") {

    $text = "Hallo ".$user."!";
    sendMessage($token, $chatID, $text);

}
elseif($gettext == "/date") {
   
   $date = date("d.m.Y - H:i", time());
   sendMessage($token, $chatID, $date);
   
}
elseif($gettext == "/subway") {
    
    $date = date("N", time());
    
    if($date == 1) {
        $text = "ITALIAN B.M.T.";
    }
    elseif($date == 2) {
        $text = "SALAMI";
    }
    elseif($date == 3) {
        $text = "TURKEY";
    }
    elseif($date == 4) {
        $text = "CHICKEN FAJITA";
    }
    elseif($date == 5) {
        $text = "TUNA";
    }
    elseif($date == 6) {
        $text = "TURKEY AND HAM";
    }
    elseif($date == 7) {
        $text = "ROASTED CHICKEN";
    }

    sendMessage($token, $chatID, "Sub des Tages: ".$text);
}
?>
