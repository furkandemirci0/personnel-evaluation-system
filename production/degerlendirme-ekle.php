
<?php include 'header.php';
 ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Değerlendirme Yönetim Paneli</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Değerlendirme Ekleme</small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yönetici Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <?php  

                  $DegYoneticiID=$ayarcek['YoneticiID']; // çalışanın departmanid

                  $yoneticisor=$db->prepare("select * from yonetici");
                  $yoneticisor->execute(array());

                    ?>
                    <select class="select2_multiple form-control" required="" name="YoneticiID" >


                     <?php 

                     while($yoneticicek=$yoneticisor->fetch(PDO::FETCH_ASSOC)) {

                       $DegID=$yoneticicek['YoneticiID'];

                       ?>

                       <option <?php if ($DegID==$DegYoneticiID) { echo "selected='select'"; } ?> value="<?php echo $yoneticicek['YoneticiID']; ?>"><?php echo $yoneticicek['Ad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>

                
                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Çalışan Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <?php  

                  $DegCalisanID=$ayarcek['CalisanID']; // çalışanın departmanid

                  $calisansor=$db->prepare("select * from calisan");
                  $calisansor->execute(array());

                    ?>
                    <select class="select2_multiple form-control" required="" name="CalisanID" >


                     <?php 

                     while($calisancek=$calisansor->fetch(PDO::FETCH_ASSOC)) {

                       $DegID=$calisancek['CalisanID'];

                       ?>

                       <option <?php if ($DegID==$DegCalisanID) { echo "selected='select'"; } ?> value="<?php echo $calisancek['CalisanID']; ?>"><?php echo $calisancek['Ad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>


                 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soru <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="departman-name" required="required" class="form-control col-md-7 col-xs-12" name="Soru">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cevap <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="departman-name" required="required" class="form-control col-md-7 col-xs-12" name="Cevap">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Puan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" min="1" max="100" id="departman-name" required="required" class="form-control col-md-7 col-xs-12" name="Puan">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="degerlendirmeekle" class="btn btn-success">Kaydet</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
  <?php include 'footer.php'; ?>