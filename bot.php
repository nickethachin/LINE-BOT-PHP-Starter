<?php
$access_token = 'kXXzJ4XLZiWRFdUWsDE4NyRYZgCKOB87Ojp564pJzYm6TH0H6pFvctA+XLqv4g15BMYBahaKHtnjIp6sovWaPPxOL06fPsyyLuXaW577BvQVVtkePiATciJ8nXalao65DOG978SCxt2OYqpZL4j3IwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

            if($text=='!code'){
                $messages = [
                    'type' => 'text',
                    'text' => 'วิธีใส่โค้ดนะครับ\n1.) กดเปลี่ยนชื่อ\n2.) ใส่โค็ดลงในช่องเปลี่ยนชื่อ\n3.) กดเช็คเฉยๆ ไม่ต้องกดเปลี่ยนชื่อ\n*ถ้าเผลอกดเปลี่ยนชื่อระวังเสียเพชรฟรีนะครับ*',
                    'text' => 'โค้ดที่ใช้ได้ในปัจจุบันมี 3 โค้ด\n##street\n##gangster\n##train'
                ];
            };

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
            ];

			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
