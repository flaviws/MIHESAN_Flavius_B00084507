<?php
require_once __DIR__ . '/../templates/header.inc.php';
require_once __DIR__ . '/../templates/nav.inc.php';
//-------------------------------------------
?>

<?php
/**
 * Functionality for the user to create a login and password
 * If the fields have been filled in correctly allow access
 * if not provide the user with a message to show them something
 * has gone wrong
 */
$db = new \Itb\DatabaseManager();
$conn = $db->getDbhandler();

if (isset($_SESSION['user_id'])) {
    header("Location: /");
}

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])):

    // Enter the new user in the database
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

    if ($stmt->execute()):
        $message = '<b> Successfully created new user </b>';
    else:
        $message = '<b> Sorry there must have been an issue creating your account </b>';
    endif;

endif;

?>

    <div id="site_content">
        <div id="content">
            <!-- insert the page content here -->
            <h1>Register</h1>
            <p>Register with a username and password of your choice</p>

            <?php if (!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif; ?>

            <form action="#" method="post">
                <div class="form_settings">
                    <p><span>Username</span><input class="contact" type="text" name="username" value=""/></p>
                    <p><span>Password</span><input class="contact" type="password" name="password" value=""/></p>
                    <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit"
                                                                           value="Register"/></p>
                </div>
            </form>
        </div>
    </div>

<?php
//-------------------------------------------
require_once __DIR__ . '/../templates/footer.inc.php';
//  don't close the PHP tags
