<?php
// bootstrap.php
if (!class_exists("Doctrine\Common\Version", false)) {
    require_once "bootstrap_doctrine.php";
}

require_once "entities/User.php";
require_once "entities/Post.php";
require_once "entities/Comment.php";

