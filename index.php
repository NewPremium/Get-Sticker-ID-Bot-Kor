<?php
/* Telegram Bot Info */
define('TOKEN', 'ABC');
define('NAME', 'Get Sticker id');

require './class.telegram.php';
$bot = new Telegram(TOKEN, NAME);

// Incoming update
$request = json_decode(file_get_contents('php://input'), true);
if ($request['update_id'] && isset($request['message']['sticker']['file_id'])) {
	// Message received
	$bot->sendMessage($request['message']['chat']['id'], 'Hey '.$request['message']['from']['first_name'].', the Sticker ID you are asking for is: '.$request['message']['sticker']['file_id']);
}
if ($_GET['setHook']) {
	// uncomment, type in your webhook domain and visit example.com/path/to/bot/?setHook=1 to register the hook
	echo $bot->setWebhook('https://example.com');
}

