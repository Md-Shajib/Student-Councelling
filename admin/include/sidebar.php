<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <!-- <li>
                <a class="collapsed" data-toggle="collapse" href="#togglePages">
                    <i class="menu-icon icon-cog"></i>
                    <i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
                    Manage Counsel
                </a>
                <ul id="togglePages" class="collapse unstyled">
                    <li>
                        <a href="notprocess-counsel.php">
                            <i class="icon-tasks"></i>
                            Not Process Yet Counsel
                            <?php
							$rt = mysqli_query($bd, "SELECT * FROM tblstudents where status is null");
							$num1 = mysqli_num_rows($rt);
							{?>

                            <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="inprocess-counsel.php">
                            <i class="icon-tasks"></i>
                            Pending Counsel
                            <?php 
								$status="in Process";                   
								$rt = mysqli_query($bd, "SELECT * FROM tblstudents where status='$status'");
								$num1 = mysqli_num_rows($rt);
								{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="closed-counsel.php">
                            <i class="icon-inbox"></i>
                            Closed Counsel
                            <?php 
								$status="closed";                   
								$rt = mysqli_query($bd, "SELECT * FROM tblstudents where status='$status'");
								$num1 = mysqli_num_rows($rt);
								{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>

                        </a>
                    </li>
                </ul>
            </li> -->

            <li>
                <a href="manage-students.php">
                    <i class="menu-icon icon-group"></i>
                    Manage student
                </a>
            </li>

            <li>
                <a href="manage-counselors.php">
                    <i class="menu-icon icon-group"></i>
                    Manage Counselor
                </a>
            </li>
        </ul>


        <ul class="widget widget-menu unstyled">
            <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Manage Category </a></li>
            <!-- <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Add Counselling Sub-Category </a></li>
            <li><a href="state.php"><i class="menu-icon icon-paste"></i>Add Counselling State</a></li> -->
        </ul>
        <!--/.widget-nav-->

        <ul class="widget widget-menu unstyled">
            <li><a href="student-logs.php"><i class="menu-icon icon-tasks"></i>Student Login Log </a></li>

            <li>
                <a href="logout.php">
                    <i class="menu-icon icon-signout"></i>
                    Logout
                </a>
            </li>
        </ul>

    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->