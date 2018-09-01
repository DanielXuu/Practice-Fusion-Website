<?php
// Start the session
session_start();

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="css/animate.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
</head>

<body>
<!-- header section -->
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.html"><i class="icon icon-anchor"></i> Practice Fusion (SHRS)</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
		 <li><a href="#banner">Home</a></li>
		 <li><a href="#banner">Report</a></li>
          
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
  <!-- banner text --> 
   
      <!-- banner text --> 
    </div> 
</section>
<!-- header section --> 
<!-- intro section -->
<section id="intro" class="section intro">
  
</section>
<!-- intro section --> 
<!-- services section -->

<!-- services section --> 
<!--About-->

<!-- package section -->

<!-- package section --> 

<!-- gallery section -->

<!-- gallery section --> 


<!-- Testimonials section -->

<!-- Testimonials section --> 

<!-- contact section -->
<section id="EGMR" class="section">
  <div class="container">
      
    <div class="row">
	
      <div class="col-md-8 col-md-offset-2 conForm">   
        
	
		<h2 class="wow fadeInDown animated" >Comprehensive Metabolic Panel with EGFR</h2>
		<table class="table-content" border="2" color="#FFFFFF">
		
	
		<tr class="editContent">
		<td height=30 width= 180><label>DateTime</label></td>
		
		<td height=30 width= 80> Description</td>
		
		<!--<td height=30 width= 80>AM/PM</td>-->
		<td height=30 width= 80>Values</td>
		<td height=30 width= 80>Unit</td>
		<td height=30 width= 80>Flag</td>
		<td height=30 width= 80>Flagtype</td>
		</tr>
	<?php
 
 
  $pid =$_SESSION['pid'];
  $query = "SELECT * FROM cmp_egfr cm WHERE cm.P_id=$pid order by cm.DateTime";
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
 
  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//$_SESSION['pid']=$row[0];

  echo <<<_END

		  <tr>
				<td bgcolor='#00BFFF'height=30 width= 80>$row[2]$row[3]</td>
				
				<td height=30 width= 80>$row[1]</td>
					
				<td height=30 width= 80>$row[4]</td>
				<td height=30 width= 80>$row[5]</td>
				<td height=30 width= 80>$row[6]</td>
				<td height=30 width= 80>$row[7]</td>
				
		   </tr>
	
  
_END;
}

  $result->close();
?>
</table>
   
    </div>
    </div>
  </div>
</section>
<section id="CBC" class="section">
  <div class="container">
      
    <div class="row">
	
      <div class="col-md-8 col-md-offset-2 conForm">   
        
	
		 <h2 class="wow fadeInDown animated" >CBC with Diff and PLT</h2>
		
	
		<form method = "post" action = "session.php">
		<table class="table-content" border="2" color="#FFFFFF">
		<tr class="editContent">
		<td height=30 width= 180><label>DateTime</label></td>
		
		<td height=30 width= 80>Description</td>
			
		<td height=30 width= 80>Values</td>
		<td height=30 width= 80>Unit</td>
		<td height=30 width= 80>Flag</td>
		<td height=30 width= 80>Flagtype</td>
		</tr>
	<?php
 
 
  $pid =$_SESSION['pid'];
  $query = "SELECT * FROM cbc WHERE cbc.P_id=$pid order by cbc.DateTime desc";
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
 
  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//$_SESSION['pid']=$row[0];

  echo <<<_END

		  <tr>
				<td bgcolor='#00BFFF' height=30 width= 80>$row[2]$row[3]</td>
				
				<td height=30 width= 80>$row[1]</td>
				
				
				<td height=30 width= 80>$row[4]</td>
				<td height=30 width= 80>$row[5]</td>
				<td height=30 width= 80>$row[6]</td>
				<td height=30 width= 80>$row[7]</td>
				
		   </tr>
	
  
_END;
}

  $result->close();
?>
</table>
<section id="show_cbcsummary" class="section">
  <div class="container">
      <div class="section-header">
               
                
            </div>
    <div class="row">
	
      <div class="col-md-8 col-md-offset-2 conForm">   
        
        <h5 class="wow fadeInDown animated" >Summary For CBC</h2>
		<table>
		<tr><td height=30 width= 180><li>TEST Name:</li></td>
			<td height=30 width= 180><li>Values:</li></td>
		
		</tr>
           
     <?php
 
 
  //$pid =$_SESSION['pid'];
  $query_s = "SELECT cbc.CBC_name,AVG(cbc.Value)FROM cbc GROUP BY cbc.CBC_name";
 
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $result_s = $conn->query($query_s);
  
  //$result3 = $conn->query($query3);
  
  if (!$result_s) die($conn->error);

  $rows_s = $result_s->num_rows;
   //$rows3 = $result3->num_rows;
 
 
  for ($j = 0 ; $j < $rows_s ; $j++){
    $result_s->data_seek($j);
    $rows_s = $result_s->fetch_array(MYSQLI_NUM);
	


 echo <<<_END
				<tr>
				<td>$rows_s[0]</td>
				<td>$rows_s[1]</td>
				
				</tr>	
_END;
 }

  //$result->close();
?>   
</table>

   
   <!-- </div>-->
    </div>
  </div>
