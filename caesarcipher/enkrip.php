<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Caesar Cipher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Caesar Cipher</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="enkripsi.php">Enkripsi</a></li>
                  <li><a href="dekripsi.php">Dekripsi</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
		<h2>Enkripsi Caesar Cipher</h2>
			<?php
				$eks = array('.txt');
				$ekst = strrchr($_FILES['teks']['name'],'.');
				
				if(!in_array($ekst,$eks)) {
					echo "<script>alert('Masukkan File .txt!');location.replace('enkripsi.php');</script>";
				}
			
				if ($_FILES['teks']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['teks']['tmp_name'])) { //checks that file is uploaded
					$isi = file_get_contents($_FILES['teks']['tmp_name']); 
				}
			?>
			<form method="POST" action="simpanenk.php" enctype="multipart/form-data">
			<table border="0">
				<tr>
					<td height="200px"><b>Plain Text:</b><br/>
						<textarea name="plain" required="required" rows="9" readonly="readonly" class="input-xxlarge"><?php echo $isi; ?></textarea>
					</td>
				</tr>
				<?php
					$tab = "abcdefghijklmnopqrstuvwxyz";
					$tab1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					
					$ciparr = array();
					
					$idx = 0;
					for($i=0;$i<strlen($isi);$i++) {
						for($j=0;$j<strlen($tab);$j++) {
							if($isi[$i]==" " || !ctype_alpha($isi[$i])) {
								array_push($ciparr,$isi[$i]);
								continue;
							}
							
							if($isi[$i]==$tab[$j]) {
								$idx = $j;
								$cip = ($j+3)%26;
								array_push($ciparr,$tab[$cip]);
							}
							
							if($isi[$i]==$tab1[$j]) {
								$idx = $j;
								$cip = ($j+3)%26;
								array_push($ciparr,$tab1[$cip]);
							}
						}
					}
					$cipher1 = implode('',$ciparr);
				?>
				<tr>
					<td height="200px">
						<b>Tabel Substitusi:</b><br/>
						<img src="images/14-2.png" />
					</td>
				</tr>
			</table>
			<hr/>
			<table border="0">
				<tr>
					<td height="200px">
						<b>Cipher Text:</b><br/>
						<textarea name="cipher" required="required" rows="9" readonly="readonly" class="input-xxlarge"><?php echo $cipher1; ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<b>Nama txt file:</b><br/>
						<input type="text" required="required" name="jeneng" />
					</td>
				</tr>
				<tr>
					<td><hr/></td>
				</tr>
				<tr>
					<td><br/>
					</td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-large btn-primary" type="button" value="Simpan!" /></td>
				</tr>
			</table>
			</form>
      </div>

      <!-- Example row of columns -->

      <hr>

      <footer>
        <p>Copyright &copy; ERA 2014</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
