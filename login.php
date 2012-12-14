<?php

require_once(__DIR__ . '/config/bootstrap.php');

$pageTitle = "Se connecter";
require_once(__DIR__ . '/templates/header.php');

if (isset($_SESSION['user'])) {
    header('Location: /index.php');
}

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = $em->getRepository('User')->findOneBy(array(
        'username' => $username,
        'password' => md5($password),
    ));
    
    if (is_null($user)) {
        $formErrors = 'Invalid user';
    } else {
        $_SESSION['user'] = $user;
        header('Location: /index.php');
    }
}
?>

<p style="color:red;font-weight:bold;"><?php echo @$formErrors ?></p>

<form action="" method="POST">
    <p>
        <label>Username</label>
        <input type="text" name="username" id="" value="" />
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password" id="" value="" />
    </p>
    <p>
        <a href="/register.php" class="btn danger">register</a>
        <input type="submit" name="submit" id="" value="Login!" 
               class="btn primary"/>
    </p>
</form>

<?php
require_once(__DIR__ . '/templates/footer.php');