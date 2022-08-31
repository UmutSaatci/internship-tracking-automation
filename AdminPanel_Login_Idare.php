<?php include 'Include/Connection.php'; 
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Ana Sayfa</title>
    <style>
    	body {
            background-color:#EEEEEE;
    	}

    </style>
</head>
<body>
    
        <div style="border: 1px solid; border-color:white; border-radius: 20px; margin:100px 0px 0px 400px; width: 500px; height:420px; padding:10px 0px 10px 15px; background-color:white; box-shadow: 3px 3px 4px #000;">
           <h4 style="color:#0E185F;">Staj Takip Sistemi Bilgi İşlem Giriş Sayfası</h4>
           <p style="color:#0E185F;">Sisteme giriş yapmak için bilgilerinizi giriniz.</p> <hr>
           <div class="mt-3" style=" text-align:center;"><img src="resimler/idare.jpeg"></div>
         <form action="giris_sonuc4.php" method="post">
    <div class="input-group mb-3 mt-3" style="width: 400px;"> 
  <span class="input-group-text" id="basic-addon1" style="border:none;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg></span>
 <input type="mail" class="form-control" name="EmailAdresi" placeholder="E-mail adresinizi giriniz" aria-label="Username" aria-describedby="basic-addon1">
</div>


<div class="input-group mb-3" style="width: 400px;">
  <span class="input-group-text" id="basic-addon1" style="border:none;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
</svg></span>
  <input type="password" name="Sifre" class="form-control" placeholder="Şifre">
</div>
<div style="float: right; margin-right:80px;">
<div class="input-group mb-3" >
<input class="btn" type="submit" name="GirisYap" value="Giriş Yap" style="background-color:#0E185F; color:white;">
</div>
</div>
   </div>
  </form>
</body>
</html>
