<?php
// bootstrap_doctrine.php


/**for composer
 * require_once "vendor/autoload.php";

 */

/*
 * for PEAR
 */
use Doctrine\ORM\Tools\Setup;

require_once "Doctrine/ORM/Tools/Setup.php";
Setup::registerAutoloadPEAR();

/**
 * for tarball
 * require 'Doctrine/ORM/Tools/Setup.php';

$lib = "/path/to/doctrine2-orm/lib";
Doctrine\ORM\Tools\Setup::registerAutoloadDirectory($lib);
 */

/**
 * for GTI
 * require 'Doctrine/ORM/Tools/Setup.php';

$lib = '/path/to/doctrine2-orm-root';
Doctrine\ORM\Tools\Setup::registerAutoloadGit($lib);


 */


use Doctrine\ORM\EntityManager;


$isDevMode = true;
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(
    array(__DIR__ . '/../Entity'), $isDevMode
);
// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '123456',
    'dbname'   => 'doctrine_test',
);


$em = EntityManager::create($dbParams, $config);


