<?php include 'header.php';

$calisansor=$db->prepare(
  "SELECT calisan.CalisanID, calisan.KimlikNo, calisan.Ad, calisan.Soyad, calisan.Telefon, calisan.Unvan, departman.DepartmanAd
  FROM calisan
  INNER JOIN departman
  ON calisan.DepartmanID = departman.DepartmanID"
);
$calisansor->execute();
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
                    <h2>Çalışan Listesi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <?php 
                    
                    if($count==1) { ?>
                      <a href="calisan-ekle.php" name="yenicalisan" class="btn btn-sm btn-success">Yeni Çalışan</a>
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
                          <th class="text-center">Kimlik Numarası</th>
                          <th class="text-center">Ad</th>
                          <th class="text-center">Soyad</th>                         
                          <th class="text-center">Departman</th>
                          <th class="text-center">Ünvan</th>
                          <th class="text-center">Aksiyon</th>
                        </tr>
                      </thead>
                      <tbody>

                      
                            <?php 

                            while ($calisancek=$calisansor->fetch(PDO::FETCH_ASSOC)) {?>
                              
                              <tr>
                              <td><?php echo $calisancek['KimlikNo'] ?></td>
                              <td><?php echo $calisancek['Ad'] ?></td>
                              <td><?php echo $calisancek['Soyad'] ?></td>
                              <td><?php echo $calisancek['DepartmanAd'] ?></td>
                              <td><?php echo $calisancek['Unvan'] ?></td>
                              <td><center>
                              <?php $CalisanID= $calisancek['CalisanID'];
                              
                              if($count==1){ ?>
                                <a href="calisan-guncelle.php?id=<?php echo $CalisanID ?> " class="btn btn-sm btn-warning">Düzenle</a>
                                <a href="islem.php?id=<?php echo $CalisanID;?>&calisansil=ok" class="btn btn-sm btn-danger">Sil</a>
                              </td>
                              </center>
                              </tr>                                
                                
                              <?php }
                             ?><?php }
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