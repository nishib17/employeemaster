<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'); ?>

	<script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://getbootstrap.com/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	
	<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" />
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Employee List</h3>
				<a  href="<?php echo site_url('add') ?>" style="margin-left: 95%;"><button class="btn btn-info" ><i class="fa fa-plus"></i> Add</button></a>
			<?php
			if ($this->session->flashdata('success')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('success'); ?></p>
			<?php }
			?>
			<?php
			if ($this->session->flashdata('error')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('error'); ?></p>
			<?php }
			?>
				
				<div class="table-responsive" style="margin-top: 20px">
					<table id="mytable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Id</th>
								<th width="15%">Name</th>
								<th width="20%">Address</th>
								<th width="17%">Email</th>
								<th width="10%">Phone </th>
								<th width="10%">DOB</th>
								<th width="11%">Department</th>
								<th width="6%">Photo</th>
								<th width="3%">Edit</th>
								<th width="3%">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$cnt = 1;
							foreach ($result as $key => $r) {
								?>
								<tr>
									<td><?= $cnt ?></td>
									<td><?= htmlentities($r->emp_name); ?></td>
									<td><?= htmlentities($r->address); ?></td>
									<td><?= htmlentities($r->email_address); ?></td>
									<td><?= htmlentities($r->phone_no); ?></td>
									<td><?= date('d/m/Y',strtotime($r->dob)); ?></td>
									<td><?= htmlentities($r->department); ?></td>
									<td>
										<?php
										if ($r->emp_image !='') {
											$img = base_url('uploads/'.$r->emp_image);
										}else{
											$img = base_url('uploads/default.jpg');
										}
									 ?>
										<img src="<?php echo $img ?>" width="50px" height="50px">
									</td>
									<td><a href="<?=base_url("edit/".$r->emp_id)?>"><i class="fa fa-pencil btn btn-primary"></i></a></td>
									<td><a href="<?=base_url("delete/".$r->emp_id)?>"><i class="fa fa-times btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee.')"></i></a></td>
								</tr>
								<?php
								$cnt++;
							}
							 ?>
							
						</tbody>
					</table>
				</div>
				





			</div>
		</div>
		
		
	</div>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#mytable').DataTable();
	})
</script>