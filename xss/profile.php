<?php
function updateUser($username,$realname){
    $users = json_decode(file_get_contents('data/users.json'), true);
    if(isset($users[$username])){
        $users[$username]['realname'] = $realname;
        file_put_contents('data/users.json', json_encode($users));
    }
}


$u = false;
if(isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $users = json_decode(file_get_contents('data/users.json'), true);
    foreach($users as $user) {
        if($user['cookie'] === $token) {
            $u = $user;
            if(isset($_POST['user'], $_POST['realname'])) {
                updateUser($_POST['user'], $_POST['realname']);
                header('Location: /profile.php');
                exit();
            }
        }
    }
}
if($u) { ?>
<html>
<head>
<title>Profile</title>
<style>
    h1, h2, h4{
        text-align: center;
    }
    .login_box {
        width: 400px;
        margin: 0 auto;
        text-align: center;
        }
</style>
</head>
    <body>
        <h1>Profile</h1>
        <h2>Welcome back <?php echo $u['user'];  ?></h2>
        
        <?php if($u['user'] === 'admin') { ?>
            <h4>iituCTF{cru51f1x_2i7h_c00k1e5}</h4>
       <?php } ?> 
        
        <form action="" method="post">
            <input type="hidden" name="user" value="<?php echo $u['user'];  ?>">
            <div class="login_box">
                <div><input name="realname" value="<?php echo $u['realname'];  ?>"></div>
                <div><input type="submit" value="Update User"></div>
            </div>
        </form>
    </body>
</html>

<?php
} else {
    header('Location: /login.php');
    exit();
}
?>