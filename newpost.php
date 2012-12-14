<?php 

require_once(__DIR__ . '/config/bootstrap.php');

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}

if ($_POST) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    
//    $user = $em->getRepository('User')
//               ->findOneBy(array(
//                   'id' => $_SESSION['user']->getId()
//            ));
    
    $user = $em->getRepository('User')
               ->findOneById($_SESSION['user']->getId());
    
    $post = new Post();
    $post->setTitle($title);
    $post->setBody($body);
    $post->setPoster($user);

    $em->persist($post);
    $em->flush();
    
    header('Location: /index.php');
}

$pageTitle = "New article";
require_once(__DIR__ . '/templates/header.php');
?>

<form action="" method="POST">
    <p>
        <label>Title</label>
        <input type="text" name="title" id="title" value="" />
    </p>
    <p>
        <label>Content</label>
        <textarea name="body" cols="" rows=""></textarea>
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Save" />
    </p>
</form>

<?php
require_once(__DIR__ . '/templates/footer.php');