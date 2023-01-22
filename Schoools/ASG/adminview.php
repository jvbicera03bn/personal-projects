<?php
require 'dbcon.php'; 
session_start();
if (!isset($_SESSION['acc_info'])){
    header('location:index.php');
}
$user_info = fetch_all("SELECT id,fname,lname,email,acc_status FROM grping_users ORDER BY acc_status ASC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminview.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="func.js"></script>
    <title>Administrator</title>
</head>
<body>
    <main>
        <div id="top_section">
        <section id="profile">
            <h1>Welcome Administrator</h1>
            <h3>Full Name</h3>
            <p><?=ucfirst($_SESSION['acc_info']['fname'])." ".ucfirst($_SESSION['acc_info']['lname'])?></p>
            <h3>Email</h3>
            <p><?=ucfirst($_SESSION['acc_info']['email'])?></p>
            <form action="process.php" method="POST">
                <input id="logout"type="submit" value="Log Out" name="log_out">
            </form>
        </section>
        <section id="chat_section">
<?php       if(!empty($_SESSION['recipient_info'])){?>
                <h1>Chatting:<?=ucfirst($_SESSION['recipient_info']['fname']).", ".ucfirst($_SESSION['recipient_info']['lname'])?></h1>
<?php       } else{ ?>
                <h1>Chatting: No One</h1>
<?php       }?>
            <div id="chat_box">
<?php       if(isset($_SESSION['chats'])){
                foreach($_SESSION['chats'] as $chat){
                    if($chat['sender_id'] == $_SESSION['acc_info']['id']){?>
                        <p class="sender"><?=$chat["message_content"]?></p>
<?php               }else{?>
                        <p class="reciever"><?=$chat["message_content"]?></p>          
<?php       }}}?>
            </div>
            <form action="process.php" method="post">
                <input type="text" name="message" id="message" placeholder="Enter Message Here" require>
                <input type="hidden" name="recipient_user_id" value="<?=$_SESSION['reciever']?>">
                <div id="form_group">
                    <input type="submit" name="send_chat" value="Send">
                    <input type="submit" name="update_chat" value="Update Chat Box">
                </div>
            </form>
        </section>
        </div>
        <section id="attendance">
            <h3>Users List</h3>
            <div id="table_box">
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Online</th>
                        <th>Interact</th>
                        <th>Notification</th>
                    </tr>
                </thead>
                <tbody>
<?php           foreach ($user_info as $user){?>
                    <tr>
                        <td><?=ucfirst($user['id'])?></td>
                        <td><?=ucfirst($user['fname'])?></td>
                        <td><?=ucfirst($user['lname'])?></td>
                        <td><?=ucfirst($user['email'])?></td>
<?php                   if ($user['acc_status'] == "active"){?>
                            <td id="<?=ucfirst($user['acc_status'])?>">✔</td>
<?php                   }else if($user['acc_status'] == "inactive"){?>    
                            <td id="<?=ucfirst($user['acc_status'])?>">✖</td>
<?php                   }?>
<?php                   if($user['id'] !== $_SESSION['acc_info']['id']){?>
                            <td>
                                <form action="process.php" method="post">
                                    <input type="hidden" name="recipient_user_id" value="<?=$user['id']?>">
                                    <input type="submit" value="Chat" name="chat">
                                </form>
                            </td>
<?php                   }else{?>
                            <td id="ur">Your Account</td>
<?php                   }?>
                        <td><?=ucfirst($user['email'])?></td>
                    </tr>
<?php           }?>
                </tbody>
            </table>
            </div>
        </section>
    </main>
</body>
</html>