<?php
if(!isset($connection)){
  include 'connection.php';
}
?>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Borrow Books</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="borrow_add.php">
          		  <div class="form-group">
                  	<label for="member" class="col-sm-3 control-label">MemberID</label>

                  	<div class="col-sm-9">
                      <select class="form-control" name="member" id="member" required="">
                        <option value="" selected="" disabled=""> Please Select Member Here.</option>
                        <?php  
                            $sql = "SELECT * FROM member order by name asc ";
                            $qry = $connection->query($sql);
                            while($row = $qry->fetch_array()):
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo ucwords($row['name']) . ' ['.$row['id'].']' ?></option>
                        <?php endwhile;  ?>
                      </select>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="id" class="col-sm-3 control-label">Book ID</label>

                    <div class="col-sm-9">
                       <select class="form-control" name="id[]" >
                        <option value="" selected="" disabled=""> Please Select Book Here.</option>
                        
                        <?php  
                            $book = "SELECT * FROM book where status = 0 order by title asc ";
                            $b_qry = $connection->query($book);
                            $brows=array();
                            while($row = $b_qry->fetch_array()):
                               $brows[] = $row;
                        ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo ucwords($row['title']) . ' ['.$row['id'].']' ?></option>
                        <?php endwhile;  ?>
                      </select>
                    </div>
                </div>
                <span id="append-div"></span>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                      <button class="btn btn-danger btn-xs btn-flat" id="append"><i class="fa fa-plus"></i> Book Field</button>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>