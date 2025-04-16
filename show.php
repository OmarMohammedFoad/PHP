<?php
require_once 'config.php';
require_once 'function.php';
?>
<html>
    <body>
        <form id="contact_form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
            <label class="required" for="name">Search :</label><br />
            <input id="name" class="input" name="search" type="text" value="" size="30" /><br />
            <input type="submit" value="submit"/>
            <input type="submit" name="show" value="Show All"/>
        </form>
        <?php
        if (file_exists($file_path)) {
            if (!isset($_POST["search"]) || isset($_POST["show"])) {
                showall($file_path);
                
            } else {
                search($file_path, trim($_POST["search"]));
            }
        } else {
            die("file not found");
        }
        ?>
    </body>
</html>