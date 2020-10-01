<?php
    session_start();
    require "../views/functions.php";
    $faskes = query("SELECT * FROM ms_faskes");
    $namafaskes = query("SELECT * FROM ms_namafaskes");

    // if(isset($_SESSION["login"])){
        $email = $_SESSION["email"];
        $pasien = query("SELECT * FROM tb_pasien WHERE email = '$email'")[0];
        
    

    // if(isset($_POST["bberobat"])){
    //     if(insertBerobat($_POST) > 0){

    //     }else{
    //                 echo "
    //                         <script>
    //                             alert('Daftar berobat gagal!');
    //                             console.log('Daftar berobat gagal!');
    //                         </script> 
    //                      ";
    //     }
    // }


?>



<section class="form-berobat">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <p>Silahkan lengkapi data Anda dibawah sini</p>
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-sm-4 offset-sm-4">
                        <form action="../functions/berobat.php" method="post">
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
                            <div class="form-group">
                                <label for="tgbberobat">Tanggal Berobat</label>
                                <input type="date" name="tglberobat" id="tglberobat" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <textarea class="form-control" name="keluhan" id="keluhan" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                            <input type="text" name="nik" id="nik" value="<?php echo($pasien["nik"]) ?>" >
                                <script>
                                    $('#nik').hide();
                                </script>
                            </div>
                            <button type="submit" name="bberobat" id="bberobat" class="btn btn-success">Daftar</button>
                        </form>
                    </dvi>
                </div>
            </div>
        </section>