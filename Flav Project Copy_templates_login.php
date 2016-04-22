<?php
require_once __DIR__ . '/../templates/header.inc.php';
require_once __DIR__ . '/../templates/nav.inc.php';
//-------------------------------------------

?>

<?php

/**
 * If the user has input the correct username and password
 * allow access and if they do not, display a message to show that
 * they have input the wrong credentials
 */
if (isset($_SESSION['user_id'])) {
    header("Location: /");
}

if (!empty($_POST['username']) && !empty($_POST['password'])):

    $db = new \Itb\DatabaseManager();
    $conn = $db->getDbhandler();

    $records = $conn->prepare('SELECT id,username,password FROM users WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

        $_SESSION['user_id'] = $results['id'];
        $message = '<b> Your login was successful </b>';
    } else {
        $message = '<b> Sorry, those credentials do not match </b>';
    }

endif;

?>

    <div id="site_content">
        <div id="content">
            <!-- insert the page content here -->
            <h1>Login</h1>
            <p>Login with your username and password or register by clicking the <strong><a href="/?action=register">Register</a></strong>
                button in the navigation above</p>

            <?php if (!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif; ?>

            <form action="#" method="post">
                <div class="form_settings">
                    <p><span>Username</span><input class="contact" type="text" name="username" value=""/></p>
                    <p><span>Password</span><input class="contact" type="password" name="password" value=""/></p>
                    <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" value="Login"/>
                    </p>
                </div>
            </form>
            <p><br/><br/><strong>NOTE: You must be logged in, in order to see prices and talk to us.</strong></p>
        </div>
    </div>

<?php
//-------------------------------------------
require_once __DIR__ . '/../templates/footer.inc.php';
//  don't close the PHP tags
