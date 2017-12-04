ade<!DOCTYPE html>
<html lang="en" >
<head>

  <style>
  @font-face {
    font-family: Roboto;
    src: url('<?php echo base_url();?>assets/Roboto-Regular.ttf');
  }

  html {
    font-family: Roboto !important;
  }

  body{
    font-family: Roboto !important;
  }

  div{
    font-family: Roboto !important;
  }
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

<title>Kemenristek Dikti - Media Monitoring</title>
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/ristek_dikti_logo.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url();?>assets/lib/Hover/hover.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/lib/fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/lib/weather-icons/css/weather-icons.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/lib/jquery-toggles/toggles-full.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/lib/morrisjs/morris.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/quirk.css">

<script src="<?php echo base_url();?>assets/lib/modernizr/modernizr.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery-toggles/toggles.js"></script>
<script src="<?php echo base_url();?>assets/lib/morrisjs/morris.js"></script>
<script src="<?php echo base_url();?>assets/lib/raphael/raphael.js"></script>
<script src="<?php echo base_url();?>assets/lib/flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/lib/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>assets/lib/flot-spline/jquery.flot.spline.js"></script>
<script src="<?php echo base_url();?>assets/lib/jquery-knob/jquery.knob.js"></script>
<script src="<?php echo base_url();?>assets/js/quirk.js"></script>
<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
</head>

<body>
  <header>
    <div class="headerpanel" style="background-color:#681818">
      <div class="logopanel">
        <h4><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/ristek_dikti_logo.png" height="30" hspace="5">    Media Monitoring</a></h4>
      </div><!-- logopanel -->
      <div class="headerbar">
        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        <div class="header-right">
          <ul class="headermenu">
            <li>
            </li>
            <li>
              <a href="<?php echo site_url('Login/process_logout');?>">
                <button id="" class="btn">
                  Logout
                  <i class="fa fa-sign-out"></i>
                </button>
              </li>
            </ul>
          </div><!-- header-right -->
        </div><!-- headerbar -->
      </div><!-- header-->
    </header>

