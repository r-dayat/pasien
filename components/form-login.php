<?php
    session_start();
    require 'functions.php';

    
    if(isset($_SESSION["login"])){
        header("Location: beranda.php");
        exit;
    }

    if(isset($_POST["login"])){
        
        if(loginpasien($_POST) > 0){
            $_SESSION["login"] = true;
            $_SESSION["email"] = $_POST["email"];
            header("Location: beranda.php");
            exit;
        }else{
            $error = true;
        }

    }

?>

            <?php if(isset($_GET["status"])) : ?>
                <?php echo'<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Sukses!</strong> Data Anda berhasil didaftarkan.
                  </div>'; ?>
            <?php endif; ?>
            <section class="form-login">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center">
                            <p>Selamat Datang di Pelayanan Kesehatan Kota Solok</p>
                            <?php if(isset($error)) : ?>
                                <?php echo'<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Gagal!</strong> Email / Password Anda salah.
                            </div>';?>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row">
                        <dvi class="col-sm-4 offset-sm-4">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email Anda">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda">
                                </div>
                                <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                            </form>
                        </dvi>
                    </div>
                </div>
            </section>
