<?php
// bootstrap.php
if (!class_exists("Doctrine\Common\Version", false)) {
    require_once "bootstrap_doctrine.php";
}

require_once __DIR__ . '/../Entity/User.php';
require_once __DIR__ . '/../Entity/Post.php';
require_once __DIR__ . '/../Entity/Category.php';
require_once __DIR__ . '/../Repository/PostRepository.php';

session_start();

