<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Practice Fusion</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
  <!--<script type="text/javascript">
   //alert("1");
   $(document).ready(function(){
   //alert('tttt')
      function getList(){
         // jquery ajax 请求
         //alert("2");
         $.ajax({
            type:'post', //请求方式，默认get
            url :"http://localhost:8088/test.php",
      dataType:"json",
            //alert("3");
            success:function(data){
      //alert(typeof(data));
        //var data = JSON.parse(data)
      //alert(data)
               //alert("12321213123132")
               //alert(data);
               $('#infolist').html('');
               $str = '';
               $.each(data.list,function(i,val){
                 $str = $str + '<tr>';
                 $str = $str + '<td> '+val.sec_id+'  </td>';
                 $str = $str + '<td> '+val.age+'  </td>';
                 $str = $str + '<td> '+val.sex+'  </td>';
                 $str = $str + '<td> '+val.dob+'  </td>';
                 $str = $str + '<td> '+val.encounter+' </td>';
                 $str = $str + '</tr>';
               });
               $('#infolist').append($str);
               if(data.list == "" ||  data.list.length < 0 || data.list == "undefined"){
                  $('#infolist').html('<td colspan="10"  style="height:200px;text-align:center;color: #23527c">there is no related data...</td>');
               }
            },error:function(data){
               alert("Filed！");
            }
         });
    }

    //alert("Welcome to Focus");
     getList();
    alert("Welcome to Focus");

  });-->
</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Focus Quality</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts For Analysis</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Patients List</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Flowsheet</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="vitals_all.html">Vitals</a>
            </li>
            <li>
              <a href="patients_lab_all.html">Quest Lab</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Summary</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="allergy_all.html">Allergy</a>
            </li>
            <li>
              <a href="medication_all.html">Medication</a>
            </li>
            <li>
              <a href="diagnose_all.html">Diagnose</a>
            </li>
            <li>
              <a href="encounter_all.html">Encounter</a>
            </li>
            <li>
              <a href="prescription_all.html">Prescription</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Socail History</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Individual</a>
            </li>

            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Family</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Marrage Status</a>
                </li>

              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="analysis.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Table For Analysis</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <!--<div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>-->
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <!--<div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-handshake-o"></i>
              </div>
              <div class="mr-5">Providers Reception</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="analysis_provider.html">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-check-o"></i>
              </div>
              <div class="mr-5">Encounter</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="##.html">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">Other support</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>-->
      <!-- Area Chart Example-->
      <!--<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <!--<div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">40</div>
                  <div class="small text-muted">Appointment</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">20</div>
                  <div class="small text-muted">Encounter</div>
                  <hr>
                  <div class="h4 mb-0 text-success">400</div>
                  <div class="small text-muted">Total Patients</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Card Columns Example Social Feed-->
          <!--<div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> News Feed</div>-->
          <!--<hr class="mt-2">
          <!--<div class="card-columns">
            <!-- Example Social Card-->
            <!--<div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=610" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">####</a></h6>
                <p class="card-text small">These waves are looking pretty good today!
                  <a href="#">#surfsup</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">####</a></h6>Very nice! I wish I was there! That looks amazing!
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="http://placehold.it/45x45" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">#####</a></h6>Next time for sure!
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 32 mins ago</div>
            </div>
            <!-- Example Social Card-->
            <!--<div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">####</a></h6>
                <p class="card-text small">Another day at the office...
                  <a href="#">#workinghardorhardlyworking</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">Jessy Lucas</a></h6>Where did you get that camera?! I want one!
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 46 mins ago</div>
            </div>
            <!-- Example Social Card-->
            <!--<div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">#####</a></h6>
                <p class="card-text small">Nice shot from the skate park!
                  <a href="#">#kickflip</a>
                  <a href="#">#holdmybeer</a>
                  <a href="#">#igotthis</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <div class="card-footer small text-muted">Posted 1 hr ago</div>
            </div>
            <!-- Example Social Card-->
            <!--<div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="#" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">####</a></h6>
                <p class="card-text small">It's hot, and I might be lost...
                  <a href="#">######</a>
                  <a href="#">#water</a>
                  <a href="#">#anyonehavesomewater</a>
                  <a href="#">#noreally</a>
                  <a href="#">#thirsty</a>
                  <a href="#">#dehydration</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="#" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">#####</a></h6>The oasis is a mile that way, or is that just a mirage?
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="#" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">#####</a></h6>
                        <img class="img-fluid w-100 mb-1" src="#" alt="">I'm saved, I found a cactus. How do I open this thing?
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted yesterday</div>
            </div>
          </div>
          <!-- /Card Columns-->
        <!--</div>-->
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-fw fa-user-o"></i> Patient </div>
              <!--<div class="card text-white bg-primary o-hidden h-200">-->
                <div class="card-body">
                  <!--<div class="card-body-icon">-->
                    <i class="fa fa-fw fa-user-circle-o"></i>
                  <!--</div>-->
                  <div class="mr-5">Patient Lab Info</div>
                </div>


            <!--</div>-->
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Example Notifications Card-->
          <!--<div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i> Feed Example</div>
            <div class="list-group list-group-flush small">
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="#" alt="">
                  <div class="media-body">
                    <strong>David Miller</strong>posted a new article to
                    <strong>David Miller Website</strong>.
                    <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="#" alt="">
                  <div class="media-body">
                    <strong>Samantha King</strong>sent you a new message!
                    <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="#" alt="">
                  <div class="media-body">
                    <strong>#####</strong>added a new photo to the album
                    <strong>Beach</strong>.
                    <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="#" alt="">
                  <div class="media-body">
                    <i class="fa fa-code-fork"></i>
                    <strong>Monica Dennis</strong>forked the
                    <strong>startbootstrap-sb-admin</strong>repository on
                    <strong>GitHub</strong>.
                    <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>-->
        </div>
      </div>
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Patients Lab Information</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead id="dataTable">
                <tr>
                  <th>Lab Name</th>
                  <th>Test Name in Lab</th>
                  <th>Value</th>
                  <th>Unit</th>
                  <th>Flag</th>
                  <th>Date(Y/M/D)</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Lab Name</th>
                  <th>Test Name in Lab</th>
                  <th>Value</th>
                  <th>Unit</th>
                  <th>Flag</th>
                  <th>Date(Y/M/D)</th>
                </tr>
              </tfoot>
              <tbody>
      <?php
                //$pid=$_POST['id'];
                //$_SESSION['pid']=$pid;
          $name=$_POST['u_id'];
          echo $name;
          require_once 'connect_db.php';
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $query  = "SELECT p.id_sec,q.labname,f.level3,f.value,f.Unit,f.flag,f.date FROM questlab q, patient p JOIN flowsheet_content f on p.p_id = f.P_id WHERE p.id_sec = \"$name\" And q.idquestlab=f.level2";

          $result = $conn->query($query);
          if (!$result) die($conn->error);

          $rows = $result->num_rows;

          for ($j = 0 ; $j < $rows ; ++$j){
              $result->data_seek($j);
              $row = $result->fetch_array(MYSQLI_NUM);
              	//$_SESSION['pid']=$row[0];

          echo <<<_END

            <tr>
              <td>$row[1]</td>
              <td>$row[2]</td>
              <td>$row[3]</td>
              <td>$row[4]</td>
              <td>$row[5]</td>
              <td>$row[6]</td>
            </tr>

_END;
  }
              $result->close();
    ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
