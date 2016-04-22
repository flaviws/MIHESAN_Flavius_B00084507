<?php
require_once __DIR__ . '/../templates/header.inc.php';
require_once __DIR__ . '/../templates/nav.inc.php';
//-------------------------------------------
/**
 * Display the names and prices of products
 */
?>

    <div id="site_content">
        <div id="content">
            <!-- insert the page content here -->
            <h2>Services</h2>
            <p>Our company provides only the best services for it's customers:</p>
            <table style="width: 500px;%; border-spacing:0;">
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                </tr>

                <?php
                foreach ($servicesAvailable as $Serv) {
                    ?>

                    <tr>
                        <td>
                            <span class="center">
                                <?= $Serv->getName() ?>
                            </span>
                        </td>
                        <td>
                            <span class="center">
                                &euro;<?= $Serv->getPrice() ?>
                            </span>
                        </td>
                    </tr>

                <?php
                }
                    ?>

            </table>
        </div>
    </div>

<?php
//-------------------------------------------
require_once __DIR__ . '/../templates/footer.inc.php';
//  don't close the PHP tags

