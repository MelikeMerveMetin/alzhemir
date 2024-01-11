<?php

include "baglanti.php";

if ($_GET) {
    $gelen = $_GET['sil'];              
    $delete = $conn->prepare("DELETE FROM aile_uyeleri WHERE id=$gelen");
    $sonuc=$delete->execute();
    
   
}
header('Refresh:2; url=uyeler.php');

    ?>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script type="text/javascript">
    <?php if($sonuc){ ?>
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'Silme İşlemi Başarılı',
      showConfirmButton: false,
      timer: 1950
    })
    </script>
          
     <?php }  ?>  