<?php 
include 'baglan.php';
include 'css.php';
ob_start();
session_start();

$kullanicisor=$db->prepare("select * from kullanici where KullaniciAdi=:KullaniciAdi");
$kullanicisor->execute(array( 
    'KullaniciAdi' => $_SESSION['KullaniciAdi']
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['KullaniciAdi'])) {
  header("Location:login.php");
}
?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              
                <img src="images/logo.png" alt="..." class="img-circle profile_img">
              
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix" style="margin-top: 25px;">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2><?php echo $kullanicicek['Isim'] . ' ' .$kullanicicek['Soyisim']  ?></h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa</a>
                  <li><a href="yoneticiler.php"><i class="fa fa-id-card"></i> Yöneticiler</a> 
                  <li><a href="calisanlar.php"><i class="fa fa-users"></i> Çalışanlar</a>
                  <li><a href="departmanlar.php"><i class="fa fa-sitemap"></i> Departmanlar</a>
                  <li><a href="degerlendirmeler.php"><i class="fa fa-question-circle"></i> Değerlendirmeler</a> 
                  <li><a href="takvim.php"><i class="fa fa-calendar"></i> Takvim</a>  

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $kullanicicek['Isim'] . ' ' .$kullanicicek['Soyisim']  ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profil.php"> Profil</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->