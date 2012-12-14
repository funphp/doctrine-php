<?php

require_once(__DIR__ . '/config/bootstrap.php');

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}

if ($_POST) { // si le formulaire est envoyé
    $id    = $_POST['id'];
    $title = $_POST['title'];
    $body  = $_POST['body'];
    
    $post = $em->find('Post', $_GET['id']);
    $post->setTitle($title);
    $post->setBody($body);
    
    $newCategory = $_POST['newcategory'];
    if ($newCategory != '') {
        $category = $em->find('Category', $newCategory);
        $post->getCategories()->add($category);
    }
    
    $em->persist($post);
//        var_dump($post->getCategories()->getValues());exit;
    $em->flush();
    
    header('Location: /index.php');
} else if (isset($_GET['id'])) { // si on ne fait que visiter la page
    $post = $em->find('Post', $_GET['id']);
    $categories = $em->getRepository('Category')->findAll();
} else {
    header('Location: /index.php');
}

$pageTitle = "Update article";
require_once(__DIR__ . '/templates/header.php');
?>

<h2>Update article</h2>
<form action="" method="POST">
    <p>
        <label>Title</label>
        <input type="title" name="title" id="title" value="<?php echo $post->getTitle() ?>" />
    </p>
    <p>
        <label>Content</label>
        <textarea name="body" cols="" rows="15"><?php echo $post->getBody() ?></textarea>
    </p>
    <p>
        <label>Category</label>
        <select name="newcategory">
            <option value=""></option>
            <?php foreach ($categories as $i=>$category) : ?>
            <option value="<?php echo $category->getId() ?>"><?php echo $category->getName() ?></option>
            <?php endforeach ?>
        </select>
    </p>
    <p>
        <input type="hidden" name="id" value="<?php echo $post->getId() ?>" />
        <input type="submit" name="submit" id="submit" value="Edit" class="btn primary" />
    </p>
</form>

<h2>Delete a category of this article</h2>
<?php if ($post->getCategories()->isEmpty()) : ?>
This article has no category.
<?php else : ?>
<table>
    <?php foreach ($post->getCategories() as $category) : ?>
    <tr>
        <td><?php echo $category->getName() ?></td>
        <td><a href="/deleteCategoryFromPost.php?post_id=<?php echo $post->getId() ?>&category_id=<?php echo $category->getId() ?>" class="btn danger">remove</a></td>
    </tr>
    <?php endforeach ?>
</table>
<?php endif ?>

<?php
require_once(__DIR__ . '/templates/footer.php');