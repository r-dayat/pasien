<?php
    session_start();
    require "functions.php";
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

    $email = $_SESSION["email"];
    $pasien = query("SELECT * FROM tb_pasien WHERE email = '$email'")[0];
    $nama = $pasien["nama"];

    // $email = $_SESSION["email"];
    // $pasien = query("SELECT * FROM tb_pasien WHERE email = '$email'")[0];
    

    // if(isset($_POST["bberobat"])){
    //     var_dump($_POST["bberobat"]);
    //     if(insertBerobat($_POST)){

    //     }else{
    //         echo "
    //                         <script>
    //                             alert('Daftar berobat gagal!');
    //                         </script> 
    //                     ";
    //     }
    // }

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/style.css">
    <title>Popay</title>
</head>
<body>
        <header>
            <div id="jumbotron-popay" class="jumbotron-popay">
            <?php include './../components/navbar-menu.php';?></div>
        </header>

        <main>
            
            <div id="formBody" class="form-body"></div>
        </main>

        <footer>
            <div id="footer-popay">
            <?php include './../components/footer-popay.php';?>
            </div>
        </footer>
    
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/beranda.js"></script>
</body>
</html>