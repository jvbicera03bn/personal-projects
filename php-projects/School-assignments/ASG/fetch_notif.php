<?php
require "dbcon.php";

foreach($_SESSION['chats'] as $chat){
    if($chat['sender_id'] == $_SESSION['acc_info']['id']){?>
        <p class="sender"><?=$chat["message_content"]?></p>
<?php   }else{?>
        <p class="reciever"><?=$chat["message_content"]?></p>          
<?php   }}?>

?>
