<!DOCTYPE HTML>

<html>
<?php
    putenv('ORACLE_HOME=/oraclient');
    $dbh = ocilogon ('A0119541','crse1410','sid3');
      //$dbh = oci_pconnect("a0119541", "crse1410", "sid3.comp.nus.edu.sg");
?>

  <head>
    <title>Movie of The Year</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.scrollgress.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-wide.css" />
      <link rel="stylesheet" href="css/style-noscript.css" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
  </head>
  <body class="index">
  
    <!-- Header -->
      <header id="header" class="alt">
        <h1 id="logo"><a href="index.html">Enjoyable <span> iTicket </span></a></h1>
        <nav id="nav">
          <ul>
            <li class="current"><a href="index.html">Welcome</a></li>
          </ul>
        </nav>
      </header>

    <!-- Banner -->   
      <section id="banner">
        
        <!--
          ".inner" is set up as an inline-block so it automatically expands
          in both directions to fit whatever's inside it. This means it won't
          automatically wrap lines, so be sure to use line breaks where
          appropriate (<br />).
        -->
        <div class="inner">
          
          <header>
            <h2>Movies 2014</h2>
          </header>
          
          <footer>
            <ul class="buttons vertical">
              <li><a href="#main" class="button fit scrolly">
                iMovie</a></li>
            </ul>
          </footer>
        
        </div>
        
      </section>
    
    <!-- Main -->
      <article id="main">

          
        <!-- One -->

          <section class="wrapper style3 container special">
          
            <header class="major">
            <div id = "alertInfoContainer">
              <h2><strong>Enjoy movie</strong></h2>
            </div>
            </header>      
            <div class="row" id='searchTicketContainer'>
              <?php
                $sql = "SELECT DISTINCT * from MOVIE where YEAR = 2014 ";
                $stid = oci_parse ($dbh,$sql);
                oci_execute($stid,OCI_DEFAULT);
                while($row = oci_fetch_array($stid)){
                echo '<div class="6u 12u(2)"> <section> <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a> <header><h3>'.
                $row["TITLE"].
                '</h3> </header> <p> Director: '.$row["DIRECTOR"].'<br> Actors: '.
                $row["ACTORS"].
                '<br> Description: '.$row["DESCRIPTION"].'<br></p> </section> </div>';    
              }
              oci_free_statement($stid);
            ?>

              
              <div class="6u 12u(2)">               
                <section>
                  <a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                  <header>
                    <h3>An Airport Terminal</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
                </section>

              </div>
            </div>
          </div>
            <footer class="major">
              <ul class="buttons">
                <li><a href="#" class="button">See More</a></li>
              </ul>
            </footer>         
          </section>            
      </article>         
      
          
        <!-- Two -->
          <section class="wrapper style1 container special">
            <div class="row">
              <div class="4u 12u(2)">
              
                <section>
                  <span class="icon featured fa-check"></span>
                  <header>
                    <h3>This is Something</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
                </section>
              
              </div>
              <div class="4u 12u(2)">
              
                <section>
                  <span class="icon featured fa-check"></span>
                  <header>
                    <h3>Also Something</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
                </section>
              
              </div>
              <div class="4u 12u(2)">
              
                <section>
                  <span class="icon featured fa-check"></span>
                  <header>
                    <h3>Probably Something</h3>
                  </header>
                  <p>Sed tristique purus vitae volutpat ultrices. Aliquam eu elit eget arcu commodo suscipit dolor nec nibh. Proin a ullamcorper elit, et sagittis turpis. Integer ut fermentum.</p>
                </section>
              
              </div>
            </div>
          </section>
  </body>
<?php
    oci_close($dbh);
?>  
</html>







  
          
         
     
    

</html>           