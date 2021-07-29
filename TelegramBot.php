<?php
/*
 * Example Telegram bot message sending
 */


class TelegramBot
 {
	private $chatId = "<YOUR_CHAT_ID>";
	private $token = "<YOUR_TELEGRAM_TOKEN>";
	
	public $disable_web_page_preview = null;
	public $reply_to_message_id = null;
	public $reply_markup = null;
	
	public $url = "";
	
	public function __construct()
	{
		$this->url = "https://api.telegram.org/bot{$this->token}/sendMessage";
	}
	
	public function preSendMessage(string $text) 
	{
		$paramsEncoded = [ 
		  "chat_id" => urlencode($this->chatId),
		  "text" => $text,
		  "disable_web_page_preview" => $this->disable_web_page_preview,
		  "reply_to_message_id" => $this->reply_to_message_id,
		  "reply_markup" => $this->reply_markup,
		];
		$this->sendMessage($paramsEncoded);
	}
	
	public function sendMessage(array $params)
	{
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_POST, count($params));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		$result = curl_exec($curl);
		curl_close($curl);
	}
	
}