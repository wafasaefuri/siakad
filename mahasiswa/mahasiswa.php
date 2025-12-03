<?php
require_once "../config.php";
include "../header.php";
include "../sidebar.php";
$keyword=$_POST['keyword'] ;
$category=$_POST['category'] ; 

if($_POST['cari']){

    if($category == "prodi"){
        if($keyword == "INF"){
            $prodi = 1;
        }elseif($keyword == "ARS"){
            $prodi = 2;
        }elseif($keyword == "Ilmu lingkungan"){
            $prodi = 3;
        }else{
            $prodi = null;
        }
        if($prodi !== null){
            $sql = "SELECT * FROM mhs WHERE prodi = '$prodi'";
        }else{
            $sql = "SELECT * FROM mhs WHERE 1=0";
        }

    }else{
        $sql = "SELECT * FROM mhs WHERE $category LIKE '%$keyword%'";
    }
}else{
    $sql = "SELECT * FROM mhs";
}



$data=$db->query($sql);



//var_dum($data);
?>
<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Dashboard mahasiswa</h3></div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Theme</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
                <!--begin::Card-->
                <div class="card">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <table><tr><td>
                    <a href="./?p=tambah-mahasiswa" class="btn btn-primary" style="width:150px">tambah Mahasiswa</a>
                    </td><td width="50"></td><td>
                    <form method="post" action="#">
                    <input type='text' name='keyword' placeholder='Masukan Kata Kunci' value='<?=$keyword?>'>
                    <select name='category'>
                    <option value='nim' <?php if($category=="nim") echo"selected";?>>NIM</option>
                          <option value='nama' <?php if($category=="nama") echo"selected" ;?>>NAMA</option>
                          <option value='gender' <?php if($category=="gender") echo"selected" ;?>>Jenis Kelamin</option>
                          <option value='prodi' <?php if($category=="prodi") echo"selected" ;?>>Prodi</option>
                          </select>
                          <input type='submit' name='cari' value='Search' class='btn btn-default'>
                          </form>
                          </td></tr></table>

<?php 
$jumlah = $data->num_rows;

if(isset($_POST['cari'])){
    if($jumlah > 0){
        echo "<p style='font-size:15px; margin-bottom:10px;'>
        Ditemukan <b>$jumlah</b> data dengan kata kunci <b>$keyword</b> pada kategori <b>$category</b>.
        </p>";
    }else{
        echo "<p style='font-size:15px; margin-bottom:10px; color:red;'>
        Tidak ditemukan data dengan kata kunci <b>$keyword</b> pada kategori <b>$category</b>.
        </p>";

                  }
                  }
                  ?>     
                    <table class="table table-striped table-hover">
                  <thead>
                  <tr><th>No</th><th>NIM</th><th>Nama</th><th>gender</th><th>alamat</th><th>Prodi</th><th>0psi</th></tr>
                  </thead>
                  <tbody>
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
                    echo"
                    <tr><td>$no</td><td>{$d['nim']}</td><td>{$d['nama']}</td><td>{$d['gender']}</td><td>{$d['alamat']}</td><td>$prodi</td>
                    <td>
                    <a href='./?p=detail-mhs&id=$d[id]' class='btn btn-xs btn-primary'>detail</a>
                    <a href='./?p=edit-mhs&id=$d[id]' class='btn btn-xs btn-warning'>edit</a>
                    <a href='./?p=hapus-mhs&id=$d[id]' class='btn btn-xs btn-danger'>Delete</a>
                    
                    </td></tr>";
                  }
                  ?>
                  </tbody>
                  </table>
                    <!--end::Card Title-->
                    <!--begin::Card Toolbar-->
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
                    <!--end::Card Toolbar-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body">

                    <!--begin::Row-->
                    <div class="row">
                      <!--begin::Col-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body">
                    <!--begin::Row-->
                          
                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <?php include "../footer.php"; ?>
      <!--end::App Main-->