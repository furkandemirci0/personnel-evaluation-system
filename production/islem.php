<?php 
include 'baglan.php';
ob_start();
session_start();



if (isset($_POST['adminGiris'])) {
	$KullaniciAdi = $_POST['KullaniciAdi'];
	$Sifre = $_POST['Sifre'];

	$kullanicisor=$db->prepare(
		"select * from kullanici where KullaniciAdi=:KullaniciAdi and Sifre=:Sifre");
	$kullanicisor->execute(array(
		'KullaniciAdi'=> $KullaniciAdi,
		'Sifre' => $Sifre
	));
	$count=$kullanicisor->rowCount();

	if($count==1) {
		$_SESSION['KullaniciAdi'] = $KullaniciAdi;
		header("location:index.php");
		exit;
	}
	else {
		header("location:login.php");
		exit;
	}	
}




if (isset($_POST['calisanguncelle'])) {
	$id=$_POST['CalisanID'];
	
$calisanguncelle=$db->prepare("update calisan set
		KimlikNo=:KimlikNo,
		Ad=:Ad,
		Soyad=:Soyad,
		Eposta=:Eposta,
		Telefon=:Telefon,
		DepartmanID=:DepartmanID,
		Unvan=:Unvan
		where CalisanID=$id");	
	$update=$calisanguncelle->execute(array(
		'KimlikNo' => $_POST['KimlikNo'],
		'Ad' => $_POST['Ad'],
		'Soyad' => $_POST['Soyad'],
		'Eposta' => $_POST['Eposta'],
		'Telefon' => $_POST['Telefon'],
		'DepartmanID' => $_POST['DepartmanID'],
		'Unvan' => $_POST['Unvan']
	));
	if ($update) {
		header("location:calisanlar.php?durumupdate=ok");
	}
	else {
		header("location:calisanlar.php?durumupdate=no");
	}
}


if ($_GET['calisansil']=="ok") {
	$sil=$db->prepare("delete from calisan where CalisanID=:id");
	$delete=$sil->execute(array(
		'id'=> $_GET['id']

	));

	if ($delete) {
		header("location:calisanlar.php?durumdelete=ok");
	}
	else {
		header("location:calisanlar.php?durumdelete=no");
	}
}


if (isset($_POST['calisankaydet'])) {
	
$calisanekle=$db->prepare("insert into calisan set
		KimlikNo=:KimlikNo,
		Ad=:Ad,
		Soyad=:Soyad,
		Eposta=:Eposta,
		Telefon=:Telefon,
		DepartmanID=:DepartmanID,
		Unvan=:Unvan");	
	$insert=$calisanekle->execute(array(
		'KimlikNo' => $_POST['KimlikNo'],
		'Ad' => $_POST['Ad'],
		'Soyad' => $_POST['Soyad'],
		'Eposta' => $_POST['Eposta'],
		'Telefon' => $_POST['Telefon'],
		'DepartmanID' => $_POST['DepartmanID'],
		'Unvan' => $_POST['Unvan']
	));

	if ($insert) {
		header("location:calisanlar.php?durumadd=ok");
	}
	else {
		header("location:calisanlar.php?durumadd=no");
	}
}

if (isset($_POST['kullanicikaydet'])) {
	$id=$_POST['RolID'];
	$kullaniciekle=$db->prepare("insert into kullanici set
			Isim=:Isim,
			Soyisim=:Soyisim,
			KullaniciAdi=:KullaniciAdi,
			Sifre=:Sifre,
			RolID=:RolID
			");	
		$insert=$kullaniciekle->execute(array(
			'Isim' => $_POST['Isim'],
			'Soyisim' => $_POST['Soyisim'],
			'KullaniciAdi' => $_POST['KullaniciAdi'],
			'Sifre' => $_POST['Sifre'],
			'RolID' => $_POST['RolID']
		));
	
		if ($insert) {
			header("location:login.php?durumadd=ok");
		}
		else {
			header("location:login.php?durumadd=no");
		}
	}

	if (isset($_POST['kullaniciGuncelle'])) {
		$ad = $_SESSION['KullaniciAdi'];

		$ayarsor=$db->prepare("SELECT KullaniciId
		FROM kullanici where KullaniciAdi = '$ad'");
		$ayarsor->execute(array());
		$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
		$id=$ayarcek['KullaniciId'];

		$kullaniciguncelle=$db->prepare("update kullanici set
				Isim=:Isim,
				Soyisim=:Soyisim,
				KullaniciAdi=:KullaniciAdi,
				Sifre=:Sifre 
				where KullaniciId=$id
				");	
			$update=$kullaniciguncelle->execute(array(
				'Isim' => trim($_POST['Isim']),
				'Soyisim' => $_POST['Soyisim'],
				'KullaniciAdi' => trim($_POST['KullaniciAdi']),
				'Sifre' => trim($_POST['Sifre'])
			));
		
			if ($update) {
				header("location:login.php?durumupdate=ok");
				session_destroy();
			}
			else {
				header("location:profil.php?durumupdate=no");
			}
		}
	

if (isset($_POST['departmankaydet'])) {
	
$departmanekle=$db->prepare("insert into departman set		
		DepartmanAd=:DepartmanAd
		");	
	$insert=$departmanekle->execute(array(
		'DepartmanAd' => $_POST['DepartmanAd']
	));

	if ($insert) {
		header("location:departmanlar.php?durumadd=ok");
	}
	else {
		header("location:departmanlar.php?durumadd=no");
	}
}

if (isset($_POST['departmanguncelle'])) {
	$id=$_POST['DepartmanID'];
$departmanguncelle=$db->prepare("update departman set		
		DepartmanAd=:DepartmanAd
		where DepartmanID = $id
		");	
	$update=$departmanguncelle->execute(array(
		'DepartmanAd' => $_POST['DepartmanAd']
	));

	if ($update) {
		header("location:departmanlar.php?durumupdate=ok");
	}
	else {
		header("location:departmanlar.php?durumupdate=no");
	}
}

if ($_GET['departmansil']=="ok") {
	$sil=$db->prepare("delete from departman where DepartmanID=:id");
	$delete=$sil->execute(array(
		'id'=> $_GET['id']
	));

	if ($delete) {
		header("location:departmanlar.php?durumdelete=ok");
	}
	else {
		header("location:departmanlar.php?durumdelete=no");
	}
}


if (isset($_POST['yoneticiguncelle'])) {
	$id=$_POST['YoneticiID'];
$yoneticiguncelle=$db->prepare("update yonetici set
		KimlikNo=:KimlikNo,
		Ad=:Ad,
		Soyad=:Soyad,
		Eposta=:Eposta,
		Telefon=:Telefon,
		DepartmanID=:DepartmanID,
		Unvan=:Unvan
		where YoneticiID=$id");	
	$update=$yoneticiguncelle->execute(array(
		'KimlikNo' => $_POST['KimlikNo'],
		'Ad' => $_POST['Ad'],
		'Soyad' => $_POST['Soyad'],
		'Eposta' => $_POST['Eposta'],
		'Telefon' => $_POST['Telefon'],
		'DepartmanID' => $_POST['DepartmanID'],
		'Unvan' => $_POST['Unvan']
	));

	if ($update) {
		header("location:yoneticiler.php?durumupdate=ok");
	}
	else {
		header("location:yoneticiler.php?durumupdate=no");
	}
}

if ($_GET['yoneticisil']=="ok") {
	$sil=$db->prepare("delete from yonetici where YoneticiID=:id");
	$delete=$sil->execute(array(
		'id'=> $_GET['id']

	));

	if ($delete) {
		header("location:yoneticiler.php?durumdelete=ok");
	}
	else {
		header("location:yoneticiler.php?durumdelete=no");
	}
}


if (isset($_POST['yoneticikaydet'])) {
	
$yoneticiekle=$db->prepare("insert into yonetici set
		KimlikNo=:KimlikNo,
		Ad=:Ad,
		Soyad=:Soyad,
		Eposta=:Eposta,
		Telefon=:Telefon,
		DepartmanID=:DepartmanID,
		Unvan=:Unvan");	
	$insert=$yoneticiekle->execute(array(
		'KimlikNo' => $_POST['KimlikNo'],
		'Ad' => $_POST['Ad'],
		'Soyad' => $_POST['Soyad'],
		'Eposta' => $_POST['Eposta'],
		'Telefon' => $_POST['Telefon'],
		'DepartmanID' => $_POST['DepartmanID'],
		'Unvan' => $_POST['Unvan']
	));

	if ($insert) {
		header("location:yoneticiler.php?durumadd=ok");
	}
	else {
		header("location:yoneticiler.php?durumadd=no");
	}
}

	if ($_GET['degerlendirmesil']=="ok") {
		$sil=$db->prepare("delete from degerlendirme where DegID=:id");
		$delete=$sil->execute(array(
			'id'=> $_GET['id']
		));
	
		if ($delete) {
			header("location:degerlendirmeler.php?durumdelete=ok");
		}
		else {
			header("location:degerlendirmeler.php?durumdelete=no");
		}
	}

	function getDatetimeNow() {
		$tz_object = new DateTimeZone('Europe/Istanbul');	
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		return $datetime->format('Y\-m\-d\ h:i:s');
	}

	if (isset($_POST['degerlendirmeguncelle'])) {

		$id=$_POST['DegID'];
		$degerlendirmeguncelle=$db->prepare("update degerlendirme set
			Tarih=:Tarih,
			CalisanID=:CalisanID,
			YoneticiID=:YoneticiID,
			Soru=:Soru,
			Cevap=:Cevap,
			Puan=:Puan
			where DegID=$id");	
		$update=$degerlendirmeguncelle->execute(array(
			'Tarih' => getDatetimeNow(),
			'CalisanID' => $_POST['CalisanID'],
			'YoneticiID' => $_POST['YoneticiID'],
			'Soru' => $_POST['Soru'],
			'Cevap' => $_POST['Cevap'],
			'Puan' => $_POST['Puan']

		));
		if ($update) {
			header("location:degerlendirmeler.php?durumupdate=ok");
		}
		else {
			header("location:degerlendirmeler.php?durumupdate=no");
		}
	}

	

	if (isset($_POST['degerlendirmeekle'])) {

		$degerlendirmeekle=$db->prepare("insert into degerlendirme set
			Tarih=:Tarih,
			CalisanID=:CalisanID,
			YoneticiID=:YoneticiID,
			Soru=:Soru,
			Cevap=:Cevap,
			Puan=:Puan");	
		$update=$degerlendirmeekle->execute(array(
			'Tarih' => getDatetimeNow(),
			'CalisanID' => $_POST['CalisanID'],
			'YoneticiID' => $_POST['YoneticiID'],
			'Soru' => $_POST['Soru'],
			'Cevap' => $_POST['Cevap'],
			'Puan' => $_POST['Puan']
		));
		if ($update) {
			header("location:degerlendirmeler.php?durumupdate=ok");
		}
		else {
			header("location:degerlendirmeler.php?durumupdate=no");
		}
	}

	 
?>