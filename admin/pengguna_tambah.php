<?php 
  include "../config.php";

 ?>

<?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="pengguna.php"><i class="fa fa-dashboard"></i> Pengguna</a></li>
        <li class="active">Tambah Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" id="list-table">
              
              <form class="form-horizontal" action="pengguna_tambah_proses.php" method="post">
                
                <div class="form-group">
                  <label for="inputuser" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-4">
                    <input type="text" maxlength="16" class="form-control" name="user" id="user" placeholder="Jhon">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                  </div> 
                </div>

                <div class="form-group">
                  <label for="inputRole" class="col-sm-2 control-label">Role</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="role" id="Role">
                        <option selected disabled>--Pilih Role--</option>
                        <option value="1">Mahasiswa</option>
                        <option value="2">Dosen</option>
                        <option value="3">Instansi</option>
                      </select>
                    </div>        
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

              </form>
              

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php   
    include "footer.php";
 ?>
</body>
</html>
