<?php  
    
    include("imageftcenter.func.php");


    $exif=exif_read_data('../images/01.jpg');

    print_r($exif);





?>