<?php include('header.php'); ?>
<?php include('session.php'); ?>
 <?php       require_once 'dbcon.php';?>
    <body >
		<?php include('navbar.php') ?>
                <center><img src="images/logo.png"></center><br>
        <div class="container-fluid" id="">

            <div class="row-fluid">
					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">STATISTICS</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								$query_students = mysqli_query($connection,"select * from students  ");
								$count_students = mysqli_num_rows($query_students);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_students; ?>"><?php echo $count_students; ?></div>
                                    <div class="chart-bottom-heading"><strong>STUDENTS</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_class = mysqli_query($connection,"select * from class");
								$count_class = mysqli_num_rows($query_class);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_class; ?>"><?php echo $count_class; ?></div>
                                    <div class="chart-bottom-heading"><strong>CLASSES</strong>

                                    </div>
                                </div>
								<?php 
																
								$query_nursery = mysqli_query($connection," select * from students, class where students.class = class.class_name AND class.category ='Nursery'");
								
								$count_nursery = mysqli_num_rows($query_nursery);
								
								?>
								
                                
										<?php 
								$query_admin = mysqli_query($connection," select * from users where status='administrator' ");
								$count_admin = mysqli_num_rows($query_admin);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_admin ?>"><?php echo $count_admin ?></div>
                                    <div class="chart-bottom-heading"><strong>ADMIN USERS</strong>

                                    </div>
                                </div>
								
										<?php 
								$query_normal = mysqli_query($connection," select * from users where status='normal'");
								$count_normal = mysqli_num_rows($query_normal);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_normal; ?>"><?php echo $count_normal; ?></div>
                                    <div class="chart-bottom-heading"><strong>NORMAL USERS</strong>

                                    </div>
                                </div>
								
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                
                </div>
            </div>
    
         <?php include('footer.php'); ?>
		 
        </div>
	<?php include('script.php'); ?>
    </body>
</html>