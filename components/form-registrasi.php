<?php
    require 'functions.php';
    $faskes = query("SELECT * FROM ms_faskes");
    $namafaskes = query("SELECT * FROM ms_namafaskes");
    $genders = query("SELECT * FROM ms_gender");


    $nik = "";
    $nokk = "";
    $nama = "";
    $tempatlahir = "";
    $tgllahir = "";
    $alamat = "";


        if($pasien = cari($_POST)){
            $pasien = $pasien[0];
            $status = true;
                $nik = $pasien["nik"];
                $nokk = $pasien["nokk"];
                $nama = $pasien["nama"];
                $tempatlahir = $pasien["tempatlahir"];
                $tgllahir = $pasien["tgllahir"];
                $alamat = $pasien["alamat"];
        }else{
            $pasien = [];
            $status = false;
            $error = true;
        }
    // }else{
    //     header("Location: cekdata.php");
    //     exit;
    // }

    
    // if(isset($_POST["cekDataRegistrasi"])){
        // if(isset($_POST["nik"]) === "" || isset($_POST["nokk"]) === ""){
        //     echo("Berhasil");
        // }else{
        //     echo("gagal");
        // }
        
        
        

        if(isset($_POST["btnregistrasi"])){
            if($status){
                if(update($_POST) > 0){
                  header("Location: login.php?status");
                    // echo "
                    //     <script>
                    //         alert('Data berhasil diupdate!');
                    //         document.location.href = 'login.php';
                    //     </script> 
                    // ";
                }else{
                    echo'<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Gagal!</strong> Data Anda gagal diupdate, email sudah digunakan.
                    </div>';
                    // echo "
                    //     <script>
                    //         alert('Data gagal diupdate!');
                    //     </script> 
                    // ";
                }
            }else {
                    if(insertt($_POST) > 0){
                            header("Location: login.php?status");
                        // echo "
                        //     <script>
                        //         alert('Data berhasil ditambahkan!');
                        //         document.location.href = 'login.php';
                        //     </script> 
                        // ";
                    }else{
                        echo'<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Gagal!</strong> Data Anda gagal diupdate, email sudah digunakan.
                            </div>';
                        // echo "
                        //     <script>
                        //         alert('Data gagal ditambahkan!');
                        //     </script> 
                        // ";
                    }
            }
        }
            
    //}else{
        
    //}

?>



<section class="register-pasien">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <?php if(isset($error)) : ?>
                            <?php echo'<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Gagal!</strong> Data Anda tidak ditemukan.
                            </div>';?>
                            <p>Silahkan Registrasi Data Anda dibawah sini</p>
                        <?php else: ?>
                            <?php echo'<div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sukses!</strong> Data Anda berhasil ditemukan.
                            </div>'; ?>
                            <p>Silahkan Update Data Anda dibawah sini</p>
                        <?php endif; ?> 
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-sm-4 offset-sm-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nokk">Nomor KK</label>
                                <?php (isset($error)) ? $readonly = "" : $readonly = "readonly"; ?>
                                <input type="text" name="nokk" id="nokk" class="form-control" multiple onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" value="<?php echo($nokk) ?>" placeholder="Masukkan Nomor KK Anda" <?php echo $readonly; ?>>
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>                         
                                <input type="text" name="nik" id="nik" value="<?php echo($nik) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan NIK Anda" <?php echo $readonly; ?>>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" value="<?php echo($nama) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan nama lengkap Anda">
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <?php foreach($genders as $gender) :?>
                                        <?php if($pasien["gender"] == $gender["id_gender"]): ?>
                                            <?php $select = "selected"; ?>
                                        <?php else: ?>
                                            <?php $select = ""; ?>
                                        <?php endif; ?>   
                                    <option <?php echo $select ?> value="<?php echo $gender["id_gender"]; ?>"><?php echo $gender["nama_gender"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempatlahir">Tempat Lahir</label>
                                <input type="text" name="tempatlahir" id="tempatlahir" value="<?php echo($tempatlahir) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan tempat lahir Anda">
                            </div>
                            <div class="form-group">
                                <label for="tgllahir">Tanggal Lahir</label>
                                <input type="date" name="tgllahir" id="tgllahir" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" value="<?php echo($tgllahir) ?>" placeholder="Masukkan tanggal lahir Anda">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" value="<?php echo($alamat) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan alamat Anda">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan email Anda">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan password Anda">
                            </div>
                            <div class="form-group">
                                <label for="cPassword">Konfirmasi Password</label>
                                <input type="password" name="cpassword" id="cpassword" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan lagi password Anda">
                            </div>
                            <div class="form-group">
                                <label for="faskes">Faskes</label>
                                <select name="faskes" id="faskes" class="form-control">
                                    <option value="">-- Fasilitas Kesehatan --</option>
                                    <?php foreach($faskes as $jfaskes) :?>
                                        <?php if($pasien["faskes"] == $jfaskes["id_faskes"]): ?>
                                            <?php $select = "selected"; ?>
                                        <?php else: ?>
                                            <?php $select = ""; ?>
                                        <?php endif; ?>    
                                    <option <?php echo $select ?> value="<?php echo $jfaskes["id_faskes"]; ?>"><?php echo $jfaskes["jenis_faskes"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namafaskes">Nama Faskes</label>
                                <select name="namafaskes" id="namafaskes" class="form-control">
                                    <option value="">-- Nama Fasilitas Kesehatan --</option>
                                    <?php foreach($namafaskes as $nfaskes) :?>
                                        <?php if($pasien["nama_faskes"]==$nfaskes["id_namafaskes"]): ?>
                                            <?php $select = "selected"; ?>
                                        <?php else: ?>
                                            <?php $select = ""; ?>
                                        <?php endif; ?>
                                    <option <?php echo $select ?> value="<?php echo $nfaskes["id_namafaskes"]; ?>"><?php echo $nfaskes["nama_faskes"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if(isset($error)) : ?>
                            <?php $text = "Daftar"; ?>
                            <?php else: ?>
                            <?php $text = "Update"; ?>
                            <?php endif; ?>
                            <button type="submit" id="btnregistrasi" name="btnregistrasi" class="btn btn-primary"><?php echo($text); ?></button>               
                        </form>
                    </dvi>
                </div>
            </div>
        </section>