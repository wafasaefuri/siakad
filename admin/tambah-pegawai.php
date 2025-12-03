<div class="container">
    <?php
    if(isset($_POST['simpan'])){
        $nip    = $_POST['nip'];
        $nama   = $_POST['nama'];
        $jk     = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $jabatan  = $_POST['jabatan'];

        require_once "../config.php";
        $waktu = date("Y-m-d H:i:s");
        $sql = "INSERT INTO pegawai SET nip='$nip', nama='$nama', gender='$jk',
        alamat='$alamat', jabatan='$jabatan', waktu='$waktu'";
        $tes = $db->query($sql);
        if($tes){
            echo "<div class='alert alert-success mt-3'>Data berhasil disimpan.<br>
                    <a href='./?p=pegawai' class='text-primary'>Lihat Data</a></div>";
        }
       }
       ?>
    
    <form method="post" action="#" class="mt-4">
        <table class="table table-borderless" style="width:500px;">
            <tr><td>NIP</td><td><input type="number" name="nip" class="form-control" value="<?=@$nip?>"></td></tr>
            <tr><td>Nama Lengkap</td><td><input type="text" name="nama" class="form-control" value="<?=@$nama?>"></td></tr>
            <tr><td>Jenis Kelamin</td><td>
                    <input type="radio" name="jk" value="L" id="jkL" <?php if(@$jk=="L") echo "checked"; ?>>
                    <label for="jkL">Laki-laki</label>
                    <input type="radio" name="jk" value="P" id="jkP" <?php if(@$jk=="P") echo "checked"; ?>>
                    <label for="jkP">Perempuan</label>
                </td></tr>
            <tr><td valign="top">Alamat</td><td><textarea name="alamat" class="form-control" style="width:300px">
              <?=@$alamat?></textarea></td></tr>
            <tr><td>Jabatan</td><td>
                    <select class="form-control" name="jabatan">
                        <option></option>
                        <option value="1" <?php if(@$jabatan=="1") echo "selected"; ?>>Manager IT</option>
                        <option value="2" <?php if(@$jabatan=="2") echo "selected"; ?>>Teknis</option>
                        <option value="3" <?php if(@$jabatan=="3") echo "selected"; ?>>Operasional</option>
                    </select></td></tr>
            <tr><td></td><td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td></tr>
        </table>
        <a href="./?p=pegawai" class="btn btn-secondary">Kembali</a>
    </form>
</div>