</section>
<section id="Urinalysis" class="section">
  <div class="container">
      
    <div class="row">
	
      <div class="col-md-8 col-md-offset-2 conForm">   
        
	
		 <h2 class="wow fadeInDown animated" >Urinalysis</h2>
		
	
		<form method = "post" action = "session.php">
		<table class="table-content" border="2" color="#FFFFFF">
		<tr class="editContent">
		<td height=30 width= 180><label>DateTime</label></td>
		
		<td height=30 width= 80>Description</td>
		
		<td height=30 width= 80>Values</td>
		<td height=30 width= 80>Unit</td>
		<td height=30 width= 80>Flag</td>
		<td height=30 width= 80>Flagtype</td>
		</tr>
	<?php
 
 
 $pid =$_SESSION['pid'];
  $query = "SELECT * FROM urinalysis u WHERE u.P_id=$pid";
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
 
  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//$_SESSION['pid']=$row[0];

  echo <<<_END

		  <tr>
				<td bgcolor='#00BFFF' height=30 width= 80>$row[2]$row[3]</td>
				
				<td height=30 width= 80>$row[1]</td>
				
				<td height=30 width= 80>$row[4]</td>
				<td height=30 width= 80>$row[5]</td>
				<td height=30 width= 80>$row[6]</td>
				<td height=30 width= 80>$row[7]</td>
				
		   </tr>
	
  
_END;
}

  $result->close();
?>
</table>
   
   <!-- </div>-->
    </div>
  </div>
</section>

<section id="Urinalysis" class="section">
  <div class="container">
      
    <div class="row">
	
      <div class="col-md-8 col-md-offset-2 conForm">   
        
	
		 <h2 class="wow fadeInDown animated" >Pharmacy Tests</h2>
		
	
		<form method = "post" action = "session.php">
		<table class="table-content" border="2" color="#FFFFFF">
		<tr class="editContent">
		<td height=30 width= 180><label>DateTime</label></td>
		
		<td height=30 width= 80>Description</td>
		
		<td height=30 width= 80>Values</td>
		<td height=30 width= 80>Unit</td>
		<td height=30 width= 80>Flag</td>
		<td height=30 width= 80>Flagtype</td>
		</tr>
	<?php
 
 
 $pid =$_SESSION['pid'];
  $query = "SELECT * FROM Pharmacy_tests ph WHERE ph.P_id=$pid order by ph.DateTime Desc";
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
 
  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//$_SESSION['pid']=$row[0];

  echo <<<_END

		  <tr>
				<td bgcolor='#00BFFF' height=30 width= 180>$row[2]$row[3]</td>
				
				<td height=30 width= 80>$row[1]</td>
				
				
				<td height=30 width= 80>$row[4]</td>
				<td height=30 width= 80>$row[5]</td>
				<td height=30 width= 80>$row[6]</td>
				<td height=30 width= 80>$row[7]</td>
				
		   </tr>
	
  
_END;
}

  $result->close();
?>
</table>
   
   <!-- </div>-->
    </div>
  </div>
</section>

<section id="tsh" class="section">
  <div class="container">
      
    <div class="row">
	
      <div class="col-md-8 col-md-offset-2 conForm">   
        
	
		 <h2 class="wow fadeInDown animated" >TSH</h2>
		
	
		<form method = "post" action = "session.php">
		<table class="table-content" border="2" color="#FFFFFF">
		<tr class="editContent">
		<td height=30 width= 180><label>DateTime</label></td>
		
		<td height=30 width= 80>Values</td>
		<td height=30 width= 80>Unit</td>
		<td height=30 width= 80>Flag</td>
		<td height=30 width= 80>Flagtype</td>
		</tr>
	<?php
 
 
  $pid =$_SESSION['pid'];
  $query = "SELECT * FROM tsh t WHERE t.P_id=$pid order by t.DateTime desc";
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
 
  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//$_SESSION['pid']=$row[0];

  echo <<<_END

		  <tr>
				<td bgcolor='#00BFFF' height=30 width= 180>$row[1]$row[2]</td>
				
				<td height=30 width= 80>$row[3]</td>
				
				
				<td height=30 width= 80>$row[4]</td>
				<td height=30 width= 80>$row[5]</td>
				<td height=30 width= 80>$row[6]</td>
				
				
		   </tr>
	
  
_END;
}

  $result->close();
?>
</table>
   
   <!-- </div>-->
    </div>
  </div>
</section>

<!-- services section --> 
<!--About-->
<section id="content-3-10" class="content-block data-section nopad content-3-10">

		
			 <!--<tr><td><input type="submit" name="submit" value="Submit" class="submitBnt"/></td>-->
			
            <td><a href= "index2.php">Patient info page</a></td></tr>

          <div id="simple-msg"></div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- contact section --> 
<!-- Footer section -->
<!---<footer class="footer">
<div class="container-fluid">
<div id="map-row" class="row">
    <div class="col-xs-12">    
    	<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=15+Springfield+Way,+Hythe,+CT21+5SH&aq=t&sll=52.8382,-2.327815&sspn=8.047465,13.666992&ie=UTF8&hq=&hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&t=m&z=14&ll=51.077429,1.121722&output=embed"></iframe>
      
          <div id="map-overlay" class="col-xs-5 col-xs-offset-6" style="">
    		<h2 style="margin-top:0;color:#fff;">Contact us</h2>
    		<address style="color:#fff;">
    			<strong>Company name</strong><br>
    			1234 Street Dr.<br>
    			Vancouver, BC<br>
    			Canada<br>
    			V6G 1G9<br>
    			<abbr title="Phone">Tel:</abbr> (604) 555-4321
    		</address>
			  Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
    	</div>
    </div>
	 </div>
</div>
</footer>--->
<!-- Footer section --> 
<!-- JS FILES --> 
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script>  
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script> 
<script type="text/javascript" src="js/jquery.contact.js"></script> 
<script type="text/javascript" src="js/jquery.devrama.slider.min-0.9.4.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('.slider-banner').DrSlider({
				'transition': 'fade',
				showNavigation: false,
				progressColor: "#03A9F4"
			});
		});
</script> 
</body>
</html>