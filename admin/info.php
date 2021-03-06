<?php 
  include "../config.php";

  $result = mysqli_query($link, "SELECT * FROM info");

  include "header.php";
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Info
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" id="list-table">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Tanggal</th>
                  <th>Tentang</th>          
                  <th>Foto</th>
                  <th>Deskripsi</th>
                  <th>Komentar</th>
                  <th>Favorit</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                
                <?php 
                  while ($row=mysqli_fetch_row($result)) 
                  {
                   echo "<tr>";
                   echo "<td>".$row[0]."</td>";
                   echo "<td>".$row[1]."</td>";
                   echo "<td>".$row[2]."</td>";
                   echo "<td>".$row[3]."</td>";  
                   echo "<td><img src='".FILE_URL.$row[4]."' width='200'></td>";
                   echo "<td>".$row[5]."</td>";
                   echo "<td>".$row[6]."</td>";
                   echo "<td>".$row[7]."</td>";
                   echo "<td>".$row[8]."</td>";
                   echo "<td><a href='info_status.php?id=".$row[0]."'>Status</a></td>";

                   echo "</tr>";
                  }

                 ?>
              </table>
            </div>
          </div>
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
