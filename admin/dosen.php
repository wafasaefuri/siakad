<?php
require_once "../config.php";

$keyword = $_POST['keyword'] ?? "";
$category = $_POST['category'] ?? "nama";

if (isset($_POST['cari'])) {
    if ($category == "prodi") {
        if ($keyword == "INF") {
            $prodi = 1;
        } elseif ($keyword == "ARS") {
            $prodi = 2;
        } elseif ($keyword == "Ilmu lingkungan") {
            $prodi = 3;
        } else {
            $prodi = null;
        }
        if ($prodi !== null) {
            $sql = "SELECT * FROM dsn WHERE prodi = '$prodi'";
        } else {
            $sql = "SELECT * FROM dsn WHERE 1=0";
        }
    } else {
        $sql = "SELECT * FROM dsn WHERE $category LIKE '%$keyword%'";
    }
} else {
    $sql = "SELECT * FROM dsn";
}
$data = $db->query($sql);
$no = 0;
?>
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Dashboard Dosen</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Theme</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <tr><td><a href="./?p=tambah-dosen.php" class="btn btn-warning">Tambah Dosen</a></td></tr>
                            <form method="post" action="#" style="margin-top:15px; display:flex; gap:10px;">
                                <input 
                                    type="text" 
                                    name="keyword" 
                                    placeholder="Masukan kata kunci"
                                    class="form-control"
                                    style="max-width:200px;"
                                    value="<?= $keyword ?>"
                                >
                                <select name="category" class="form-control" style="max-width:150px;">
                                    <option value="nidn" <?= $category == "nidn" ? "selected" : "" ?>>NIDN</option>
                                    <option value="nama" <?= $category == "nama" ? "selected" : "" ?>>Nama</option>
                                    <option value="gender" <?= $category == "gender" ? "selected" : "" ?>>Gender</option>
                                    <option value="prodi" <?= $category == "prodi" ? "selected" : "" ?>>Prodi</option>
                                </select>
                                <button type="submit" name="cari" class="btn btn-primary">Search</button>
                            </form>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th><th>NIDN</th><th>Nama</th><th>gender</th><th>alamat</th><th>Prodi</th><th>Opsi</th>
                                    </tr>
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
                                </thead>
                                <tbody>

                                <?php  
                                $jumlah = $data->num_rows;
                                if(isset($_POST['cari'])){
                                    if($jumlah > 0){
                                        echo "<p style='font-size:15px; margin-bottom:10px;'>
                                        Ditemukan <b>$jumlah</b> data dengan kata kunci <b>$keyword</b> pada kategori <b>$category</b>.
                                        </p>";
                                    } else {
                                        echo "<p style='font-size:15px; margin-bottom:10px; color:red;'>
                                        Tidak ditemukan data dengan kata kunci <b>$keyword</b> pada kategori <b>$category</b>.
                                        </p>";
                                    }
                                }
                                ?>

                                <?php
                                foreach ($data as $d) {
                                    $no++;

                                    if($d['prodi']==1){
                                        $prodi="INF";
                                    }elseif ($d['prodi']==2){
                                        $prodi="ARS";
                                    }elseif ($d['prodi']==3){
                                        $prodi="Ilmu lingkungan";
                                    }else{
                                        $prodi="Tidak diketahui";
                                    }
                                    echo "
                                    <tr>
                                        <td>$no</td>
                                        <td>{$d['nidn']}</td>
                                        <td>{$d['nama']}</td>
                                        <td>{$d['gender']}</td>
                                        <td>{$d['alamat']}</td>
                                        <td>$prodi</td>
                                        <td>
                                            <a href='./?p=detail-dsn&id=$d[id]' class='btn btn-xs btn-primary'>detail</a>
                                            <a href='./?p=edit-dsn&id=$d[id]' class='btn btn-xs btn-warning'>edit</a>
                                            <a href='./?p=hapus-dsn&id=$d[id]' class='btn btn-xs btn-danger'>Delete</a>
                                        </td>
                                    </tr>";
                                }
                                ?>

                                </tbody>
                            </table>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>