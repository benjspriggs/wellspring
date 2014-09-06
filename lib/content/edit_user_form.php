<?php
$STH = new StatementHandler($PDO);
$User = new User($STH);
$r = $User->getUserInfo(Input::get('user_id'));
$name = $r['username'];
$email = $r['email'];
?>

<div id="editcont">
    <h3>Edit account details for <?=$name?></h3>
    <form id="editform" enctype="multipart/form-data" action="loading.php" method="POST">
        <ul>
            <input name="username" id="username" value="<?=$name?>" placeholder="Username"><br>
            <input name="npassword" id="password" type="password" placeholder="New password"><br>
            <input name="npassword_again" id="password_again" type="password" placeholder="New password again"><br>
            <input name="email" id="email" placeholder="E-mail"><br>
            <input name="email" id="email" placeholder="E-mail again" autocomplete="off"><br>
            <input name="password" id="password" type="password" placeholder="Password" title="To verify changes made to your account, please enter your old password again." required><br>
        </ul>
        <div id="submit">
            <input type="submit" name="submit" value="Update">
        </div>
        <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
        <input type="hidden" id="token" name="token" value="<?=$token?>">
        <input type="hidden" id="action" name="action" value="updateUser">
    </form>
    <form id="deleteform" action="loading.php" method="POST">
        <div id="delete">
            <input type="submit" name="delte" value="Delete User">
            <input type="hidden" id="info" name="info" value="<?=htmlspecialchars(json_encode($r))?>">
            <input type="hidden" id="action" name="action" value="deleteUser">
            <input type="hidden" id="token" name="token" value="<?=$token?>">
        </div>
    </form>
</div>