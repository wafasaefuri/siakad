<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-md-6">
                        <form method="post" action="#">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../config.php"; 

$idx = $_GET['id'] ?? null;

if ($idx) {
    $sql = "SELECT * FROM dsn WHERE id='$idx'";
    $data = $db->query($sql);
} else {
    echo "<div class='alert alert-warning'>ID tidak ditemukan di URL!</div>";
    exit;
}


if (isset($_POST['simpanEdit'])) {
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];

    $sql = "UPDATE dsn SET nidn='$nidn', nama='$nama', gender='$jk', alamat='$alamat', prodi='$prodi' WHERE id='$idx'";
    $hasil = $db->query($sql);

    if ($hasil) {
        echo "<div class='alert alert-success'>Data berhasil diedit!</div>";
        $data = $db->query("SELECT * FROM mhs WHERE id='$idx'");
    } else {
        echo "<div class='alert alert-danger'>Data gagal diedit!</div>";
    }
}
?>

<table class="table table-bordered">
<?php
foreach ($data as $d) {
    $jkL = ($d['gender'] == 'L') ? 'checked' : '';
    $jkP = ($d['gender'] == 'P') ? 'checked' : '';

    echo "
    <tr><td>NIDN</td><td><input type='number' name='nidn' value='$d[nidn]' class='form-control'></td></tr>
    <tr><td>NAMA</td><td><input type='text' name='nama' value='$d[nama]' class='form-control'></td></tr>
    <tr><td>JENIS KELAMIN</td><td><input type='radio' name='jk' value='L' $jkL> Laki-laki
            <input type='radio' name='jk' value='P' $jkP> Perempuan
    </td></tr>
    <tr><td>ALAMAT</td><td><textarea class='form-control' name='alamat'>$d[alamat]</textarea></td></tr>
    <tr><td>PRODI</td>
        <td>
            <select name='prodi' class='form-control'>
                <option value='1' "; if($d['prodi']=='1'){ echo "selected"; } echo ">Informatika</option>
                <option value='2' "; if($d['prodi']=='2'){ echo "selected"; } echo ">Arsitektur</option>
                <option value='3' "; if($d['prodi']=='3'){ echo "selected"; } echo ">Ilmu Lingkungan</option>
            </select>
        </td>
    </tr>
    <tr><td></td><td>
        <input type='submit' name='simpanEdit' value='Simpan Perubahan' class='btn btn-primary'>
    </td></tr>
    ";
}
?>
</table>

<a href="./?p=dosen" class="btn btn-primary mt-3">Kembali</a>
</form>
</div>
                </div>
            </div>
        </div>
    </div>
</main>