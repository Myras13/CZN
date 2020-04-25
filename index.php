<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();
 

?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("templates/head.php") ?>
    </head>

    <body>
        <?php require_once('php/view/V_SessionNotifications.php');?>
        <div id="container">
            
            <?php include("templates/logo.php") ?>
            <?php include("templates/topbar.php") ?>

            <div id="content_index">
                <span class="name">Co to za strona i jak się po niej poruszać?</span>
                <br/><br/>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet ultricies malesuada. Proin non enim tortor. Mauris rutrum scelerisque venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris pharetra ut eros eget tempor. Sed tincidunt ut ligula in pharetra. Curabitur dignissim, eros id semper elementum, orci nibh fringilla velit, in consectetur nisl massa nec est. Etiam eu lectus scelerisque, euismod turpis non, sodales est. Etiam ipsum felis, maximus tempus pellentesque eget, vulputate quis justo. Sed faucibus purus in ornare faucibus. Proin a convallis ante, in ultricies libero. Vivamus suscipit tellus leo, eu consectetur velit hendrerit a. Pellentesque sed dapibus nisl, ornare maximus massa. Sed ultricies mi odio. Pellentesque metus dolor, maximus tincidunt facilisis at, luctus in est. Nulla fringilla lectus libero, nec ultrices libero efficitur vitae.
                <br/><br/>
                Praesent leo nibh, efficitur ut elit et, vestibulum mattis neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras viverra mollis sem, non ultrices metus posuere vitae. Ut volutpat dolor purus. Nam maximus, arcu suscipit laoreet gravida, quam erat maximus sapien, a ultrices sem elit eget erat. Donec porta pellentesque nunc, vitae consequat ipsum imperdiet in. Donec purus nisi, iaculis eu luctus in, interdum sed mauris. Etiam odio magna, rhoncus ut felis id, placerat bibendum leo. Mauris a rutrum tortor, vel sodales mauris.
                <br/><br/>
                Donec luctus viverra vehicula. Nunc iaculis tincidunt nisi eget hendrerit. Donec erat metus, maximus quis dolor vel, ultricies aliquet ipsum. Morbi ut nunc risus. Etiam tempor, quam sit amet ullamcorper tempus, ante sapien finibus mi, sed blandit risus dolor sed lectus. Fusce sed pretium ex, vel elementum nunc. Quisque mollis odio sed elit fermentum consectetur. Quisque lobortis tellus eu tempor fringilla. Duis id felis ut lacus dignissim vestibulum. Maecenas maximus ut ante sit amet accumsan. Morbi id risus vel libero cursus consectetur. Nulla ultrices lobortis nunc ac vehicula. Morbi iaculis, nulla eget commodo hendrerit, lectus neque eleifend nunc, sed imperdiet justo elit ultricies nibh. Sed aliquam, velit et maximus laoreet, lorem magna tempus ipsum, sit amet convallis tellus turpis at lorem. Aliquam a ullamcorper arcu, at molestie erat. Vestibulum malesuada facilisis ex a ullamcorper.
            </div>

            <?php include("templates/footer.php") ?>

        </div>
    </body>
</html>