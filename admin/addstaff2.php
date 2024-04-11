<?php 
include('header.php');
include('dbconnect2.php');
?>

<div class="container-fluid">
    <?php include('menubar.php')?> 
    <?php // include('menubar1.php');?>
    <div class="container-fluid">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <ul class="list-group" id="myinfo">
                <li class="list-group-item" id="mylist"></li>
            </ul>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?php // You can add dynamic content here if needed ?>
                    <h3 class="panel-title">Enter Staff Details</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <form class="form-horizontal" method="post" action="savestaff.php" id="addstaff" role="form">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="staffid">Staff ID:</label>
                                        <input type="text" name="staffid" class="form-control" id="staffid" placeholder="Enter StaffID">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="surname">Surname:</label>
                                        <input type="text" name="surname" class="form-control" id="surname" placeholder="Enter Surname" autofocus="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="othernames">Othernames:</label>
                                        <input type="text" name="othernames" class="form-control" id="othernames" placeholder="Enter Othernames">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid">National ID NO:</label>
                                        <input type="text" name="nid" class="form-control" id="nid" placeholder="Enter National ID NO" autofocus="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_type">Select ID Type:</label>
                                        <select class="form-control" name="id_type" id="id_type">
                                            <option selected="selected" value="">Select</option>
                                            <option value="Voters ID">Voters ID</option>
                                            <option value="National Identification Card">National Identification Card</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Drivers License">Drivers License</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="posaddrs">Postal Address:</label>
                                        <input type="text" name="posaddrs" class="form-control" id="posaddrs" placeholder="Enter Postal Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="digaddrs">Digital Address:</label>
                                        <input type="text" name="digaddrs" class="form-control" id="digaddrs" placeholder="Enter Digital Address">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="region">Station Region:</label>
                                        <script type="text/javascript" src="../js/regions.js"></script>
                                        <select class="form-control" required="" onchange="print_state('state',this.selectedIndex);" id="region" name="region">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">Station District/Municipal:</label>
                                        <select required="" class="form-control" name="district" id="district"></select>
                                        <script language="javascript">print_country("region");</script>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="loc">City/Town:</label>
                                        <input type="text" name="loc" class="form-control" id="loc" placeholder="Enter City/Town">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save_case" class="btn btn-success form-control">Save and Continue <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php include('scripts.php'); ?>
<script type="text/javascript">
    $(document).on('submit', '#addstaff', function(event) {
        event.preventDefault();
        // This removes the error messages from the page
        $(".list-group-item").remove();
        var formData = $(this).serialize();
        $.ajax({
            url: 'savestaff.php',
            type: 'post',
            data: formData,
            dataType: 'JSON',
            success: function(response) {
                if(response.error) {
                    var len = response[0].length;
                    for(var i = 0; i < len; i++) {
                        $('#myinfo').append('<li class="list-group-item alert alert-danger">' + response[0][i] + '</li>');
                    }
                } else {
                    window.location = response.url;
                }
            }
        });
    });
</script>

</body>
</html>
