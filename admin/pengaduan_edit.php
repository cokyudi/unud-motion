<?php 
  include "../config.php";

  $id = $_GET['id'];
  $result = mysqli_query($link, "SELECT * FROM pengaduan WHERE id = $id");
  $result_instansi = mysqli_query($link, "SELECT * FROM user WHERE role = 3");
 ?>

<?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Pengaduan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaduan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" id="list-table">
              <?php while ($row=mysqli_fetch_assoc($result)) { ?>
              <form class="form-horizontal" action="pengaduan_edit_proses.php" method="post">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="kepada_user">
                      <?php while ($instansi=mysqli_fetch_assoc($result_instansi)) { ?>
                      <?php $selected = ($instansi['user'] == $row['kepada_user']) ? 'selected' : '' ?>
                      <option value="<?= $instansi['user'] ?>" <?= $selected ?>><?= $instansi['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-4">
                    <input type="text" maxlength="32" class="form-control" name="nama_laporan" id="nama_laporan" placeholder="Judul Pengaduan" value="<?= $row['nama_laporan'] ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputdeskripsi" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-4">
                    <textarea class="form-control" rows="5" name="deskripsi" id="deskripsi" placeholder="deskripsi"><?= $row['deskripsi'] ?></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-4">
                    <div class="checkbox">
                      <label>
                        <?php $check = ($row['status'] == 'terverifikasi') ? 'checked' : '' ?>
                        <input type="checkbox" name="status" <?= $check ?>> Verifikasi
                      </label>
                    </div>
                  </div>
                </div>

                <br>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

              </form>
              <?php } ?>

              
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
