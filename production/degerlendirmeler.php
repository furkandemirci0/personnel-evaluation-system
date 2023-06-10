<?php include 'header.php';

$degerlendirmesor=$db->prepare("
SELECT degerlendirme.DegID, degerlendirme.tarih, degerlendirme.CalisanID, calisan.Ad, calisan.CalisanID, yonetici.YoneticiID, 
degerlendirme.Soru,degerlendirme.Cevap,yonetici.ad, yonetici.soyad, calisan.Soyad, Puan
  FROM degerlendirme
  INNER JOIN calisan
  ON degerlendirme.CalisanID = calisan.CalisanID
  INNER JOIN yonetici
  ON degerlendirme.YoneticiID = yonetici.YoneticiID
");
$degerlendirmesor->execute();
$KullaniciAdi = $_SESSION['KullaniciAdi'];
$rolsor =$db->prepare("select count(*) from kullanici where KullaniciAdi='$KullaniciAdi' and RolID='1'");
$rolsor->execute(array());   
    while($rolcek=$rolsor->fetch(PDO::FETCH_ASSOC)) {
        $count = $rolcek['count(*)']; }
?>



<form id="demo-form2" action="islem.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Değerlendirme Listesi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <?php 
                    
                    if($count==1) { ?>
                      <a href="degerlendirme-ekle.php" name="yenidegerlendirme" class="btn btn-sm btn-success">Yeni Değerlendirme</a>
                      <?php }
                             ?>

                    
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      


                      <?php 

                    if ($_GET['durumdelete']=="ok") {?>
                      <b style="color: green">Silme İşlemi Başarılı</b>
                      <?php }
                    if($_GET['durumdelete']=="no") { ?>
                        <b style="color: red">Silme İşlemi Başarısız</b> 
                     <?php }

                    if ($_GET['durumupdate']=="ok") {?>
                      <b style="color: green">Güncelleme İşlemi Başarılı</b>
                      <?php }
                    if($_GET['durumupdate']=="no") { ?>
                        <b style="color: red">Güncelleme İşlemi Başarısız</b> 
                     <?php }

                     if ($_GET['durumadd']=="ok") {?>
                      <b style="color: green">Ekleme İşlemi Başarılı</b>
                      <?php }
                    if($_GET['durumadd']=="no") { ?>
                        <b style="color: red">Ekleme İşlemi Başarısız</b> 
                     <?php }

                     ?>

                     
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                      <thead>
                        <tr>
                        <th class="text-center">Yönetici</th> 
                        <th class="text-center">Çalışan</th>
                        <th class="text-center">Tarih</th>                   
                        <th class="text-center">Soru</th>
                        <th class="text-center">Cevap</th>
                        <th class="text-center">Puan</th>
                        <th class="text-center">Aksiyon</th>

                        </tr>
                      </thead>
                      <tbody>
                            <?php 
                            while ($degerlendirmecek=$degerlendirmesor->fetch(PDO::FETCH_ASSOC)) {?>
                              
                              <tr>
                              <td><?php echo $degerlendirmecek['ad'] . implode([' ']) . $degerlendirmecek['soyad'] ?></td>
                              <td><?php echo $degerlendirmecek['Ad'] . implode([' ']) . $degerlendirmecek['Soyad'] ?></td>
                              <td><?php echo $degerlendirmecek['tarih'] ?></td>
                              <td><?php echo $degerlendirmecek['Soru'] ?></td>
                              <td><?php echo $degerlendirmecek['Cevap'] ?></td>
                              <td><?php echo $degerlendirmecek['Puan'] ?></td>


                              <td><center>
                              <?php $DegID= $degerlendirmecek['DegID'];
                              if($count==1){ ?>
                                <a href="degerlendirme-guncelle.php?id=<?php echo $DegID ?> " class="btn btn-sm btn-warning">Düzenle</a>
                                <a href="islem.php?id=<?php echo $DegID;?>&degerlendirmesil=ok" class="btn btn-sm btn-danger">Sil</a>
                              </td>
                              </center>
                              </tr>                                
                                
                              <?php }
                             ?>
                              
                    
                                <?php }
                             ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>           
            </div>
          </div>
        </div>
      </form>
<?php include 'footer.php'; ?>