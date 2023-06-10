<?php include 'header.php'; 
 $calisansor=$db->prepare("SELECT count(*) FROM calisan");
 $calisansor->execute();
 $calisancek = $calisansor->fetch(PDO::FETCH_NUM);
 $calisansayi = $calisancek[0];

 $calisanliste=$db->prepare("select * from calisan limit 7");
 $calisanliste->execute();

 $yoneticisor=$db->prepare("SELECT count(*) FROM yonetici");
 $yoneticisor->execute();
 $yoneticicek = $yoneticisor->fetch(PDO::FETCH_NUM);
 $yoneticisayi = $yoneticicek[0];

 $yoneticiliste=$db->prepare("select * from yonetici limit 7");
 $yoneticiliste->execute();

 $departmansor=$db->prepare("SELECT count(*) FROM departman");
 $departmansor->execute();
 $departmancek = $departmansor->fetch(PDO::FETCH_NUM);
 $departmansayi = $departmancek[0];

 $departmanliste=$db->prepare("select * from departman limit 7");
 $departmanliste->execute();

 $degerlendirmesor=$db->prepare("SELECT count(*) FROM degerlendirme limit 7");
 $degerlendirmesor->execute();
 $degerlendirmecek = $degerlendirmesor->fetch(PDO::FETCH_NUM);
 $degerlendirmesayi = $degerlendirmecek[0];
?>

<div class="right_col" role="main">
          <div class="">
          
            <div class="row top_tiles">
              <div class="animated flipInY col-md-12">
                <div class="tile-stats">
                
                <a class="weatherwidget-io" href="https://forecast7.com/tr/38d9635d24/turkey/" data-label_1="Istanbul" data-label_2="Hava Durumu" data-theme="original" data-basecolor="#2b3e54" >Istanbul Hava Durumu</a>
              <script>
              !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
              </script>  
                </div>
              </div>
              
              
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count"><?php echo $yoneticisayi ?></div>
                  <h3>Toplam Yönetici</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php echo $calisansayi ?></div>
                  <h3>Toplam Çalışan</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php echo $departmansayi ?></div>
                  <h3>Toplam Departman</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $degerlendirmesayi ?></div>
                  <h3>Toplam Değerlendirme</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Yöneticiler</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php 
                            while ($yoneticilistecek=$yoneticiliste->fetch(PDO::FETCH_ASSOC)) {?>
                  <div class="x_content">
                    <article class="media event">
                      <div class="media-body">
                        <a class="title" href="#"><?php echo $yoneticilistecek['Ad'] . ' ' . $yoneticilistecek['Soyad'] ?></a>
                      </div>
                    
                    </article> 
                  </div>
                  <?php }
                             ?>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Çalışanlar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  $sayac = 0;
                    while ($calisanlistecek=$calisanliste->fetch(PDO::FETCH_ASSOC)) 
                    { ?>            
                  <div class="x_content">
                    <article class="media event">
                      <div class="media-body">
                        <a class="title" href="#"><?php echo $calisanlistecek['Ad'] . ' ' . $calisanlistecek['Soyad']?></a>
                      </div>
                    </article> 
                  </div>               
                  <?php 
                
                } 
                             ?>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Departmanlar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php 
                            while ($departmanlistecek=$departmanliste->fetch(PDO::FETCH_ASSOC)) {?>
                  <div class="x_content">
                    <article class="media event">
                      <div class="media-body">
                        <a class="title" href="#"><?php echo $departmanlistecek['DepartmanAd']?></a>
                      </div>
                    </article> 
                  </div>
                  <?php }
                             ?>
                </div>
              </div>
            </div>
            <div class="row">
            
                
                                <!-- Start to do list -->
                                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Yapılacaklar</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="">
                        <ul class="to_do">

                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Pazarlama departmanın personellerinin değerlendirilmesi.</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Personel kayıtlarının yapılması.</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Yeni kullanıcı kayıtları.</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Departman girişlerinin yapılması.</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Performans ölçeklerinin tanınması.</p>
                          </li>
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> Çalışanlarla genel sohbet.</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End to do list -->
            </div>
<?php include 'footer.php'; ?>