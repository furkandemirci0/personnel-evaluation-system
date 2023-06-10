
<?php include 'header.php';

$id = $_GET['id'];

$ayarsor=$db->prepare("SELECT calisan.CalisanID, calisan.Eposta, calisan.KimlikNo, calisan.Ad, calisan.Soyad, calisan.Telefon, calisan.Unvan, departman.DepartmanAd, calisan.DepartmanID
FROM calisan
INNER JOIN departman
ON calisan.DepartmanID = departman.DepartmanID where CalisanID=$id");
$ayarsor->execute(array( 
 
));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);



 ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Çalışan Yönetim Paneli</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Çalışan Güncelleme</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <br />
                    <form id="demo-form2" action="islem.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kimlik Numarası <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="KimlikNo" value=" <?php echo $ayarcek['KimlikNo'] ?> ">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Ad" value=" <?php echo $ayarcek['Ad'] ?> ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Soyad" value=" <?php echo $ayarcek['Soyad'] ?> ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-Posta <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Eposta" value=" <?php echo $ayarcek['Eposta'] ?> ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Telefon" value=" <?php echo $ayarcek['Telefon'] ?> ">
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Departman <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <!-- Kategori seçme başlangıç -->

                  <?php  

                   $CalisanDepartmanID=$ayarcek['DepartmanID']; // çalışanın departmanid

                  $departmansor=$db->prepare("select * from departman");
                  $departmansor->execute(array(
                    ));

                    ?>
                    <select class="select2_multiple form-control" required="" name="DepartmanID" >


                     <?php 

                     while($departmancek=$departmansor->fetch(PDO::FETCH_ASSOC)) {

                       $DepartmanID=$departmancek['DepartmanID'];

                       ?>

                       <option <?php if ($DepartmanID==$CalisanDepartmanID) { echo "selected='select'"; } ?> value="<?php echo $departmancek['DepartmanID']; ?>"><?php echo $departmancek['DepartmanAd']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>

                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unvan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="Unvan" value=" <?php echo $ayarcek['Unvan'] ?> ">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="CalisanID" value="<?php echo $id ?>">
                          <button type="submit" name="calisanguncelle" class="btn btn-success">Güncelle</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
  <?php include 'footer.php'; ?>