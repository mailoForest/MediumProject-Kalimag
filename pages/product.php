<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>KALImag</title>
    <?php include '../head-links.php'?>
</head>
<body>
<div class="main">
    <?php include '../header.php'?>
    <div class="clr"></div>
    <div class="content">
        <div class="content_resize">
            <div class="mainbar">
                <script>alert()</script>
                <?php
                const DB_NAME = 'kalimag_db';
                const DB_HOST = 'localhost';
                const DB_USER = 'root';
                const DB_PASSWORD = '';

                if (isset($_GET[subcategory])){
                    try{
                        $subcategory = $_GET[subcategory];
                        $db = new PDO( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
                        $result = $db->query("SELECT * FROM subcategories WHERE name = $subcategory");

                    } catch (PDOException $exception){
                        $message = $exception->getMessage();
                        echo "<script>alert($message)</script>";
                    }
                }

                ?>
            </div>
            <div class="sidebar">
                <div class="search">
                    <form id="form" name="form" method="post" action="#">
            <span>
            <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
            </span>
                        <input name="b" type="image" src="../assets/images/search.gif" class="button" />
                    </form>
                </div>
                <!--/search -->
                <?php include '../aside.php'?>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <?php include '../footer.php'?>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script  type="text/javascript">
        setClassActive('index.php');
        window.onscroll = function(){showGoTop()};
    </script>
</div>
</body>
</html>
