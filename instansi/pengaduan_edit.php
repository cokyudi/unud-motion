<?php 
  include "../config.php";

  $id = $_GET['id'];
  $result = mysqli_query($link, "SELECT * FROM pengaduan WHERE id = $id");
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
              <?php while ($row=mysqli_fetch_assoc($result)) {
                $status = $row['status']; ?>
                <h4><b><?= $row['nama_laporan'] ?></b></h4>
                <?= $row['deskripsi'] ?><br><br>
                <form class="form-horizontal" action="pengaduan_edit_proses.php" method="post">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <select class="form-control" name="status" id="status">
                        <option value="terverifikasi">Terverifikasi</option>
                        <option value="dikerjakan">Dikerjakan</option>
                        <option value="selesai">Selesai</option>
                      </select>
                    </div>
                  </div>

                  <br>
                  <div class="form-group">
                    <div class="col-sm-10">
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
