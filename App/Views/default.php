<html>
    <head>
        <link rel="stylesheet" href="<?php echo $app->request->getPath() . '/public/css/app.css' ?>" />
    </head>
    <body>
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">Sellsy By Slim</a></h1>
                </li>

                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="left">

                </ul>      
            </section>
        </nav>

        <div class="row">
            <?php require 'Elements/notif.php'; ?>    
            <?php echo $yield; ?>

        </div>

        <script src="<?php echo $app->request->getPath() . '/public/js/libs/libs.min.js' ?>"></script>
        <script src="<?php echo $app->request->getPath() . '/public/js/libs/foundation.min.js' ?>"></script>
        <script src="<?php echo $app->request->getPath() . '/public/js/app.min.js' ?>"></script>
    </body>
</html>

