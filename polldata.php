<?php 
if (isset($_POST['unit_id'])) {
  $unit_id = $_POST['unit_id'];
} else {
  $unit_id = "";
}
?>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data 
          
          <div class="pull-right btn-tambah">
            <form class="form-inline" method="POST" action="index.php">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                  </div>
                  <input type="text" class="form-control" name="unit_id" placeholder="Enter polling unit unique id or Party" autocomplete="off" value="<?php echo $unit_id; ?>">
                </div>
              </div>
              <a class="btn btn-info" href="?page=insert">
                <i class="glyphicon glyphicon-plus"></i> ADD NEW RESULT
              </a>
                <a class="btn btn-info" href="?page=tot">
                <i class=""></i> POLL LGA  RESULT
              </a>
            </form>
          </div>
          
        </h4>
      </div>

  <?php  
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i>error</strong>.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sucess!</strong> Data inserted.
          </div>";
  }
  ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">DELTA STATE POLLING UNIT RESULT</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>POLLING UNIT ID</th>
                  <th>POLLING UNIT ID</th>
                  <th>PARTY</th>
                  <th>PARTY SCORE</th>
                  
                </tr>
              </thead>   

              <tbody>
              <?php
              /* Pagination */
              $col_num = 5;

              if (isset($unit_id)) {
                $record = mysqli_query($db, "SELECT * FROM announced_pu_results
                                                    WHERE polling_unit_uniqueid LIKE '%$unit_id%' OR party_abbreviation LIKE '%$unit_id%'")
                                                    or die(' error query: '.mysqli_error($db));
              } else {
                $record = mysqli_query($db, "SELECT * FROM announced_pu_results")
                                                    or die('error query record: '.mysqli_error($db));
              }

              $get_record  = mysqli_num_rows($record);
              $page = ceil($get_record / $col_num);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              // $mulai   = ($page - 1) * $col_num;
              /*-------------------------------------------------------------------*/
              $no = 1;
              if (isset($unit_id)) {
                $query = mysqli_query($db, "SELECT * FROM announced_pu_results
                                            WHERE polling_unit_uniqueid LIKE '%$unit_id%' OR party_abbreviation LIKE '%$unit_id%'") 
                                            or die('error query siswa: '.mysqli_error($db));
              } else {
                $query = mysqli_query($db, "SELECT * FROM announced_pu_results
                                            ORDER BY polling_unit_uniqueid")
                                            or die('error query siswa: '.mysqli_error($db));
              }
              
              while ($data = mysqli_fetch_assoc($query)) {


                echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[polling_unit_uniqueid]</td>
                      <td width='150'>$data[party_abbreviation]</td>
                    <td width='150'>$data[party_score]</td>

                      <td width='100'>
                      ";
              ?>
                      
              <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                $no++;
              }
              ?>
              </tbody>           
            </table>
            <?php 
            if (empty($_GET['hal'])) {
              $page_num = '1';
            } else {
              $page_num = $_GET['hal'];
            }
            ?>

            <a>
              Page<?php echo $page_num; ?> of <?php echo $page; ?> | 
              Total <?php echo $get_record; ?> data
            </a>

            <nav>
              <ul class="pagination pull-right">
              <?php 
              if ($page_num<='1') { ?>
                <li class="disabled">
                  <a href="" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page -1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>

                          <?php 
              for($x=1; $x<=$page; $x++) { ?>
                <li class="">
                  <a href="?hal=<?php echo $x ?>"><?php echo $x ?></a>
                </li>
              <?php
              }
              ?>


              <?php 
              if ($page_num>=$page) { ?>
                <li class="disabled">
                  <a href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page +1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>
              </ul>
            </nav>
          </div>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->