<?php
/**
 * Front controller
 */

session_start();

/**
 * Requirement for database
 */
require_once __DIR__ . '/../app/setup.php';

use Itb\MainController;

/**
 * get action GET parameter (if it exists)
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

/**
 * create an Instance of MainController
 */
$mainController = new MainController();

if ('contact' == $action) {
    $mainController->contactAction();
} else if ('services' == $action) {
    $mainController->servicesAction();
} else if ('login' == $action) {
    $mainController->loginAction();
} else if ('register' == $action) {
    $mainController->registerAction();
} else if ('logout' == $action) {
    $mainController->logoutAction();
} else {
    // default is home page ('index' action)
    $mainController->indexAction();
}
