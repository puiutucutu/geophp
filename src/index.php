<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . "constants.php";

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(__DIR__),
    RecursiveIteratorIterator::SELF_FIRST
);

/**
 * @var $file \SplFileInfo
 */
foreach ($iterator as $file) {
    if ($file->getExtension() === "php" && $file->getRealPath() !== __FILE__) {
        require_once $file->getRealPath();
    }
}