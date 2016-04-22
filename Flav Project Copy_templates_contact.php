<?php
require_once __DIR__ . '/../templates/header.inc.php';
require_once __DIR__ . '/../templates/nav.inc.php';
//-------------------------------------------

/**
 * Creates an instance of the ContactUs class
 */
$contact = new \Itb\ContactUs();
/**
 * Insert the messages into the database
 * if the user is logged in
 */
$fromContactUs = $contact->contactMessage();
/**
 * Retrieve the messages from the database
 * if the user is logged in
 */
$messagesfromContactUs = $contact->getContactMessage();


?>


    <div id="site_content">
        <div id="content">
            <!-- insert the page content here -->
            <h1>Talk To Us</h1>
            <p>Keep in mind that you need to be logged in to post a message</p>
            <form action="#" method="post">
                <div class="form_settings">
                    <p>
                        <span>Message</span>
                        <textarea class="contact textarea" rows="8" cols="50" name="message"></textarea></p>
                    <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit"
                                                                           name="messagebox" value="submit"/></p>
                </div>
            </form>
            <?php if (isset($_SESSION['user_id'])) { ?>

                <?php foreach ($messagesfromContactUs as $contentToDisplay): ?>
                    <p>
                        <?= $contentToDisplay->getMess() ?>
                    </p>
                <?php endforeach; ?>

            <?php } else { ?>
                <?= $contentToDisplay = 'You need to be logged in to see messages and post messages' ?>
            <?php } ?>
        </div>
    </div>


<?php
//-------------------------------------------
require_once __DIR__ . '/../templates/footer.inc.php';
