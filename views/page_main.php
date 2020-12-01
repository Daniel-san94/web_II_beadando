<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Segí-tech</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="<?php echo SITE_ROOT?>javascript/jquery.js"></script>
        <script src="<?php echo SITE_ROOT?>javascript/soap.js"></script>
        <script src="<?php echo SITE_ROOT?>javascript/StyleClass.js"></script>
        <script>
            const siteRoot = "<?php echo SITE_ROOT?>";
            
            document.addEventListener("DOMContentLoaded", function(){
                $("body").css("background-color", `${styleClass.getBackgroundColor()}`)
            });

            function setBackgroundColor() {
                const kivalasztottSzin = $("#color")[0].value;
                const body = $("body");
                styleClass.setBackgroundColor(kivalasztottSzin);
                body.css("background-color", styleClass.getBackgroundColor());

            }

        </script>
    </head>
    <body>
        <header>

            <div id="details">
                <div id="user"><em><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname'] ?></em></div>
                <div id="bg-color">
                    <p>Valaszd ki a hatterszint: </p>
                    <input type="color" name="color" id="color" value="#FAEBD7">
                    <button onclick="setBackgroundColor()">Beallit</button>
                </div>
            </div>
            <h1 class="header">Segí-tech PC-szervíz</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&copy; Kozma Dániel - AY60J4 - Webprogramozás 2 beadandó <?= date("Y") ?></footer>
    </body>
</html>
