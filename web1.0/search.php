<html>
<head>
<title>Digital Life in Pittsburgh</title>
<link rel="stylesheet" type="text/css" href="ul1.css">
</head>
<body>

<div id="container">
<div id="header">
<h1>Practice Fusion</h1>
</div> <!-- end header -->
<div id="menu">
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="product.php">Patient Info</a></li>
<li><a href="#">Encounter</a></li>
<li><a href="myaccount.php">Lab</a></li>
<li><a href="#">Analysis</a></li>
</ul>
</div> <!-- end menu -->
<div id="mainContainer">
<div id="content">
<h2>
<p><?php
session_start();
echo "Welcome to Digital Life " . $_SESSION['name'];
	
?></p></h2>



<?php

require_once 'connect_db.php';  //connect db
$link= new mysqli($hn, $un, $pw, $db);

  if (mysqli_connect_errno()) die(mysqli_connect_error());
$keywords=$_POST['keywords'];  
$brands=$_POST['brands'];
$type=$_POST['type'];
$price=$_POST['price'];


echo $keywords;
echo $brands;
echo $type;
echo $price;

switch ($price) { //get the price range
    case 'A':
    	$low=-1;
    	$high=300;
        $flag=1;
    	break;
    case 'B':
        $low=301;
        $high=600;
        $flag=1;
        break;
    case 'C':
        $low=601;
        $high=1000;
        $flag=1;
        break;
    case 'D':
    	$low=1001;
    	$high=2000;
    	$flag=1;
    	break;
    case 'E':
    	$low=2001;
    	$high=500000;
    	$flag=1;
    	break;
    default: 
    	$flag='';
        break;
}


 //different conditions
 if($keywords=='')
     	echo "<script>alert('please enter the keywords！'); history.go(-1);</script>";
     	
 else {
   		if($flag==''&&$brands==''&&$type=='')
    	  {
        	  echo "no price,no brands, no type";
        	  $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%'";
   	   		  $result = mysqli_query($link,$query);
   	      }

		
	 		else if($brands==''&&$type==''&&$flag!='')
	   	 	{ echo "no brands, no type, has price,$low,$high";
	   	 	 $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%' AND price<'$high' AND price>'$low'";
	   	 	 $result=mysqli_query($link,$query);
	   	 	 }
	   	 else if($price==''&&$type==''&&$brands!='')
	    	 {echo "has brands, no type, no price";
	    	 $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%' AND bname='$brands'";
	   	 	 $result=mysqli_query($link,$query);
	    	 }
	   	 else if($brands==''&&$flag==''&&$type!='')
	   		 { echo "no brands, has type, no price";
 			 $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%' AND tname='$type'";
	   	 	 $result=mysqli_query($link,$query);
	   		 }
	  	 else if($type==''&&$flag!=''&&$brands!='')
	  		  { echo "has brands, no type, has price";
	  		  $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%' AND bname='$brands' AND price<'$high' AND price>'$low'";
	   	 	  $result=mysqli_query($link,$query);
	  		  }
	    else  if($brands==''&&$type!=''&&$flag!='')
	   		 { echo "no brands, has type, has price";
	   		 $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%' AND tname='$type' AND price<'$high' AND price>'$low'";
	   	 	  $result=mysqli_query($link,$query);
	   		 }
	   	else  if($flag==''&&$brands!=''&&$type!='')
	     	 {	echo "has brands, has type, no price";
	     	  $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%' AND tname='$type' AND bname='$brands'";
	   	 	  $result=mysqli_query($link,$query);
	     	 }
	    else  if($flag!=''&&$brands!=''&&$type!='')
	     	{echo "has brands, has type, has price";
	     	 $query="SELECT pro_name, bname, price FROM product,brand,type WHERE product.bid=brand.bid AND product.tid=type.tid AND pro_name LIKE '%$_POST[keywords]%' AND tname='$type' AND price<'$high' AND price>'$low' AND bname='$brands'";
	   	 	  $result=mysqli_query($link,$query);
	     	}

   		}
   		
      //print the result
   		 if($result)  //discuss!!!
   		 {
   	      $rows = $result->num_rows;
	    for ($j = 0 ; $j < $rows ; ++$j)
         {
          $result->data_seek($j);
          $row = $result->fetch_array(MYSQLI_NUM);


 echo <<<_END
  <pre>
       	Product-name    $row[0] 
       	brand Name $row[1]    
    	price:          $row[2] 
         	
  </pre>
  <form action=".php" method="post">
  <input type="submit" value="ADD INTO MY CART"></form>
_END;


}
}

else
    { if($keywords!='')
      echo  "<script type='text/javascript'>alert('no result!');history.go(-1)</script>";}

?>




<p></p>
</div> <!-- end content -->

</div> <!-- end sidebar -->
<div id="footer">
<p>Database_project2016</p>
</div> <!-- end footer -->
</div> <!-- end mainContainer -->
</div> <!-- end container -->

</body>
</html>