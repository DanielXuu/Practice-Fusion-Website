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
<title>Patient</title>
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
		 <li><a href="home.php">Home</a></li>
          
          <li><a href="#">Report</a></li>
          
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

<!-- intro section --> 
<!-- services section -->
<section id="services" class="services service-section">
  <div class="container">
  <div class="section-header">
                <h2 class="wow fadeInDown animated">Patient's Information</h2>
                <p class="wow fadeInDown animated">Please select the section you want to add information. The form shows the latest record.</p>
            </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-happy"></span>
        <div class="services-content">
			<h5>Demographic</h5>
    <table>
    
	<?php
  session_start();
  //$pid=$_POST['id']; 
  //$_SESSION['pid']=$pid;
  $pid =$_SESSION['pid'];
  require_once 'connect_db.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  $query  = "SELECT * FROM patient p JOIN demographic d on p.p_id = d.p_id where p.p_id=$pid";
  
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $rows = $result->num_rows;
 

  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	//$_SESSION['pid']=$row[0];

  echo <<<_END
	  
		   
				
				<p> Last Name: $row[1]</p>
				<p> MiddleName: $row[2]</p>
				<p> FirstName: $row[3]</p>
				<p> Sex: $row[8]</p>
				<p> BirthDate: $row[9]</p>
				<p> Age: $row[10]</p>
				
				<p> Recent Visitdate: $row[16]</p>
	  
  
_END;
}

  $result->close();
?>
</table>		
			
        </div>
      </div>

      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-document"></span>
        <div class="services-content">
          <h5>Allergy</h5>
		  <?php
  
  //$query2  = "SELECT * FROM patient p JOIN allergies a on p.p_id = a.P_id where p_firstname LIKE '%$_POST[name]%'";
  $query2  = "SELECT * FROM patient p JOIN allergies a on p.p_id = a.P_id where p.p_id=$pid order by a.Aller_id desc limit 1";
  $result2 = $conn->query($query2);
  if (!$result2) die($conn->error);

  $rows2 = $result2->num_rows;
   

  for ($j = 0 ; $j < $rows2 ; ++$j){
    $result2->data_seek($j);
    $row2 = $result2->fetch_array(MYSQLI_NUM);

  echo <<<_END
	
		   	  <table>
				<tr><p>Allergy Name: $row2[7]</p></tr>
				<tr><p>Allergy Type: $row2[8]</p></tr>
				<tr><p>Severity: $row2[9]</p></tr>
				<tr><p>Onset: $row2[10]</p></tr>
				<tr><p>Reactions: $row2[11]</p></tr>
				<tr><p>Status: $row2[12]</p></tr>
							
		   </table>	
	  
  
_END;
}
  $result2->close();
 
?>
		  <p><form method = "post" action = "Allerinsert.php"><input type="submit" name="" value = "Add New"/></form></p>
        </div>
      </div>
      
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-scope"></span>
        <div class="services-content">
          <h5>Prescription</h5>
		  <p>  </p>
		  <?php
  
  //$query4  = "SELECT * FROM patient p JOIN smoking s on p.p_id = s.P_id where p_firstname LIKE '%$_POST[name]%'";
  $query5  = "SELECT * FROM patient p JOIN prescription pr on p.p_id = pr.P_id where p.p_id=$pid order by pr.Pre_id desc limit 1";
  $result5 = $conn->query($query5);
  if (!$result5) die($conn->error);
  $rows5 = $result5->num_rows;

  for ($j = 0 ; $j < $rows5 ; ++$j){
    $result5->data_seek($j);
    $row5 = $result5->fetch_array(MYSQLI_NUM);

  echo <<<_END
		         
				<p>Despense: $row5[8]</p>
				<p>Refills: $row5[9]</p>
				<p>Days of Supply :$row5[10]</p>	
				<p>Script Date: $row5[11]</p>	
				<p>Pharmacy: $row5[12]</td>	
				<p>Prescription Provider $row5[13]</p>	
		   	  
  
_END;
}
  $result5->close();
  #$conn->close();	
?>

          <p><form method = "post" action = "prescripinsert.php"><input type="submit" name="" value = "Add New"/></form></p>		
        </div>
      </div>
	   
	  <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-scope"></span>
        <div class="services-content">
          <h5>Medication</h5>
          <p><form method = "post" action = "Medicatinsert.php"><input type="submit" name="" value = "Add New"/></form></p>		
        </div>
      </div>
	  <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-scope"></span>
        <div class="services-content">
          <h5>Diagnose</h5>
          <p><form method = "post" action = "Allergy.php"><input type="submit" name="" value = "Add New"/></form></p>		
        </div>
      </div>
	  <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-scope"></span>
        <div class="services-content">
          <h5>Encounter</h5>
          <p><form method = "post" action = "Allergy.php"><input type="submit" name="" value = "Add New"/></form></p>		
        </div>
      </div>
	  <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-scope"></span>
        <div class="services-content">
          <h5>Appointment</h5>
          <p><form method = "post" action = "Allergy.php"><input type="submit" name="" value = "Add New"/></form></p>		
        </div>
      </div>
	 <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-scope"></span>
        <div class="services-content">
          <h5>Socail History</h5>
          <p><form method = "post" action = "Allergy.php"><input type="submit" name="" value = "Add New"/></form></p>		
        </div>
      </div>
	<div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-document"></span>
        <div class="services-content">
          <h5>Flowsheet</h5>
          <li><a href= "Vitalsinsert.php">Vitals</a></li>	
		  <li><a href= "Questlab.php">QuestLab</a></li>	
		  
        </div>
      </div>
	   <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-heart"></span>
        <div class="services-content">
          <h5>Smoking Info</h5>
         
<?php
  
  //$query4  = "SELECT * FROM patient p JOIN smoking s on p.p_id = s.P_id where p_firstname LIKE '%$_POST[name]%'";
  $query4  = "SELECT * FROM patient p JOIN smoking s on p.p_id = s.P_id where p.p_id=$pid order by s.s_id desc limit 1";
  $result4 = $conn->query($query4);
  if (!$result4) die($conn->error);
  $rows4 = $result4->num_rows;

  for ($j = 0 ; $j < $rows4 ; ++$j){
    $result4->data_seek($j);
    $row4 = $result4->fetch_array(MYSQLI_NUM);

  echo <<<_END
	  	
				<p>Smoking Status:$row4[8]</p>
				<p>Effective Date:$row4[9]</p>	
		   
  
_END;
}
  $result4->close();	
?>
	<p><form method = "post" action = "Smokeinsert.php"><input type="submit" name="" value = "Add New"/></form></p>
        </div>
      </div>
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

<!-- our team section --> 

<!-- Testimonials section -->

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