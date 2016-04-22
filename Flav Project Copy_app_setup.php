<?php
/**
 *
 * This script has been created with the purpose of
 * loading multiple classes in one require statement
 */

//----- autoload any classes we are using ------
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config_db.php';

//------- load in main controller functions -------
require_once __DIR__ . '/../src/MainController.php';