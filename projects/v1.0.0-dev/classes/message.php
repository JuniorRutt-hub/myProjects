<?php

class Message{

  function constructor(){

  }

  function createNew(){
    global $db;
    $senderId = $this->senderId;
    $message = $this->message;

    $db->query("INSERT INTO messages(sender_id, message) VALUES(?,?);",[$senderId, $message]);
    return $db->insertId();
  }

  static function getMessagesFrom($id) {
    global $db;
    return $db->query("SELECT m.id id, m.message message, m.created_at createdAt, u.nick_name nickName FROM messages m LEFT JOIN users u ON m.sender_id = u.id WHERE m.id > ?",[$id]);
  }

}
