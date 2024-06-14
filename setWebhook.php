<?php
require 'vendor/autoload.php';

use Telegram\Bot\Api;

$telegram = new Api('TELEGRAM_BOT_TOKEN');
$url = 'https://cb37-49-36-33-3.ngrok-free.app';  // Replace with your actual public URL
$telegram->setWebhook(['url' => $url]);

echo "Webhook set to $url";
