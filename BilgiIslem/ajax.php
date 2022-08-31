<?php
include '../Include/Header.php';
?>
<div class="form-floating mb-3">
    <select class="form-select" name="danismanlar" aria-label="Default select example">
        <option selected>Danışman Seçin</option>
        <?php $danisman_sor = $VeritabaniBaglantisi->prepare("SELECT * FROM danismanlar WHERE danisman_bolum_kodu='" . $_POST['bolumler'] . "'");
        $danisman_sor->execute();
        $danismanlar = $danisman_sor->fetchAll(PDO::FETCH_ASSOC);
        foreach ($danismanlar as $danisman) {
        ?>
            <option value="<?php echo $danisman['danisman_sicilNo']; ?>"><?php echo $danisman['danisman_adi'];
                                                                    echo " ";
                                                                    echo $danisman['danisman_soyadi'] ?></option>
        <?php } ?>
    </select>
</div>