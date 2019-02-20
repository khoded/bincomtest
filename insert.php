
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 
          Insert result for polling
        </h4>
      </div> <!-- /.page-header -->

      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="process.php">
            
          

            <div class="form-group">
              <label class="col-sm-2 control-label">Polling Unit Id</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="puId" autocomplete="off" required>
              </div>
            </div>           


            <div class="form-group">
              <label class="col-sm-2 control-label">Result</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="result" autocomplete="off" required>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Entered By</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="user" autocomplete="off" required>
              </div>
            </div>
                        
           

            <div class="form-group">
              <label class="col-sm-2 control-label">Party</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="party" autocomplete="off" required>
              </div>
            </div>

            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-info btn-submit" name="submit" value="Submit">
                <a href="index.php" class="btn btn-default btn-reset">Submit</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->