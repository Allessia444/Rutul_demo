<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="/css/front.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="/js/front.js"></script>

</head>
<body>
	

	@include('Admin.shared.header')
	@include('Admin.shared.sidebar')
	@include('Admin.shared.footer')


	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add User</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>





				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add User</h4>
							<p class="mb-30 font-14"></p>
						</div>
						
					</div>
					<form method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">First name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="text" name="fname" placeholder="Enter First Name">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="text" name="lname" placeholder="Enter First Name">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email Address</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="email" name="email" placeholder="Enter Email Address">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="Password" name="password" placeholder="Enter password">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="text" name="mobile_number" placeholder="Enter Mobile Number">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Status</label>
							<div class="col-sm-12 col-md-10">
								<input  type="radio" name="status" checked value="0">Active
								<input  type="radio" name="status" value="1">Inactive
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">User Photo</label>
							<div class="col-sm-12 col-md-10">
								<input  type="file" name="photo">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Phone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="text" name="phone" placeholder="Enter contact nuber">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address1</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="address1" placeholder="First Address"></textarea>
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address2</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="address2" placeholder="Second Address"></textarea>
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2">City</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="text" name="city" placeholder="Enter City">
							</div>	
						</div>



						<div class="form-group row">
							<label class="col-sm-12 col-md-2">State</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="text" name="state" placeholder="Enter state">
							</div>	
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2">Country</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="text" name="country" placeholder="Enter country">
							</div>	
						</div>



						<div class="form-group row">
							<label class="col-sm-12 col-md-2">Zip code</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="number" name="zipcode" placeholder="Enter zipcode">
							</div>	
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2">Dob</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required="" type="date" name="dob" >
							</div>	
						</div>
							
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
							<div class="col-sm-12 col-md-10">
								<input  type="radio" name="gender" checked value="male">Male
								<input  type="radio" name="gender" value="female">Female
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Marital Status</label>
							<div class="col-sm-12 col-md-10">
								<select>
									<option></option>
								</select>
							</div>
						</div>



							<div class="form-group">

							<center>							

								<div class="btn-list">
								
								<input type="submit" value="Add User" class="btn btn-outline-success" name="btnadduse">
								

								</center>

								
							</div>

						</div>

					</form>
					
				</div>
				<!-- Default Basic Forms End -->

				

			</div>
		
		</div>
	</div>
	

</body>


</html>