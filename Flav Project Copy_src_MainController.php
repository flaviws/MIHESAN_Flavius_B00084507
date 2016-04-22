<?php
/**
 * Main Controller of the WebPage
 */

namespace Itb;

/**
 * Class MainController which give functionality to the front controller
 * so that pages can be accessed on a switch basis
 * @package Itb
 */
class MainController
{

    /**
     * Sets the title of the ContactUs page
     * Keeps the highlight on the current page selected in the nav bar
     * Require the contact page
     */
    function contactAction()
    {
        $pageTitle = 'Talk to Us';
        $contactLinkStyle = 'selected';
        require_once __DIR__ . '/../templates/contact.php';
    }

    /**
     * Sets the title of the Index page
     * Keeps the highlight on the current page selected in the nav bar
     * Require the index page
     */
    function indexAction()
    {
        $pageTitle = 'Home Page';
        $indexLinkStyle = 'selected';
        require_once __DIR__ . '/../templates/index.php';
    }

    /**
     * Sets the title of the Login page
     * Keeps the highlight on the current page selected in the nav bar
     * Require the login page
     */
    function loginAction()
    {
        $pageTitle = 'Login';
        $loginLinkStyle = 'selected';
        require_once __DIR__ . '/../templates/login.php';
    }

    /**
     * Sets the title of the Register page
     * Keeps the highlight on the current page selected in the nav bar
     * Require the register page
     */
    function registerAction()
    {
        $pageTitle = 'Register';
        $registerLinkStyle = 'selected';
        require_once __DIR__ . '/../templates/register.php';
    }

    /**
     * Sets the title of the Logout page
     * Keeps the highlight on the current page selected in the nav bar
     * Require the logout page
     */
    function logoutAction()
    {
        $pageTitle = 'Logout';
        session_destroy();
        require_once __DIR__ . '/../templates/logout.php';
    }

    /**
     * Sets the title of the Logout page
     * Keeps the highlight on the current page selected in the nav bar
     * If the user is logged in he can see the prices
     * If not logged in, price can not be seen
     * Require the logout page
     */
    function servicesAction()
    {
        $pageTitle = 'Service';
        $servicesLinkStyle = 'selected';

        if (isset($_SESSION['user_id'])) {
            $servicesAvailable = Serv::getProducts();
        } else {
            $servicesAvailable = Serv::getProductsIfNotLogger();
        }

        require_once __DIR__ . '/../templates/services.php';
    }
}


