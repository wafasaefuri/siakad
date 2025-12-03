<?php
require_once "../config.php";

$keyword = $_POST['keyword'] ?? "";
$category = $_POST['category'] ?? "nama";

if (isset($_POST['cari'])) {
    if ($category == "jabatan") {
        if ($keyword == "Manager IT") {
            $jabatan = 1;
        } elseif ($keyword == "Teknis") {
            $jabatan = 2;
        } elseif ($keyword == "Operasional") {
            $jabatan = 3;
        } else {
            $jabatan = null;
        }
        if ($jabatan !== null) {
            $sql = "SELECT * FROM pegawai WHERE jabatan = '$jabatan'";
        } else {
            $sql = "SELECT * FROM pegawai WHERE 1=0";
        }
    } else {
        $sql = "SELECT * FROM pegawai WHERE $category LIKE '%$keyword%'";
    }
} else {
    $sql = "SELECT * FROM pegawai";
}
$data = $db->query($sql);
$no = 0;
?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard Pegawai</h3></div>
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
                    <tr><td><a href="./?p=tambah-pegawai.php" class="btn btn-warning">Tambah Pegawai</a></td></tr>
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
                            <option value="nip" <?= $category == "nip" ? "selected" : "" ?>>NIP</option>
                            <option value="nama" <?= $category == "nama" ? "selected" : "" ?>>Nama</option>
                            <option value="gender" <?= $category == "gender" ? "selected" : "" ?>>Gender</option>
                            <option value="jabatan" <?= $category == "jabatan" ? "selected" : "" ?>>Jabatan</option>
                        </select>
                        <button type="submit" name="cari" class="btn btn-primary">Search</button>
                    </form>
                    <table class="table table-striped table-hover">
                      <thead>
                      <tr><th>No</th><th>NIP</th><th>Nama</th><th>gender</th><th>alamat</th><th>jabatan</th><th>0psi</th></tr>
                      </thead>
                      <tbody>

                      <?php
                      $jumlah = $data->num_rows;
                      if (isset($_POST['cari'])) {
                          if ($jumlah > 0) {
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

                        if($d['jabatan']==1){
                          $jabatan="Manager IT";
                        }elseif ($d['jabatan']==2){
                          $jabatan="Teknis";
                        }elseif ($d['jabatan']==3){
                          $jabatan="Operasional";
                        }else{
                          $jabatan="Tidak diketahui";
                        }
                        echo"
                        <tr><td>$no</td><td>{$d['nip']}</td><td>{$d['nama']}</td><td>{$d['gender']}</td><td>{$d['alamat']}</td><td>$jabatan</td>
                        <td>
                        <a href='./?p=detail-pegawai&id=$d[id]' class='btn btn-xs btn-primary'>detail</a>
                        <a href='./?p=edit-pegawai&id=$d[id]' class='btn btn-xs btn-warning'>edit</a>
                        <a href='./?p=hapus-pegawai&id=$d[id]' class='btn btn-xs btn-danger'>Delete</a>
                        </td></tr>";
                      }
                      ?>
                      </tbody>
                    </table>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
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