<?php
include '../Include/Header.php';
?>

    <div class="form-floating mb-3">
         
             
      <select class="form-select" name="ilce" aria-label="Default select example" style="height:50px; padding-top:22px;">
         <option selected>İlçe Seçiniz</option> 
             <?php              
$ilid = $_POST['il'];
 $ilce_List =$VeritabaniBaglantisi->prepare("SELECT * FROM ilce WHERE il_no='".$ilid."'");
  $ilce_List->execute();
  $ilceler = $ilce_List->fetchAll(PDO::FETCH_ASSOC);
  foreach($ilceler as $row){ ?>        
  
           <option value="<?php echo $row['ilce_no']; ?>"><?php echo $row['ilce_isim']; ?></option>
           <?php } ?>
              </select>
    </div>
