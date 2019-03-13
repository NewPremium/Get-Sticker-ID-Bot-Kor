<?php
/* Telegram 봇 정보 */
define('TOKEN', 'ABC');
define('NAME', 'Get Sticker id');

require './class.telegram.php';
$bot = new Telegram(TOKEN, NAME);

// 수신 업데이트
$request = json_decode(file_get_contents('php://input'), true);
if ($request['update_id'] && isset($request['message']['sticker']['file_id'])) {
	// 수신된 메시지
	$bot->sendMessage($request['message']['chat']['id'], '안녕하세요'.$request['message']['from']['first_name'].'님, the Sticker ID you are asking for is 당신이 보낸 스티커의 ID는 : '.$request['message']['sticker']['file_id'])'입니다.';
}
if ($_GET['setHook']) {
	// uncomment, type in your webhook domain and visit example.com/path/to/bot/?setHook=1 to register the hook
	echo $bot->setWebhook('https://example.com');
}

