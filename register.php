<?php

require_once(__DIR__ . '/config/bootstrap.php');

$pageTitle = "Register";
require_once(__DIR__ . '/templates/header.php');

if (isset($_SESSION['user'])) {
    header('Location: /index.php');
} 

if ($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = new User();
    $user->setEmail($email);
    $user->setUsername($username);
    $user->setPassword(md5($password));
    
    $em->persist($user);
    $em->flush();
    
    header('Location: /login.php');
}
?>

<form action="" method="post">
    <p>
        <label>Username</label>
        <input type="text" name="username" id="username" value="" />
    </p>
    <p>
        <label>Email</label>
        <input type="text" name="email" id="email" value="" />
    <p>
        <label>Password</label>
        <input type="password" name="password" id="" value="" />
    </p>
    <p>
        <input type="submit" name="submit" id="" value="Register" />
    </p>
</form>

<?php
require_once(__DIR__ . '/templates/footer.php');