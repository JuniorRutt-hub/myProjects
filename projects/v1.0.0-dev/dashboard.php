<?php

require_once "configuration.php";

$currentuser = Auth::loggedUser();
$allUsers = User::getAll();
if(!$currentuser) {
  header("Location: index.php");
  exit();
}


if(isset($_REQUEST["action"])&&$_REQUEST["action"]=="compose"){
  $message = new Message();
  $message->senderId = $currentuser["id"];
  $message->message = $_REQUEST["message"];
  $message->createNew();
}

$messages = Message::getMessagesFrom(0);


?>
<body>
  <ul>
    <?php if($messages){foreach($messages as $message){?>
      <li><?=$message["nickName"]?>: <?=$message["message"]?> <sub><?=$message["createdAt"]?></sub></li>
    <?php } } ?>
  </ul>
  <ul>
    <?php if($allUsers){foreach($allUsers as $user){?>
      <li><?=$user["nick_name"]?></li>
    <?php } } ?>
  </ul>
  <form method="POST">
    <input type="hidden" name="action" value="compose"/>
    <textarea name="message"></textarea>
    <button>Send Message</button>
  </form>
</body>
