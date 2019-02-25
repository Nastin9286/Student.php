<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar_dashboard.php'); ?>
                <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div  id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"></i> Add Student</div>
                                <div class="muted pull-right"><a id="return" data-placement="left" title="Click to Return" href="students.php"><i class="icon-arrow-left icon-large"></i> Back</a></div>
																<script type="text/javascript">
																$(document).ready(function(){
																	$('#return').tooltip('show');
																	$('#return').tooltip('hide');
																});
																</script>                          
						    </div>
						    <label for="avatar">Choose a profile picture:</label>
                            <input type="file"
                                   id="avatar" name="avatar"
                                   accept="image/png, image/jpeg, image/jpg" />

                                   <?php function imagEupload() {
global $picerror;

if ($_FILES['profilepic']['error'] == 4) {
    $picerror[] = "<p class='formerrors'>No picture was uploaded,kindly upload one.</p>";
}

if ($_FILES['profilepic']['error'] >= 1) {
    $picerror[] = "<p class='formerrors'> There was an error processing your image," . $_FILES['profilepic']['name'];
} else {
    $validfiletype = ['jpg', 'jpeg', 'png']; // starts an array to hold the valid file extensions.
    $max_file_size = 1024 * 3072; // 3Mb
    $uploadpath = "uploads/";
    $uploadedfilename = $_FILES['profilepic']['name'];

    if ($_FILES['profilepic']['size'] > $max_file_size) {
        $picerror[] = "<p class='formerrors'>The uploaded file," . " $uploadedfilename" . " is too large</p>";
    } else {
//            get the file extension and check it to make sure it tallies with the valid extensions set in the array

        if (!in_array(pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION), $validfiletype)) {
            $picerror[] = "<p class='formerrors'> The uploaded file," . " $uploadedfilename" . " is not a valid image</p>";
        } else {

            $fileext = pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION);
            $filename = uniqid($_FILES['profilename']['name']) . ".$fileext";


            if (file_exists($uploadpath . $filename)) {
                $picerror[] = "<p class='formerrors'>The uploaded File," . " $uploadedfilename" . " exists,please upload another or do consider renaming it.</p>";
            } else {
                $filepath = $uploadpath . $filename;
                if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $filepath)) {

                    global $newfilepath;

                    $newfilepath = $filepath; // input this to your database, to echo the image, it would be something like this <img src='<?php echo $_row['image'] ;' />

                } else {
                    $picerror[] = "<p class='formerrors'>We could not process your image due to an unavoidable error,Please contact us or try again</p>";
                }
            }
        }
    }
}
}
?>  
						    
                            <div class="block-content collapse in">						
						<form id="add_student" class="form-signin" method="post">
						<!-- span 4 -->
										<div class="span4">
										
											<label>PAYMENT STATUS:</label>
											<select name="status" class="span5" required>
													<option></option>
													<option value="paying">Paying</option>
													<option value ="full scholar">Full scholar</option>
													<option value="paying half">Paying Half</option>
													<option value="Exempted">Exempted</option>
												</select>
												<label>STUDENT NUMBER:</label>
											<input type="text" class="input-block-level"  name="snumber" placeholder="Student Number" required>
											<label>PREFIX:</label>
											<input type="text" class="input-block-level"  name="prefix" placeholder="Prefix" >
											<label>FIRST NAME:</label>
											<input type="text" class="input-block-level"  name="fname" placeholder="First Name" required>
											<label>MIDDLE NAME:</label>
											<input type="text" class="input-block-level"  name="mname"     placeholder="Middle Name"  >
											<label>LAST NAME:</label>
											<input type="text" class="input-block-level"  name="lname"  placeholder="Last Name"  required>
											<label>SUFFIX:</label>
											<input type="text" class="input-block-level"  name="suffix" placeholder="Suffix" >
											<label>GENDER:</label>
												<select name="gender" class="span5" required>
													<option></option>
													<option>Male</option>
													<option>Female</option>
													<option>Prefer Not To Say</option>
												</select>								
										</div>
						<!-- span 4 -->				
						<!-- span 4 -->				
						<div class="span4">
											
											<label>DATE OF BIRTH:</label>
											<input type="date" class="input-block-level"  name="dob" placeholder="Date of Birth">
											<label>EMAIL ADDRESS:</label>
											<input type="text" class="input-block-level"  name="eaddress" placeholder="Email Address" required>
											<label>PHONE NUMBER:</label>
											<input type="text" class="input-block-level"  name="pnumber" placeholder="Phone Number" required>
											<label>HOME ADDRESS:</label>
											<input type="text" Placeholder="Permanent Address" name="address" class="my_message" required>
											<label>COURSE:</label>

											<select name="student_class" class="span5" required>
											<option></option>

											<?php 
											$result = mysqli_query($connection,"select * from class ")or die(mysql_error());
											while($row = mysqli_fetch_array($result)){
											$myclass = $row['class_name'];			
									?>
								<option value="<?php echo $myclass;?>"> <?php echo $myclass;?> </option>
									<?php }?>
									</select>	
											
							
							<label>SCHOOL YEAR:</label>
											<input type="text" class="input-block-level"  name="syear" placeholder="School Year" required>
							<label>SUBJECTS ENROLLED:</label>
											<input type="text" class="input-block-level"  name="senrolled" placeholder="Subject enrolled" required>
							<label>NUMBER OF UNITS:</label>
											<input type="text" class="input-block-level"  name="Nofunits" placeholder="Number Of Units" required>
							
									<dt><label>TRANSPORT:</label></dt>
											<dd><label class="radio-inline"><input type="radio" name="transport" value="yes" checked='true'> Yes </label></dd>
											<dd><label class="radio-inline"><input type="radio" name="transport" value="no"> No</label></dd>
										
									<label>ROUTE:</label>
											<input type="text" Placeholder="Route Name" name="route" class="my_message">
									<br>
									<br>
									<button class="btn btn-success" name="save"><i class="icon-save icon-large"></i> Save </button>

						</div>
						<!--end span 4 -->	
						<!-- span 4 -->	
						<div class="span4">
									
							<label>GUARDIAN FIRSTNAME:</label>
							<input type="text" class="input-block-level"  name="gfname" placeholder="First Name" required>
							<label>GUARDIAN MIDDLENAME:</label>
							<input type="text" class="input-block-level"  name="gmname" placeholder="Middle Name" >
							<label>GUARDIAN LASTNAME:</label>
							<input type="text" class="input-block-level"  name="glname" placeholder="Last Name" required>
							<label>RELATIONSHIP TO STUDENT:</label>
							<input type="text" class="input-block-level"  name="rship" placeholder="Relationship To Student" required>
							<label>PHONE NUMBER:</label>
							<input type="text" class="input-block-level"  name="tel" placeholder="Telephone No" onkeydown='return(event.which >= 48 && event.which <= 57)
											|| event.which ==8 || event.which == 46' maxlength ="10" required>
						</div>
						<!--end span 4 -->
						</form>
							
			<script>
			jQuery(document).ready(function($){
				$("#add_student").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "save_stud.php",
						data: formData,
						success: function(html){
							$.jGrowl("Student Successfully  Added", { header: 'Student Added' });
							window.location = 'students.php';  
						}
					});
				});
			});
			</script>
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