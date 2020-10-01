<?php
    session_start();
    require "../views/functions.php";

    if(isset($_POST["bberobat"])){
        if(insertBerobat($_POST) > 0){
            echo "
                            <script>
                                alert('Daftar berobat berhasil!');
                                document.location.href = '../views/beranda.php';
                            </script> 
                         ";
            exit;
        }else{
                    echo "
                            <script>
                                alert('Daftar berobat gagal!');
                                document.location.href = '../views/beranda.php';
                            </script> 
                         ";
        }


    }
?>

