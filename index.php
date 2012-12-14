<?php 
error_reporting(E_ALL);
// charger le fichier de config
require_once(__DIR__ . '/config/bootstrap.php');

// donner un titre à la page
$pageTitle = "Home";

// afficher le header
require_once(__DIR__ . '/templates/header.php');

$posts = $em->getRepository('Post')->findAllOrderedById();
?>

<article style="margin-bottom:4em;">
    <?php foreach ($posts as $i=>$post) : ?>
    <h1><?php echo $post->getTitle() ?></h1>
    <p><?php echo nl2br($post->getBody()) ?></p>
    <hr />
    
    <p style="text-align: right;">
        <a href="/deletepost.php?id=<?php echo $post->getId() ?>"
           class="btn danger">
            Delete article
        </a>
        <a href="/editpost.php?id=<?php echo $post->getId() ?>"
           class="btn success">
            Edit article
        </a>
    </p>
    <?php endforeach; ?>
</article>

<?php
// afficher le footer
require_once(__DIR__ . '/templates/footer.php');