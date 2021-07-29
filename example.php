<?php

/*
 * Example Telegram bot message sending
 */
 
include 'TelegramBot.php';
 
$bot = new TelegramBot();
$text = "My Example Text\nSended from TelegramBot";

/* send simple text message */
$bot->preSendMessage($text);