<section>
  <div class="leftpanel" style="font-family: roboto !important;">
    <div class="leftpanelinner">
      <!-- ################## LEFT PANEL PROFILE ################## -->
      <div class="media leftpanel-profile" style="background-color:#AFA82B">
        <div class="media-left">
          <a href="#">
            <img src="<?php echo base_url();?>assets/images/photos/loggeduser.png" alt="" class="media-object img-circle">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $_SESSION['username'];?><a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"></a></h4>
          <span><?php echo $_SESSION['user'];?></span>
        </div>
      </div><!-- left panel profile -->
      <ul class="nav nav-tabs nav-justified nav-sidebar">
        <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
        <li class="tooltips" data-toggle="tooltip" title="Post Berita"><a data-toggle="tab" data-target="#emailmenu"><i class="tooltips fa fa-pencil-square-o"></i></a></li>
      </ul>
      <div class="tab-content">
        <!-- ################# MAIN MENU ################### -->
        <div class="tab-pane active" id="mainmenu">
          <h5 class="sidebar-title">Main Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active"><a href="<?php echo site_url('Dashboard/index');?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="nav-parent"><a href=""><i class="fa fa-newspaper-o"></i> <span>Berita</span></a>
              <ul class="children">
                <?php
                $i=0;
                for($i<0;$i<$jml;$i++){
                  echo "<li ><a href=".site_url('Berita/tabel_berita/').$id_berita[$i]." style='margin-bottom:15px;'>".$topik_berita[$i]."</a></li>";
                  // echo "<hr>";
                }
                ?>
                <!-- <li><a href=''></a></li> -->
              </ul>
            </li>
            <li class="nav-parent"><a href=""><i class="fa fa-cube"></i> <span>Program Media</span></a>
              <ul class="children">
                <li class='active'><a href='<?php echo site_url('ProgramMedia/wawancara');?>'>Wawancaran</a></li>
                <li><a href='<?php echo site_url('ProgramMedia/press_release');?>'>Press Release</a></li>
                <li><a href='<?php echo site_url('ProgramMedia/konferensi_pers');?>'>Konferensi Pers</a></li>
                <li><a href='<?php echo site_url('ProgramMedia/liputan_lapangan');?>'>Liputan Lapangan</a></li>
                <li><a href='<?php echo site_url('ProgramMedia/diskusi_media');?>'>Diskusi Media</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('Media');?>"><i class="fa fa-list-alt"></i> <span>Media & Title</span></a></li>
            <li><a href="<?php echo site_url('Trend');?>"><i class="fa fa-list-ol"></i> <span>Trend Berita</span></a></li>
            <li><a href="<?php echo site_url('Grafik');?>"><i class="fa fa-pie-chart"></i> <span>Grafik</span></a></li>
          </ul>
        </div><!-- tab-pane -->

        <!-- ######################## POST MENu ##################### -->

        <div class="tab-pane" id="emailmenu">
          <div class="sidebar-btn-wrapper">
            <a href="<?php echo site_url('Dashboard/post');?>" class="btn btn-danger btn-block">Post Berita</a>
          </div>
        </div><!-- tab-pane -->


      </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <!--<div class="pageheader">
    <h2><i class="fa fa-home"></i> Dashboard</h2>
  </div>-->

      <div class="contentpanel">

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-announcement">
              <ul class="panel-options">
                <li><a><i class="fa fa-refresh"></i></a></li>
                <li><a class="panel-remove"><i class="fa fa-remove"></i></a></li>
              </ul>
              <div class="panel-heading">
                <h4 class="panel-title">Berita Hari Ini</h4>
              </div>
              <div class="panel-body">
                <h2><br>
                  Pilih berita mana yang akan ditampilkan:</h2>
                  <script>
                  function showRSS(str) {
                    if (str.length==0) {
                      document.getElementById("rssOutput").innerHTML="";
                      return;
                    }
                    if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp=new XMLHttpRequest();
                    } else {  // code for IE6, IE5
                      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function() {
                      if (this.readyState==4 && this.status==200) {
                        document.getElementById("rssOutput").innerHTML=this.responseText;
                      }
                    }
                    xmlhttp.open("GET","<?php echo base_url();?>assets/crawl.php?q="+str,true);
                    xmlhttp.send();
                  }
                  </script>


                  <form>
                    <select onchange="showRSS(this.value)">
                      <option value="">Select an RSS-feed:</option>
                      <option value="Antara">Antara News</option>
                      <option value="Balipost">Bali Post</option>
                      <option value="CNN">CNN Indonesia</option>
                      <option value="Detik">Detik.com</option>
                      <option value="Kompas">Kompas.com</option>
                      <option value="Liputan6">Liputan6.com</option>
                      <option value="PR">Pikiran Rakyat</option>
                      <option value="Republika">Republika</option>
                      <option value="SM">Suara Merdeka</option>
                      <option value="Tirto">Tirto.id</option>
                      <option value="Tribun">Tribun News</option>
                      <option value="TVOne">TV One News</option>
                      <option value="Vivanews">Vivanews</option>
                      <option value="VOA">VOA News</option>
                    </select>
                  </form>
                  <br>
                  <div id="rssOutput">RSS-feed will be listed here...</div>
                </div>
              </div><!-- panel -->









            <div class="row panel-statistics">
              <div class="col-sm-6">
                <div class="panel panel-updates">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-7 col-lg-8">
                        <h4 class="panel-title text-success">Netral</h4>
                        <h3><?=$jml_netral;?></h3>
                        <div class="progress">
                          <div style="width: 75.7%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75.7" role="progressbar" class="progress-bar progress-bar-success">
                            <span class="sr-only">75.7% Complete (success)</span>
                          </div>
                        </div>
                        <p>Added products for this month: 75</p>
                      </div>
                      <div class="col-xs-5 col-lg-4 text-right">
                        <input type="text" value="75" class="dial-success">
                      </div>
                    </div>
                  </div>
                </div><!-- panel -->
              </div><!-- col-sm-6 -->

              <div class="col-sm-6">
                <div class="panel panel-danger-full panel-updates">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-7 col-lg-8">
                        <h4 class="panel-title text-warning">Negatif</h4>
                        <h3><?=$jml_negatif;?></h3>
                        <div class="progress">
                          <div style="width: 39.9%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="39.9" role="progressbar" class="progress-bar progress-bar-warning">
                            <span class="sr-only">39.9% Complete (success)</span>
                          </div>
                        </div>
                        <p>Rejected products for this month: 45</p>
                      </div>
                      <div class="col-xs-5 col-lg-4 text-right">
                        <input type="text" value="45" class="dial-warning">
                      </div>
                    </div>
                  </div>
                </div><!-- panel -->
              </div><!-- col-sm-6 -->

              <div class="col-sm-6">
                <div class="panel panel-success-full panel-updates">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-7 col-lg-8">
                        <h4 class="panel-title text-success">Positif</h4>
                        <h3><?=$jml_positif;?></h3>
                        <div class="progress">
                          <div style="width: 55.4%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="55.4" role="progressbar" class="progress-bar progress-bar-info">
                            <span class="sr-only">55.4% Complete (success)</span>
                          </div>
                        </div>
                        <p>Sold products for this month: 1,203</p>
                      </div>
                      <div class="col-xs-5 col-lg-4 text-right">
                        <input type="text" value="55" class="dial-info">
                      </div>
                    </div>
                  </div>
                </div><!-- panel -->
              </div><!-- col-sm-6 -->

              <div class="col-sm-6">
                <div class="panel panel-updates">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-7 col-lg-8">
                        <h4 class="panel-title text-danger">Products Returned</h4>
                        <h3>22.1%</h3>
                        <div class="progress">
                          <div style="width: 22.1%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="22.1" role="progressbar" class="progress-bar progress-bar-danger">
                            <span class="sr-only">22.1% Complete (success)</span>
                          </div>
                        </div>
                        <p>Returned products this month: 22</p>
                      </div>
                      <div class="col-xs-5 col-lg-4 text-right">
                        <input type="text" value="22" class="dial-danger">
                      </div>
                    </div>
                  </div>
                </div><!-- panel -->
              </div><!-- col-sm-6 -->

            </div><!-- row -->





          </div><!-- col-md-12 -->

        </div><!-- row -->

      </div><!-- contentpanel -->

    </div><!-- mainpanel -->

  </section>



</body>
</html>
