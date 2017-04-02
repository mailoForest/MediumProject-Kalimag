<!DOCTYPE html>
<head>
<title>KALImag | Contact</title>
    <?php include '../head-links.php'?>
</head>
<body>
<div class="main">
    <?php
    include '../header.php';
    include '../functions.php';
    ?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
          <section>

          </section>
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
    <script type="text/javascript">
        setClassActive('cart.php');
    </script>
</div>
</body>
</html>
