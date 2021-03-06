<?php 
  include "../config.php";
 ?>

<?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Buat Report Pengaduan
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
              <br><br>
              <form class="form-horizontal" action="pengaduan_tambah_proses.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Judul Laporan</label>
                  <div class="col-sm-4">
                    <input type="text" maxlength="32" class="form-control" name="nama_laporan" id="nama_laporan" placeholder="Judul Laporan" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputdeskripsi" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-4">
                    <textarea class="form-control" rows="5" name="deskripsi" id="deskripsi" placeholder="Deskripsi..."></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-4">
                    <input type="file" name="foto">
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
