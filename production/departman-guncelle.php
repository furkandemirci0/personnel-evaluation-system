
<?php include 'header.php';

$id = $_GET['id'];

$ayarsor=$db->prepare("select * from departman where DepartmanID=$id");
$ayarsor->execute(array( 
 
));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
 ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Departman Yönetim Paneli</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Departman Güncelleme</small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Departman Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="departman-name" required="required" class="form-control col-md-7 col-xs-12" name="DepartmanAd" value=" <?php echo $ayarcek['DepartmanAd'] ?> ">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <input type="hidden" name="DepartmanID" value="<?php echo $id ?>">
                          <button type="submit" name="departmanguncelle" class="btn btn-success">Güncelle</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
  <?php include 'footer.php'; ?>