<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
<center><img src="images/pcu.jpg"></center>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">

            <div class="row-fluid">
				<?php include('sidebar_activity_log.php'); ?>
    	
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Activity Log List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" id="studentTableDiv">
                                    <h2 id="noch"> Activity Logs List</h2>
  									<center><table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									
									<div class="pull-right">
									 <a href="#" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print List</a> 
									 
									</div><br><br>
										<thead>
										        <tr>
												<th>Date</th>
												<th>User</th>
												<th>Action</th>
												</tr>											
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($connection,"select * from  activity_log ORDER BY activity_log_id DESC")or die(mysql_error());
										while($row = mysqli_fetch_array($query)){
									?>
									<tr>
                                         <td><?php  echo $row['date']; ?></td>
                                         <td><?php echo $row['username']; ?></td>
                                         <td><?php echo $row['action']; ?></td> 
									</tr>
                         
						 <?php } ?>
										</tbody>
									</table></center>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
	<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>