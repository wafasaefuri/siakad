<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <form action="#" method="post">
              <table>
                <tr>
                    <td>Password Lama</td>
                    <td><input type="password" name="pwdLama" required class="form-control"></td>
                </tr>
                <tr>
                    <td>Password Baru</td>
                    <td><input type="password" name="pwdBaru1" required class="form-control"></td>
                </tr>
                <tr>
                    <td>Konfirmasi Password Baru</td>
                    <td><input type="password" name="pwdBaru2" required class="form-control"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="ganti" value="Ganti Password" class="btn btn-primary"></td>
              </table>
              </form>
              <div>
                <?php 
                if (isset($_POST['ganti'])) {
                  $pwdBaru1 = $_POST['pwdBaru1'];
                  $pwdBaru2 = $_POST['pwdBaru2'];

                  if ($pwdBaru1 != $pwdBaru2) {
                    echo"<script>alert('Password Baru tidak sesuai');</script>";
                  } else {
                    echo"<script>alert('Password Baru sesuai');</script>";
                  }
                }
                ?>
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
                    <h3 class="card-title"></h3>
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
                    <span><h1>Welcome</h1></span>
                  </div>
                  <!--end::Card Body-->
                  
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