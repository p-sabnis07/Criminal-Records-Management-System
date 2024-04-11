<?php 
include('header.php');
include('dbconnect2.php');
?>

<div class="container-fluid">
    <?php include('menubar.php')?> 

    <div class="container-fluid">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Enter Login Details</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="saveuserlogin.php" method="post" role="form">
                        <div class="form-group">
                            <label for="fname" class="col-md-2 control-label">Firstname:</label>
                            <div class="col-md-4">
                                <input type="text" name="fname" class="form-control" id="fname" required="">
                            </div>
                            <label for="oname" class="col-md-2 control-label">Last Name:</label>
                            <div class="col-md-4">
                                <input type="text" name="oname" class="form-control" id="oname" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label">Staff Number:</label>
                            <div class="col-md-4">
                                <input type="text" name="username" class="form-control" id="username" required="">
                            </div>
                            <label for="pwd" class="col-md-2 control-label">Password:</label>
                            <div class="col-md-4">
                                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-2 control-label">Select Status:</label>
                            <div class="col-md-4">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Select</option>
                                    <option value="Admin">Admin</option>
                                    <option value="CID">CID</option>
                                    <option value="NCO">NCO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" name="save_case" class="btn btn-success form-control">
                                    Save and Continue
                                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include('scripts.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#addsdtaff').submit(function(event) {
            event.preventDefault();
            $(".list-group-item").remove();
            var formData = $(this).serialize();
            $.ajax({
                url: 'saveuserlogin.php',
                type: 'post',
                data: formData,
                dataType: 'JSON',
                success: function(response){
                    if(response.error) {
                        console.log(response.error);
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Staff Saved',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout( function(){
                            window.location='addstaff.php';
                        }, 900);
                    }
                }
            });
        });
    });
</script>

</body>
</html>
