<?php
//-------------------------------------------------
// default style strings to empty, if not set
if (empty($indexLinkStyle)) {
    $indexLinkStyle = '';
}
if (empty($servicesLinkStyle)) {
    $servicesLinkStyle = '';
}
if (empty($contactLinkStyle)) {
    $contactLinkStyle = '';
}
if (empty($loginLinkStyle)) {
    $loginLinkStyle = '';
}
if (empty($registerLinkStyle)) {
    $registerLinkStyle = '';
}

/**
 * If the user is logged in show his name and a logout button
 */
if (isset($_SESSION['user_id'])) {

    $db = new \Itb\DatabaseManager();
    $conn = $db->getDbhandler();

    $records = $conn->prepare('SELECT id,username,password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = NULL;

    if (count($results) > 0) {
        $user = $results;
    }

}

?>
<div id="menubar">
    <ul id="menu">
        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
        <li class="<?= $indexLinkStyle ?>">
            <a href="/">Home</a>
        </li>

        <li class="<?= $servicesLinkStyle ?>">
            <a href="/?action=services">Services</a>
        </li>

        <li class="<?= $contactLinkStyle ?>">
            <a href="/?action=contact">Contact Us</a>
        </li>

        <li class="<?= $loginLinkStyle ?>">
            <a href="/?action=login">Login</a>
        </li>

        <li class="<?= registerLinkStyle ?>">
            <a href="/?action=register">Register</a>
        </li>
        <li>
            <?php if (!empty($user)): ?>
        <li><a><?= $user['username']; ?></a></li>
        <li><a href="/?action=logout">logout</a></li>
        <?php endif; ?>
        </li>
    </ul>
</div>

