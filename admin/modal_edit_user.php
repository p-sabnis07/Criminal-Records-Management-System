<div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $userid = $row['staffid'];
                $query2 = mysqli_query($dbcon, "SELECT * FROM userlogin where staffid='$userid'");
                $row1 = mysqli_fetch_array($query2);
                ?>
                <div class="row">
                    <form class="form-horizontal" action="savestaffedit.php" method="post" role="form">
                        <div class="form-row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="fname">Firstname:</label>
                                    <input type="text" name="fname" value="<?php echo $row1['surname'] ?>" class="form-control" id="fname" style="border-color: #ccc; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="oname">Last Name:</label>
                                    <input type="text" name="oname" value="<?php echo $row1['othernames'] ?>" class="form-control" id="oname" style="border-color: #ccc; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="username">Staff Number:</label>
                                    <input type="text" readonly="" name="username" value="<?php echo $row1['staffid'] ?>" class="form-control" id="username" style="border-color: #ccc; border-radius: 5px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" name="status" id="status" style="border-color: #ccc; border-radius: 5px;">
                                        <option selected="selected" value="">Select</option>
                                        <option value="Admin">Admin</option>
                                        <option value="CID">CID</option>
                                        <option value="NCO">NCO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-remove icon-large"></i>Close</button>
                            <button type="submit" class="btn btn-success"><i class="icon-check icon-large"></i>Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
