<?php include 'css.php' ?>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="islem.php" method="POST">
              <h1>Giriş Paneli</h1>
              <?php if ($_GET['durumadd']=="ok") {?>
                      <b style="color: green">Kayıt İşlemi Başarılı</b>
                      <?php }
                    if($_GET['durumadd']=="no") { ?>
                        <b style="color: red">Kayıt İşlemi Başarısız</b> 
                     <?php } ?>
              <div>
                <input type="text" name="KullaniciAdi" class="form-control" placeholder="Kullanıcı Adı" required="" />
              </div>
              <div>
                <input type="password" name="Sifre" class="form-control" placeholder="Şifre" required="" />
              </div>
              <div>
              <button type="submit" name="adminGiris" class="btn btn-default btn-success">Giriş Yap</button>
              <br>
              <a href="kayit.php" style=width:160px; class="btn btn-default btn-info">Kayıt Ol</a>
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
