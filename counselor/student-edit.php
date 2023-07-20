
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}

if(isset($_POST['update_student']))
{
	$fullName=$_POST['fullName'];
	$userEmail=$_POST['userEmail'];
	$regNo=($_POST['regNo']);
	$contactNo=$_POST['contactNo'];
	$status=1;
	$id=intval($_GET['id']);
	$query=mysqli_query($bd, "Update students set fullName='$fullName',userEmail='$userEmail',regNo='$regNo',contactNo='$contactNo',status='$status' where id='$id'");
	$_SESSION['msg']="Student Updated !!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Update Student</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Edit Student</h3>
							</div>
							<div class="module-body">

								
									<?php if(isset($_POST['update_student']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

		    	<form class="form-horizontal row-fluid" name="Student" method="post" >
 <?php
  $id=intval($_GET['id']);
  $query=mysqli_query($bd, "select * from students where id='$id'");
  while($row=mysqli_fetch_array($query))
    { ?>                       	

                            <div class="mb-3">
                                <label>Student Name</label>
                                <input type="text" name="fullName" class="form-control" value="<?php echo  htmlentities($row['fullName']); ?>">
                            </div>
                            <div class="mb-3">
                                <label>Student Email</label>
                                <input type="email" name="userEmail" class="form-control" value="<?php echo  htmlentities($row['userEmail']); ?>">
                            </div>
                            <div class="mb-3">
                                <label>Student Phone</label>
                                <input type="text" name="contactNo" class="form-control" value="<?php echo  htmlentities($row['contactNo']); ?>">
                            </div>
                            <div class="mb-3">
                                <label>Reg No</label>
                                <input type="text" name="regNo" class="form-control" value="<?php echo  htmlentities($row['regNo']); ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                            </div>

                        </form>
				</div>
						</div>


						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
</body>
</html>
<?php } ?>