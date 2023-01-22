<?php
require 'dbcon.php'; 
session_start();
if (!isset($_SESSION['acc_info']) or $_SESSION['acc_info']['status'] !== 'administrator'){
    header('location:index.php');
}
$admin_info = $_SESSION['acc_info'];
$user_info = fetch_all("SELECT id,fname,mname,lname,email,acc_status,student_num,status FROM grping_users ORDER BY acc_status ASC");

if (isset($_POST['send_chat'])){
    $recipient_id = $_POST['recipient_user_id'];
    $query="INSERT INTO `KA95vMzAni`.`grping_chats`(`sender_id`,`reciever_id`,`created_at`,`updated_at`,`message_content`)";
    $values="VALUES('".$admin_info['id']."','".$recipient_id."',now(),now(),'".$_POST['message']."');";
    mysqli_query($connection,$query.$values);
}
if (isset($_POST['chat']) or isset($_POST['update_chat']) or isset($_POST['send_chat'])){
    $recipient_id = $_POST['recipient_user_id'];
    $recipient_name = fetch_one('SELECT fname,mname,lname FROM grping_users WHERE id="'.$recipient_id.'";');
    $get_chats = fetch_all("SELECT message_content,sender_id,reciever_id FROM grping_chats WHERE reciever_id = '".$recipient_id."' AND sender_id = '".$admin_info['id']."' OR reciever_id = '".$admin_info['id']."' AND sender_id = '".$recipient_id."' ORDER BY created_at DESC;");
}   
if(isset($_POST["log_out"])){
    mysqli_query($connection,"UPDATE `KA95vMzAni`.`grping_users` SET `acc_status` = 'inactive' WHERE `id` = '".$admin_info['id']."';");
    session_destroy();
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminview.css">
    <title>Administrator</title>
</head>
<body>
    <main>
        <div id="top_section">
        <section id="profile">
            <h1>Welcome Administrator</h1>
            <h3>Full Name</h3>
            <p><?=ucfirst($admin_info['fname']).", ".ucfirst($admin_info['mname']).", ".ucfirst($admin_info['lname'])?></p>
            <h3>Email</h3>
            <p><?=ucfirst($admin_info['email'])?></p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input id="logout"type="submit" value="Log Out" name="log_out">
            </form>
        </section>
        <section id="chat_section">
<?php       if(!empty($recipient_name)){?>
                <h1>Chatting:<?=ucfirst($recipient_name['fname']).", ".ucfirst($recipient_name['mname']).", ".ucfirst($recipient_name['lname'])?></h1>
<?php       } else{?>
                <h1>Chatting: No One</h1>
<?php       }?>
            <div id="chat_box">
<?php       if(isset($_POST['chat']) or isset($_POST['send_chat']) or isset($_POST['update_chat'])){
                foreach($get_chats as $chat){
                    if($chat['sender_id'] == $admin_info['id']){?>
                        <p class="sender"><?=$chat["message_content"]?></p>
<?php               }else{?>
                        <p class="reciever"><?=$chat["message_content"]?></p>          
<?php       }}}?>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="message" id="message" placeholder="Enter Message Here" require>
                <input type="hidden" name="recipient_user_id" value="<?=$recipient_id?>">
<?php       if(isset($_POST['chat']) or isset($_POST['send_chat']) or isset($_POST['update_chat'])){?>
                <div id="form_group">
                    <input type="submit" name="send_chat" value="Send">
                    <input type="submit" name="update_chat" value="Update Chat Box">
                </div>
<?php       } ?>
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
                        <th>Middle Name</th>
                        <th>Student Number</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Online</th>
                        <th>Interact</th>
                    </tr>
                </thead>
                <tbody>
<?php           foreach ($user_info as $user){?>
                    <tr>
                        <td><?=ucfirst($user['id'])?></td>
                        <td><?=ucfirst($user['fname'])?></td>
                        <td><?=ucfirst($user['lname'])?></td>
                        <td><?=ucfirst($user['mname'])?></td>
                        <td><?=ucfirst($user['student_num'])?></td>
                        <th><?=ucfirst($user['status'])?></th>
                        <td><?=ucfirst($user['email'])?></td>
<?php                   if ($user['acc_status'] == "active"){?>
                            <td id="<?=ucfirst($user['acc_status'])?>">✔</td>
<?php                   }else if($user['acc_status'] == "inactive"){?>    
                            <td id="<?=ucfirst($user['acc_status'])?>">✖</td>
<?php                   }?>
<?php                   if($user['id'] !== $admin_info['id']){?>
                            <td>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="recipient_user_id" value="<?=$user['id']?>">
                                    <input type="submit" value="Chat" name="chat">
                                </form>
                            </td>
<?php                   }else{?>
                            <td id="ur">Your Account</td>
<?php                   }?>
                    </tr>
<?php           }?>
                </tbody>
            </table>
            </div>
        </section>
    </main>
</body>
</html>