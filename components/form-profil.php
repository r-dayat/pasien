<?php

    session_start();
    require "../functions/profil.php";
    // require "../views/functions.php";

        $email = $_SESSION["email"];
        $faskes = query("SELECT * FROM ms_faskes");
        $namafaskes = query("SELECT * FROM ms_namafaskes");
        $genders = query("SELECT * FROM ms_gender");
        $pasien = query("SELECT * FROM tb_pasien WHERE email = '$email'")[0];
                $nik = $pasien["nik"];
                $nokk = $pasien["nokk"];
                $nama = $pasien["nama"];
                
                $tempatlahir = $pasien["tempatlahir"];
                $tgllahir = $pasien["tgllahir"];
                $alamat = $pasien["alamat"];
                $email = $pasien["email"];

                // if(profilUpdate()){
                //     exit;
                // }else{
                //     $error = true;
                // }


    // if(isset($_POST["bprofil"])){
    //     if(updateProfil($_POST) > 0){
    //         echo "
    //             <script>
    //                 alert('Data berhasil diupdate!');
    //             </script> 
    //         ";
    //     } else{
    //         echo "
    //             <script>
    //                 alert('Data berhasil gagal!');
    //             </script> 
    //         ";
    //         $error = true;
    //     }
    // }
?>

<section class="profil-pasien">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                    
                        <p>Selamat Datang <strong><?php echo(ucwords($pasien['nama'])) ?></strong></p>
                        <?php if(isset($error)) : ?>
                                <p style="color: red; font-style: italic">Email sudah digunakan!</p>
                        <?php endif; ?> 
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-sm-4 offset-sm-4">
                        <form action="../functions/profil.php" method="post">
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
                                <input type="text" name="email" id="email" value="<?php echo($email) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan email Anda">
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
                            <button type="submit" id="bprofil" name="bprofil" class="btn btn-primary">Update</button>               
                        </form>
                    </dvi>
                </div>
            </div>
        </section>