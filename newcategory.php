<?php 

require_once(__DIR__ . '/config/bootstrap.php');

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}

if ($_POST) {
    $category = new Category();
    $category->setName($_POST['name']);

    $em->persist($category);
    $em->flush();
    
    header('Location: /index.php');
}

$pageTitle = "New catégory";
require_once(__DIR__ . '/templates/header.php');
?>

<form action="" method="POST">
    <p>
        <label>Category name</label>
        <input type="text" name="name" id="name" value="" />
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Save" />
    </p>
</form>

<?php
require_once(__DIR__ . '/templates/footer.php');