<?php

	try{
	$VeritabaniBaglantisi	=	new PDO("mysql:host=localhost;dbname=stajtakipotomasyonu;charset=UTF8", "root", "");
	}
	catch(PDOException $Hata)
	{
		//echo "Bağlantı Hatası<br />" . $Hata->getMessage(); // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
		die();
	}
	


 


?>