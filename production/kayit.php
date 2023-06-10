<?php include 'css.php';
include 'baglan.php';
?>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="islem.php" method="POST">
              <h1>Kayıt Paneli</h1>

              <div class="form-group">
                </label>
                

                  <?php  
                  $rolsor=$db->prepare("select * from rol");
                  $rolsor->execute(array());

                    ?>
                    <select class="select2_multiple form-control" required="" name="RolID" >


                     <?php 

                     while($rolcek=$rolsor->fetch(PDO::FETCH_ASSOC)) {

                       $RolID=$rolcek['RolID'];

                       ?>

                       <option value="<?php echo $rolcek['RolID']; ?>"><?php echo $rolcek['Rol']; ?></option>

                       <?php } ?>

                     </select>
                   
                 </div>





              <div>
                <input type="text" name="Isim" class="form-control" placeholder="İsim" required="" />
              </div>
              <div>
                <input type="text" name="Soyisim" class="form-control" placeholder="Soyisim" required="" />
              </div>
              <div>
                <input type="text" name="KullaniciAdi" class="form-control" placeholder="Kullanıcı Adı" required="" />
              </div>
              <div>
                <input type="password" name="Sifre" class="form-control" placeholder="Şifre" required="" />
              </div>
              <div>

              <button type="submit" name="kullanicikaydet" class="btn btn-default btn-success">Kayıt Ol!</button>
              <br>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-user"></i> Personel Değerlendirme Sistemi!</h1>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
