
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Students details</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	
<link rel="stylesheet" href="/counsel/admin/css/font-awesome-4.7.0/css/font-awesome.min.css">
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
	                         <div class="card-header">
                        <h4>Student Details 
                            <a href="manage-students.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
<table cellpadding="5" cellspacing="3" border="1" class="datatable-1 table table-bordered table-striped	 display" width="100%">
<?php 

$ret1=mysqli_query($bd, "select * FROM students where id='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
  
		
    <tr>
      <td colspan="2"><h2><?php echo $row['fullName'];?>'s profile</h2></td>
      
    </tr>

    <tr height="50">
      <td><b>Reg Date:</b></td>
      <td><?php echo htmlentities($row['regDate']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Student Email:</b></td>
      <td><?php echo htmlentities($row['userEmail']); ?></td>
    </tr>


      <tr height="50">
      <td><b>Student Contact no:</b></td>
      <td><?php echo htmlentities($row['contactNo']); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Address:</b></td>
      <td><?php echo htmlentities($row['address']); ?></td>
    </tr>



        <tr height="50">
      <td><b>State:</b></td>
      <td><?php echo htmlentities($row['State']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Country:</b></td>
      <td><?php echo htmlentities($row['country']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Reg No:</b></td>
      <td><?php echo htmlentities($row['regNo']); ?></td>
    </tr>  


        <tr height="50">
      <td><b>Last Updation:</b></td>
      <td><?php echo htmlentities($row['updationDate']); ?></td>
    </tr>
     <tr height="50">
      <td><b>Status:</b></td>
      <td><?php if($row['status']==1)
      { echo "Active";
} else{
  echo "Block";
}
        ?></td>
    </tr>
   
    <?php } 

 
    ?>
 
</table>
						</div>  			
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>

</body>
<?php } ?>