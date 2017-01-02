<?php 
  include "../config.php";

  $result = mysqli_query($link, "
    SELECT * FROM pengaduan 
    WHERE 
      (kepada_user = '".INSTANSI_ID."' OR 
      oleh_user = '".INSTANSI_ID."') AND 
      status <> 'belum diverifikasi' 
    ORDER BY tgl_dibuat DESC");
 ?>

<?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaduan untuk <?= INSTANSI_ID ?>
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
              <div class="box-header">
                <a class="btn btn-primary btn-flat pull-right" href="pengaduan_tambah.php">
                  <i class="fa fa-plus"></i>
                    <span> Buat Report Pengaduan</span>
                </a>
              </div>
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Pengirim</th>
                  <th>Tentang</th>          
                  <th>Foto</th>
                  <th>Tanggal</th>
                  <th>Vote</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                
                <?php 
                  while ($row=mysqli_fetch_row($result)) 
                  {
                   echo "<tr>";
                   echo "<td>".$row[0]."</td>";
                   echo "<td>".$row[1]."</td>";
                   echo "<td>".$row[3]."</td>";  
                   echo "<td><img src='data:image/png;base64,".$row[4]."' width='200'></td>";
                   echo "<td>".$row[7]."</td>";
                   echo "<td>".$row[8]."</td>";
                   echo "<td>".$row[9]."</td>";

                   echo "<td><a href='pengaduan_edit.php?id=".$row[0]."'>Selengkapnya</a> | 
                      <a href='pengaduan_hapus.php?id=".$row[0]."'>Hapus</a>
                      </td>";

                   echo "</tr>";
                  }

                 ?>
              </table>
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
