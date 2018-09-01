<?php   session_start();?>
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
    <div class="header-content clearfix"> <a class="logo" href="index.html"><i class="icon icon-document"></i> Practice Fusion (SHRS)</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
		 <li><a href="#banner">Home</a></li>
          <li><a href="#gallery">Report</a></li>
          
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
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>Welcome to the medical data record system</h3>
      <p>This is the page for the faculty.</p>
	  <hr/><br/><br/>
	  <form method="post" action="home2.php">
	  <table style="margin: 0 auto;">
        <tr><td><p class="editContent"><label for="name">Patient FirstName:</label></td>
		<td><input type="search" name="firstname" width= "30" /></p></td></tr>
        <tr><td><p class="editContent"><label for="birthdate">Birth Date:</label></td>
		<td><input type="date" name="birthdate" width = "30"/></td></tr>
		<tr><td></td><td><input type="submit" name="sub" value="Search" style="float:right;"></p></td></tr>
	 </table>
	</form>
	<form method="post" action="home_filter.php">
	<table>
	<tr>
		<td><label>Search by</label></td>
		<td><select name="sex"><option value="0">Male</option><option value="1">Female</option></select></td>
		<td><select name="age"><option value="0">Age</option><option value="1">0~10</option>
			<option value="2">11~20</option>
			<option value="3">21~30</option>
			<option value="4">31~40</option>
			<option value="5">41~50</option>
			<option value="6">51~60</option>
			<option value="7">61~70</option>
			<option value="8">71~80</option>
			<option value="9">81~90</option>
			<option value="10">91~100</option>	
			</select></td>
		<td>
		<input type="submit" name="sub" value="submit" style="float:right;"></td>
		<td></td>
		<td></td>
	</tr>
	</table>
	</form>
	
	
   </div>
  </div>
