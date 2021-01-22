<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'); ?>

	<!-- <script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script> -->
	<script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://getbootstrap.com/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h3>Employee</h3>
			<hr>
				<div class="row">
					<div class="col-md-3"><b>Employee Name</b> 
						
					</div>
					<div class="col-md-3"> : 
						<?= $result->emp_name?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3"><b>Employee Address</b> 
					</div>
					<div class="col-md-3"> : 
						<?= $result->address?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3"><b>Email Address</b>
						
					</div>
					<div class="col-md-3"> : 
						<?= $result->email_address?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3"><b>Phone No</b>
					</div>
					<div class="col-md-3"> : 
						<?= $result->phone_no?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3"><b>DOB</b>
					</div>
					<div class="col-md-3"> : 
						<?= date('d/m/Y',strtotime($result->dob)); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3"><b>Department</b>
					</div>
					<div class="col-md-3"> : 
						<?= $result->department?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3"><b>Employee image</b>
						           			                   

					</div>
					<div class="col-md-3"> : 
						<?php
							if ($result->emp_image !='') {
								$img = base_url('uploads/'.$result->emp_image);
							}else{
								$img = base_url('uploads/default.jpg');
							}
						 ?>
						<img src="<?php echo $img ?>" width="100px" height="100px">  
					</div>
				</div>
				<div class="row">
					<div class="col-md-4" style="margin-top: 3%;margin-bottom: 5%">
						 <a href="<?php echo base_url(); ?>" name="Cancel" class="btn  btn-warning "><i class="fa fa-angle-left"></i> Cancel</a>
					</div>
				</div>

				
			</form>
						





		</div>
		</div>
		
		
	</div>

</body>
<script type="text/javascript">
	$(function() {
	 	$( "#datepicker" ).datepicker();
	}
</script>
</html>