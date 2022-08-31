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
  <link rel="stylesheet" type="text/css" href="resim.css">
  <title>Ana Sayfa</title>

  <style>
    body {

      background-color: #EEEEEE;

    }
  </style>
</head>

<body>

  <div style="border: 1px solid; border-color:white; border-radius: 20px; margin:100px 0px 0px 400px; width: 550px; height:400px; padding:10px 0px 10px 15px; background-color:white; box-shadow: 3px 3px 4px #000;">
    <h4 style="color:#0E185F;">Staj Takip Sistemine Hoşgeldiniz</h4>
    <p style="color:#0E185F;">Sisteme giriş yapmak için ilgili butona tıklayınız.</p>
    <hr>
    <div class="mt-5">
      <div class="row">
        <div class="col-3"><a href="AdminPanel_Login_Ogrenci.php" style="text-decoration:none;"><img src="resimler/ogrenci.jpeg" style="width:100px;"></a></div>
        <div class="col-3"><a href="AdminPanel_Login_Danisman.php" style="text-decoration:none; color:#0E185F;"><img src="resimler/danisman.jpeg" style="width:100px; margin-top:30px;"></a></div>
        <div class="col-3"> <a href="AdminPanel_Login_BolumBaskani.php" style="text-decoration:none; color:#0E185F;"><img src="resimler/bolum_baskani.png" style="width:100px; margin-top:25px;"></a></div>
        <div class="col-3"> <a href="AdminPanel_Login_Idare.php" style="text-decoration:none; color:#0E185F;"><img src="resimler/idare.jpeg" style="width:100px;"></a></div>
      </div>
      
      </div>
      <div class="row">
        <div class="col-3" style="text-align:center;"><a href="AdminPanel_Login_Ogrenci.php" style="text-decoration:none; color:#0E185F; font-weight:bold;">Öğrenci</a></div>
        <div class="col-3" style="text-align:center;"> <a href="AdminPanel_Login_BolumBaskani.php" style="text-decoration:none; color:#0E185F; font-weight:bold;">Danışman</a></div>
        <div class="col-3" style="text-align:center;"><a href="AdminPanel_Login_Danisman.php" style="text-decoration:none; color:#0E185F; font-weight:bold;">Bölüm Başkanı</a></div>
        <div class="col-3" style="text-align:center;"> <a href="AdminPanel_Login_Idare.php" style="text-decoration:none; color:#0E185F; font-weight:bold;">Bilgi İşlem</a></div>

      </div>
    </div>
  </div>
</body>

</html>