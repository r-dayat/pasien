            <section class="form-cek" id="cekData">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center">
                            <p>Sebelum Anda melakukan Registrasi, mohon masukkan Nomor KK dan NIK Anda dibawah ini: </p>
                        </div>
                    </div>
                    <div class="row">
                        <dvi class="col-sm-4 offset-sm-4">
                            <form action="registrasi.php" method="post">
                                <div class="form-group">
                                    <label for="nokk">Nomor KK</label>
                                    <input type="text" name="nokk" id="nokk" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan Nomor KK Anda">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" id="nik" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan NIK Anda">
                                </div>
                                <button id="cekDataRegistrasi" name="cekDataRegistrasi" type="submit" class="btn btn-success">Cari</button>
                            </form>
                        </dvi>
                    </div>
                </div>
            </section>



            
