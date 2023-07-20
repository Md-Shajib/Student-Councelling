<?php
session_start();
include('include/config.php');
if(isset($_POST['save_student']))
{
	$fullName=$_POST['fullName'];
	$userEmail=$_POST['userEmail'];
	$password=md5($_POST['password']);
	$contactNo=$_POST['contactNo'];
	$status=1;
	$query=mysqli_query($bd, "insert into students(fullName,userEmail,password,contactNo,status) values('$fullName','$userEmail','$password','$contactNo','$status')");
	$msg="Registration successfull. Now You can login !";
}
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studentcounselling.online | Add student</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
    <link rel="stylesheet" href="/counsel/admin/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script>
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
</head>

<body>
    <?php include('include/header.php');?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php');?>
                <div class="span9">
                    <div class="content">

                        <div class="module" style="padding: 1rem 2rem">
                            <p style="padding-left: 1%; color: green">
                                <?php if($msg){
                             echo htmlentities($msg);
		        		}?>


                            </p>
                            <div class="module-head">
                                <h3>Add Student <a href="manage-students.php" class="btn btn-primary float-end"
                                        align="left">back</a></h3>
                            </div>
                            <div class="card-body">
                                <form action="student-create.php" method="POST">

                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <input type="text" name="fullName" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Email</label>
                                        <input type="email" name="userEmail" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Phone</label>
                                        <input type="text" name="contactNo" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="save_student" class="btn btn-primary">Save
                                            Student</button>
                                    </div>

                                </form>
                            </div>
                        </div>



                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include('include/footer.php');?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php } ?>