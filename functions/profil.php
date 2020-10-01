<?php

    require "../views/functions.php";


    
        if(isset($_POST["bprofil"])){
            if(updateProfil($_POST) > 0){
                echo "
                    <script>
                        alert('Data berhasil diupdate!');
                        document.location.href = '../views/beranda.php';
                    </script> 
                ";
                exit;
            } else{
                echo "
                    <script>
                        alert('Update Gagal, email ini sudah digunakan!');
                        document.location.href = '../views/beranda.php';
                        $('#formBody').load('../components/form-profil.php');
                    </script> 
                ";
            }
        }
?>