</section>
<!-- intro section --> 
<!-- services section -->
<section id="services" class="services service-section">
  <div class="container">
  
   <!--<div class="row">--->
	 
   <table class="table-content">
   <tr class="editContent">
		<td height=30 width= 80>ID</td>
		<form method = "post" action = "home_sortname.php">
		<td height=30 width= 80><label><input type="submit"  class="button"  name="sortlastname" value="LastName"/></label></td></form>
		<form method = "post" action = "home_sortname.php">
		<td height=30 width= 80><label><input type="submit"  class="button"  name="sortmidname" value="MiddleName"/></label></td></form>
		<form method = "post" action = "home_sortname.php">
		<td height=30 width= 80><label><input type="submit"  class="button"  name="sortfname" value="FirstName"/><label></td></form>
		<form method = "post" action = "home_sortname.php">
		<td height=30 width= 80>Sex</td></form>
		<form method = "post" action = "home_sortname.php">
		<td height=30 width= 80><label><input type="submit"  class="button"  name="sortbirth" value="BirthDate"/></label></td></form>
		
		<td height=30 width= 80><label><input type="submit"  class="button"  name="sortage" value="Age"/></label></td>
		<td height=30 width= 80>City</td>
		<form method = "post" action = "home_sortname.php">
		<td height=30 width= 80><label><input type="submit"  class="button"  name="sortvisitdate" value="RecentVisitDate"/></label></td></form>
   </tr>
	<?php

  if ($_POST['age'] == "1"){
	   filter_010();
	   }
  if ($_POST['age'] =="2"){
	   filter_1120();
	   }
  if ($_POST['age'] =="3"){
	   filter_2130();
	   }
  if ($_POST['age'] =="4"){
	   filter_3140();
	   }
  if ($_POST['age'] =="5"){
	   filter_4150();
	   }
 
	 function filter_010(){ 
		
		require_once 'connect_db.php';               ##Database Connection
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id where d.age<=10";
		  $result = $conn->query($query);
			if (!$result) die($conn->error);
			$rows = $result->num_rows;
 

		for ($j = 0 ; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			//$_SESSION['pid']=$row[0];

		echo <<<_END

				  <tr>
						<td height=30 width= 80><input type="radio" name="id" value="$row[0]"></td>
						<td height=30 width= 80>$row[1]</td>
						<td height=30 width= 80>$row[2]</td>
						<td height=30 width= 80>$row[3]</td>
						<td height=30 width= 80>$row[8]</td>
						<td height=30 width= 80>$row[9]</td>
						<td height=30 width= 80>$row[10]</td>
						<td height=30 width= 80>$row[13]</td>
						<td height=30 width= 80>$row[16]</td>
						<td height=30 width= 80><form method = "post" action = "session.php"><input type="submit" name="" value = "Detail"/></form></</td>
				   </tr>
			
_END;
}

 
  exit;

}
	 function filter_1120(){
		  require_once 'connect_db.php';               ##Database Connection
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id where d.age>10 and d.age<=20";
		  $result = $conn->query($query);
			if (!$result) die($conn->error);
			$rows = $result->num_rows;
 

		for ($j = 0 ; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			//$_SESSION['pid']=$row[0];

		echo <<<_END
				  <form method = "post" action = "session.php">
				  <tr>
						<td height=30 width= 80><input type="radio" name="id" value="$row[0]"></td>
						<td height=30 width= 80>$row[1]</td>
						<td height=30 width= 80>$row[2]</td>
						<td height=30 width= 80>$row[3]</td>
						<td height=30 width= 80>$row[8]</td>
						<td height=30 width= 80>$row[9]</td>
						<td height=30 width= 80>$row[10]</td>
						<td height=30 width= 80>$row[13]</td>
						<td height=30 width= 80>$row[16]</td>
						<td height=30 width= 80><input type="submit" name="" value = "Detail"/></form></</td>
				   </tr>
			
_END;
		 
	 }
	 }
	 
	 function filter_2130(){
		require_once 'connect_db.php';               ##Database Connection
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id where d.age<=30 and d.age>20";
		  $result = $conn->query($query);
			if (!$result) die($conn->error);
			$rows = $result->num_rows;
 

		for ($j = 0 ; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			//$_SESSION['pid']=$row[0];

		echo <<<_END
				  <form method = "post" action = "session.php">
				  <tr>
						<td height=30 width= 80><input type="radio" name="id" value="$row[0]"></td>
						<td height=30 width= 80>$row[1]</td>
						<td height=30 width= 80>$row[2]</td>
						<td height=30 width= 80>$row[3]</td>
						<td height=30 width= 80>$row[8]</td>
						<td height=30 width= 80>$row[9]</td>
						<td height=30 width= 80>$row[10]</td>
						<td height=30 width= 80>$row[13]</td>
						<td height=30 width= 80>$row[16]</td>
						<td height=30 width= 80><input type="submit" name="" value = "Detail"/></form></</td>
				   </tr>
			
_END;
		 
	 }
	 }
	  function filter_3140(){
		require_once 'connect_db.php';               ##Database Connection
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id where d.age> 30 and d.age<=40";
		  $result = $conn->query($query);
			if (!$result) die($conn->error);
			$rows = $result->num_rows;
 

		for ($j = 0 ; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			//$_SESSION['pid']=$row[0];

		echo <<<_END
				  <form method = "post" action = "session.php">
				  <tr>
						<td height=30 width= 80><input type="radio" name="id" value="$row[0]"></td>
						<td height=30 width= 80>$row[1]</td>
						<td height=30 width= 80>$row[2]</td>
						<td height=30 width= 80>$row[3]</td>
						<td height=30 width= 80>$row[8]</td>
						<td height=30 width= 80>$row[9]</td>
						<td height=30 width= 80>$row[10]</td>
						<td height=30 width= 80>$row[13]</td>
						<td height=30 width= 80>$row[16]</td>
						<td height=30 width= 80><input type="submit" name="" value = "Detail"/></form></</td>
				   </tr>
			
_END;
		 
	 }
	 }
	 
	   function filter_4150(){
		require_once 'connect_db.php';               ##Database Connection
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$query = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.P_id where d.age> 40 and d.age<=50";
		  $result = $conn->query($query);
			if (!$result) die($conn->error);
			$rows = $result->num_rows;
 

		for ($j = 0 ; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			//$_SESSION['pid']=$row[0];

		echo <<<_END
				  <form method = "post" action = "session.php">
				  <tr>
						<td height=30 width= 80><input type="radio" name="id" value="$row[0]"></td>
						<td height=30 width= 80>$row[1]</td>
						<td height=30 width= 80>$row[2]</td>
						<td height=30 width= 80>$row[3]</td>
						<td height=30 width= 80>$row[8]</td>
						<td height=30 width= 80>$row[9]</td>
						<td height=30 width= 80>$row[10]</td>
						<td height=30 width= 80>$row[13]</td>
						<td height=30 width= 80>$row[16]</td>
						<td height=30 width= 80><input type="submit" name="" value = "Detail"/></form></</td>
				   </tr>
			
_END;
		 
	 }
	 }
	  
 //$result->close();
  
  
?>
  
 
</table>
   
   <!-- </div>-->
    </div>
  </div>
</section>
<!-- services section --> 
<!--About-->
<section id="content-3-10" class="content-block data-section nopad content-3-10">



<!-- package section -->

<!-- package section --> 

<!-- gallery section -->

<!-- gallery section --> 
<!-- our team section -->
<section id="teams" class="section teams">
  
</section>
<!-- our team section --> 
<section id="pricing5" data-section="pricing-5" class="data-section">
   
</section>
<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Uiniersity of Pittsburgh"</h1>
                <p>Address:4200 Fifth Ave, Pittsburgh, PA 15260</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"The University of Pittsburgh School of Health and Rehabilitation Sciences is one of the schools of the University of Pittsburgh, one of six dedicated to Health Sciences. The School has its own publication, FACETS, which is published 2 times a year." </h1>
                <p>Address:Forbes Tower, 3600 Atwood Street, Pittsburgh, PA 15260</p>
              </blockquote>
            </div>
          </li>
         
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"This website only for SHRS" </h1>
                <p>Phone: (412) 383-6565</p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials section --> 

<!-- contact section -->

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