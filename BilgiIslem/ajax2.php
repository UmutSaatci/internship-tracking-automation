<?php
include '../Include/Header.php';
?>
<div class="form-floating mb-3">
  <select class="form-select" id="sinif" name="sinif" aria-label="Default select example" >
    <option selected>Sınıf Seçiniz</option>
    <?php
    $sinif_List = $VeritabaniBaglantisi->prepare("SELECT * FROM siniflar WHERE sinif_bolum_kodu='" . $_POST['bolumler'] . "'");
    $sinif_List->execute();
    $siniflar = $sinif_List->fetchAll(PDO::FETCH_ASSOC);
    foreach ($siniflar as $row) { ?>
     <option value="<?php echo $row['sinif_id']; ?>"><?php echo $row['sinif_adi']; ?></option>
    <?php } ?>
  </select>
</div>