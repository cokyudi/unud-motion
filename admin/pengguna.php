<?php 
  include "../config.php";

  $result = mysqli_query($link, "SELECT * FROM user");
 ?>

<?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" id="list-table">
              <table class="table table-hover">
                <tr>
                  <th>ID Pengguna</th>
                  <th>Nama Pengguna</th>
                  <th>Foto</th>
                  <th>Role</th>          
                  <th>Pengaduan</th>
                  <th>Favorit</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                
                <?php 
                  while ($row=mysqli_fetch_row($result)) 
                  {
                   echo "<tr>";
                   echo "<td>".$row[0]."</td>";
                   echo "<td>".$row[2]."</td>";
                   echo "<td><img src='".FILE_URL.$row[3]."' width='100'></td>";
                   echo "<td>".$row[4]."</td>";
                   echo "<td>".$row[5]."</td>";  
                   echo "<td>".$row[6]."</td>";
                   echo "<td>".$row[7]."</td>";

                   echo "<td><a href='pengguna_hapus.php?user=".$row[0]."'>Hapus</a>
                      </td>";

                   echo "</tr>";
                  }

                 ?>
              </table>
            </div>
            <div class="box-body" id="add-btn">
              <a href="pengguna_tambah.php">
                <button type="button" class="btn btn-default" aria-label="left Align">
                  <span class="glyphicon glyphicon-plus" aria-hiden="true">
                  </span>
                </button>
              </a>
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
  