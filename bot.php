<?php
 
$strAccessToken = "kXXzJ4XLZiWRFdUWsDE4NyRYZgCKOB87Ojp564pJzYm6TH0H6pFvctA+XLqv4g15BMYBahaKHtnjIp6sovWaPPxOL06fPsyyLuXaW577BvQVVtkePiATciJ8nXalao65DOG978SCxt2OYqpZL4j3IwdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

if($arrJson['events'][0]['message']['text'] == "bot help"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "nigbot v0.03.03\n\ncode โชว์โค้ดที่ยังใช้ได้\nuser แสดงรายชื่อผู้เล่นที่เข้าไลน์แล้ว";
}
 
else if($arrJson['events'][0]['message']['text'] == "bot myid"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['source']['userId'];
}

else if($arrJson['events'][0]['message']['text'] == "nigbot นายเป็นใคร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ระบบตอบกลับอัตโนมัติ สำหรับจัดเก็บข้อมูลทั่วไปส่วนตัว ถูกเขียนโดยนิก";
}

else if($arrJson['events'][0]['message']['text'] == "bot code"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "วิธีใส่โค้ดนะครับ\n1.) กดเปลี่ยนชื่อ\n2.) ใส่โค้ด\n3.) กดเช็คชื่อ\n*ระวังอย่าเผลอกดเปลี่ยนชื่อนะครับ*";
  $arrPostData['messages'][1]['type'] = "text";
  $arrPostData['messages'][1]['text'] = "โค้ดที่ยังใช้ได้ (20/12/2560)\n##street\n##gangster\n##train";
}

else if($arrJson['events'][0]['message']['text'] == "bot user"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "
  Line : Bright I-Din\nชื่อในเกม : zREMOEOz\nชื่อเล่น : ไบร์ท\n\n
  Line : > Best <\nชื่อในเกม : BzForest\nชื่อเล่น : เบสท์\n\n
  Line : Garfield\nชื่อในเกม : การ์ตูน\nชื่อเล่น : ?\n\n
  Line : nnicke\nชื่อในเกม : Avas\nชื่อเล่น : นิก\n\n
  Line : Ton\nชื่อในเกม : ขาดำ\nชื่อเล่น : ต้น\n\n
  Line : เต้ย\nชื่อในเกม : DGTH\nชื่อเล่น : เต้ย\n\n
  ";
}

else if($arrJson['events'][0]['message']['text'] == "ขอข้อมูลแพร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "นางสาวแพรพรรณ เสลาคุณ 805 บ้านทิพย์เพลส ซอยจรัญสนิทวงศ์ 65 แยก 21 เขต บางพลัด แขวง บางบำหรุ กรุงเทพ 10700 โทร 0823764744";
  $arrPostData['messages'][1]['type'] = "text";
  $arrPostData['messages'][1]['text'] = "นางสาวแพรพรรณ เสลาคุณ ธนาคารกรุงศรีอยุธยา 394 1 18446 0";
}

else if($arrJson['events'][0]['message']['text'] == "ขอข้อมูลนิก"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "นายธชิณ วิสุทธิมรรคกุล 231-232 (204) BKแมนชั่น ม.5 ต.บ้านกร่าง อ.เมือง จ.พิษณุโลก 65000 โทร 0836222054";
  $arrPostData['messages'][1]['type'] = "text";
  $arrPostData['messages'][1]['text'] = "นายธชิณ วิสุทธิมรรคกุล 148 ม.4 ตำบลเนินเพิ่ม อ.นครไทย จ.พิษณุโลก 65120 โทร 0836222054";
  $arrPostData['messages'][2]['type'] = "text";
  $arrPostData['messages'][2]['text'] = "นายธชิณ วิสุทธิมรรคกุล ธนาคารกสิกรไทย 393 255 3324";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>