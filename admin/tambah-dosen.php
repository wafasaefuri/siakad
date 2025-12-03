<div class="container">
    <?php
    if(isset($_POST['simpan'])){
        $nidn    = $_POST['nidn'];
        $nama   = $_POST['nama'];
        $jk     = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $prodi  = $_POST['prodi'];

        require_once "../config.php";
        $waktu = date("Y-m-d H:i:s");
        $sql = "INSERT INTO dsn SET nidn='$nidn', nama='$nama', gender='$jk',
        alamat='$alamat', prodi='$prodi', waktu='$waktu'";
        $tes = $db->query($sql);
        if($tes){
            echo "<div class='alert alert-success mt-3'>Data berhasil disimpan.<br>
                    <a href='./?p=mahasiswa' class='text-primary'>Lihat Data</a></div>";
        }
       }
       ?>
    
    <form method="post" action="#" class="mt-4">
        <table class="table table-borderless" style="width:500px;">
            <tr><td>NIDN</td><td><input type="number" name="nidn" class="form-control" value="<?=@$nidn?>"></td></tr>
            <tr><td>Nama Lengkap</td><td><input type="text" name="nama" class="form-control" value="<?=@$nama?>"></td></tr>
            <tr><td>Jenis Kelamin</td><td>
                    <input type="radio" name="jk" value="L" id="jkL" <?php if(@$jk=="L") echo "checked"; ?>>
                    <label for="jkL">Laki-laki</label>
                    <input type="radio" name="jk" value="P" id="jkP" <?php if(@$jk=="P") echo "checked"; ?>>
                    <label for="jkP">Perempuan</label>
                </td></tr>
            <tr><td valign="top">Alamat</td><td><textarea name="alamat" class="form-control" style="width:300px">
              <?=@$alamat?></textarea></td></tr>
            <tr><td>Program Studi</td><td>
                    <select class="form-control" name="prodi">
                        <option></option>
                        <option value="1" <?php if(@$prodi=="1") echo "selected"; ?>>Informatika</option>
                        <option value="2" <?php if(@$prodi=="2") echo "selected"; ?>>Arsitektur</option>
                        <option value="3" <?php if(@$prodi=="3") echo "selected"; ?>>Ilmu Lingkungan</option>
                    </select></td></tr>
            <tr><td></td><td><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></td></tr>
        </table>
        <a href="./?p=dosen" class="btn btn-secondary">Kembali</a>
    </form>
</div>