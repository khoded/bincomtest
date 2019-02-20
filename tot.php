<?php 
if (isset($_POST['lga'])  ) {
  $lga = $_POST['lga'];
} else {
  $lga = "";
}
?>
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data 
          
        <div class="pull-right btn-tambah">
            <form class="form-inline" method="POST" action="total.php">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-search"></i>
                  </div>
                  <input type="text" class="form-control" name="lga" placeholder="Enter LGA Name" autocomplete="off" value="<?php echo $lga; ?>">
                </div>
              </div>
              <a class="btn btn-info" href="?page=insert">
                <i class="glyphicon glyphicon-plus"></i> ADD NEW RESULT
              </a>
                <a class="btn btn-info" href="?page=total">
                <i class=""></i> POLL TOTAL RESULT
              </a>
            </form>
          </div>
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
            <strong><i class='glyphicon glyphicon-alert'></i> Error</strong> NOt inserted.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Success!</strong> Data inserted
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
                  <th>ID</th>
                  <th>LGA NAME</th>
                  <th>PARTY</th>
                  <th>PARTY SCORE</th>
                 
                </tr>
              </thead>   

              <tbody>
              <?php
         $no = 1;
           if (isset($lga)) {
                $query = mysqli_query($db, 
                                "
                                SELECT `lga`.`lga_name`, `announced_pu_results`.`party_abbreviation`,
                                 SUM(`announced_pu_results`.`party_score`) as total 
                                 FROM `lga`, `announced_pu_results`
                                 WHERE party_abbreviation LIKE 'PPA' AND lga_name LIKE '%$lga%'  ")
                                 or die('error query siswa: '.mysqli_error($db));
                  }else{
                    $query = mysqli_query($db, 
                                "SELECT `lga`.`lga_name`, `announced_pu_results`.`party_abbreviation`,
                                 SUM(`announced_pu_results`.`party_score`) as total 
                                 FROM `lga`, `announced_pu_results`
                                 WHERE party_abbreviation = 'PPA' AND lga_name = 'Aniocha North'  ")
                                 or die('error query siswa: '.mysqli_error($db));
                  }
              
              while ($data = mysqli_fetch_assoc($query)) {
              echo "  <tr>
                    <td width='50' class='center'>$no</td>
                    <td width='150'>$data[lga_name]</td>
                    <td width='150'>$data[party_abbreviation]</td>
                    <td width='150'>$data[total]</td>
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
    

          
          </div>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->