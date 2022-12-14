<?php
include '../Include/Header.php';
include '../ayarlar/fonksiyonlar.php';
if (isset($_POST['DanismanAta'])) {
    $BolumID = Guvenlik($_POST['bolumler']);
    $sinifID = Guvenlik($_POST['sinif']);
    $danismanID = Guvenlik($_POST['danismanlar']);
    $OgrenciEkle = $VeritabaniBaglantisi->prepare("UPDATE siniflar SET Danisman_SicilNo=? WHERE sinif_id=?");
    $OgrenciEkle->execute(array($danismanID, $sinifID));
}
?>

<body id="body-pd">

    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

    </header>
    <script>
        $(document).ready(function() {
            $("#sinif").hide();
            $("#bolumler").change(function() {

                var bolumId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "ajax2.php",
                    data: {
                        "bolumler": bolumId
                    },
                    success: function(e) {
                        $("#sinif").show();
                        $("#sinif").html(e);
                    }

                });
            })
        });

        $(document).ready(function() {
            $("#danismanlar").hide();
            $("#bolumler").change(function() {
                var bolumId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {
                        "bolumler": bolumId
                    },
                    success: function(e) {
                        $("#danismanlar").show();
                        $("#danismanlar").html(e);
                    }
                });
            })
        });
    </script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="jQuery-1.7.1.min.js"></script>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="AnaPanel_BilgiIslem.php" class="nav_logo"><span class="nav_logo-name"><img src="../resimler/ktun_logo_koyu_zemin.gif" height="40"></span> </a>
                <div class="nav_list"> <a href="AnaPanel_BilgiIslem.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-house-door nav_icon'></i> <span class="nav_name">Anasayfa</span> </a>
                    <a href="Ogrenci_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">????renci Ekle</span> </a>
                    <a href="Danisman_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-square nav_icon'></i> <span class="nav_name">Dan????man Ekle</span> </a>
                    <a href="Bol??mBaskani_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-person-workspace nav_icon'></i> <span class="nav_name">B??l??m Ba??kan?? Ekle</span> </a>
                    <a href="Bol??m_ekle.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-bookmark nav_icon'></i> <span class="nav_name">B??l??m Ekle</span> </a>
                    <a href="staj_tarihgir.php" class="nav_link" style="text-decoration:none;"> <i class='bi bi-calendar2-date nav_icon'></i> <span class="nav_name">Ba??lang????-Biti??<br>Tarihi gir</span> </a>
                    <a href="danisman_ata.php" class="nav_link active" style="text-decoration:none;"> <i class='bi bi-arrow-right-square nav_icon'></i> <span class="nav_name">S??n??fa Dan????man ata</span> </a>
                </div>
            </div>
    </div> <a href="uyecikis.php" class="nav_link" style="text-decoration:none;"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">????k???? Yap</span> </a>
    </nav>
    </div>
    <div style="margin-top: 80px;">
        <h3>S??n??fa dan????man ata</h3>
    </div>

    <form method="POST">
        <div style="border-top:2px solid blue; padding: 20px;">
            <div class="row">
                <div class="col-6">
                    <select class="form-select form-select-sm mb-3" id="bolumler" name="bolumler" aria-label=".form-select-sm example" style="height:50px;">
                        <option selected>B??l??m Se??in</option>
                        <?php $bol??m_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM bolumler");
                        $bol??m_sor->execute();
                        $bol??mler = $bol??m_sor->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($bol??mler as $bol??m) { ?>
                            <option value="<?php echo $bol??m['bolum_kodu']; ?>"><?php echo $bol??m['bolum_adi']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6" id="sinif">

                </div>
                <div class="col-6" id="danismanlar">

                </div>

            </div>
            <input class="btn" type="submit" name="DanismanAta" value="Dan????man Ata" style="background-color: #3A5BA0; color: white; border-radius: 15px; width: 200px; margin-left:10px;">
    </form>
    <?php
    include '../Include/footer.php';
    ?>