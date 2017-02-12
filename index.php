<?php
 
define('BOT_TOKEN', '<Token-bot>');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
header("Content-Type: application/json");

if(isset($update["callback_query"])) {
  $parameters["method"] = "answerCallbackQuery";
  $parameters["callback_query_id"] = $update["callback_query"]["id"];
  $parameters["url"] = "<url-html>";
  echo json_encode($parameters);
  
  die;
}
$parameters = array('chat_id' => $chatId);
$parameters["method"] = "sendGame";
$parameters["game_short_name"] = "prova";

echo json_encode($parameters);

?>
