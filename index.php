<?php include 'dbconection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
			<strong>Fill File name and Upload PDF</strong>
				<form method="post" enctype="multipart/form-data" >
					<?php
						
						if (isset($_POST['submit']))
						{
						
						$name = $_POST['name'];					

						if (isset($_FILES['pdf_file']['name']))
						{
					
							$file_name = $_FILES['pdf_file']['name'];
							$file_tmp = $_FILES['pdf_file']['tmp_name'];
							
							$insertquery =
							"INSERT INTO students(file_name,file) VALUES('$name','$file_name')";
							
							
							$iquery = mysqli_query($con, $insertquery);	

								if ($iquery)
							{							
					?>											
								<div class=
								"alert alert-success alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									×
									</a>
									<strong>Success!</strong> Data submitted successfully.
								</div>
								<?php
								}
								else
								{
								?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
									×
									</a>
									<strong>Failed!</strong> Try Again!
								</div>
								<?php
								}
							}
							else
							{
							?>
								<div class=
								"alert alert-danger alert-dismissible fade show text-center">
								<a class="close" data-dismiss="alert" aria-label="close">
									×
								</a>
								<strong>Failed!</strong> File must be uploaded in PDF format!
								</div>
							<?php
							}
						}
					?>
					
					<div class="form-input py-2">
						<div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter file name" name="name">
						</div>								
						<div class="form-group">
							<input type="file" name="pdf_file"
								class="form-control" accept=".pdf" required/>
								 <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/>
						</div>
						<div class="form-group">
							<input type="submit"
								class=" btn btn-info" name="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>		
			
			<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-header text-center">
				<h4>Records from Database</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table>
						<thead>
							<th>ID , </th>
							
							<th>File Name , </th>
							<th>File</th>
						</thead>
						<tbody>
						<?php
							$selectQuery = "select * from students";
							$squery = mysqli_query($con, $selectQuery);

							while (($result = mysqli_fetch_assoc($squery))) {
						?>
						<tr>
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $result['file_name']; ?></td>
							<td><?php echo $result['file']; ?></td>
						</tr>
						<?php
							}
						?>
						</tbody>
					</table>			
					</div>
					
				</div>
			</div>
			<br><br>
			<div>

					<a href='./pdf.php' class='btn btn-info' red>Search for files</a>
		
					</div>
		</div>
	</div>
</body>
</html>
