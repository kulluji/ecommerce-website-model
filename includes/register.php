
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Thomso '16 | Registration Form</title>
	<meta name="author" content="Team Thomso" />
	<link rel="shortcut icon" href="img/logo.png">
	<link rel="stylesheet" type="text/css" href="css/creative.css" />
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />-->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
	<!--<script src="js/modernizr.custom.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script type="text/javascript" src="js/jquery.alphanum.js"></script>
	  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
	  <script type="text/javascript" src="js/registration_form.js"></script>
				<style>
					select:invalid { opacity: .8; }
					</style>
					
	  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>
<body style="">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<h2 class="register">REGISTRATION &nbsp; FORM</h2>				<h5 class="payment">If you have already registered, <a href="https://www.townscript.com/e/thomso-141241" class="proceed" target="_blank">proceed for payment.</a></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 back_div">
				<form class="form" method="post" action="validate.php" id="registration_form" enctype="multipart/form-data">
					<label for="name"></label>
					<input type="text" name="name" class="form-control" id="name" maxlength="50" placeholder="Name">
					<label for="email"></label>
					<input type="text" name="email" class="form-control" id="email" maxlength="256" placeholder="Email Address">
					<label for="pwd"></label>
					<input type="password" name="pwd" class="form-control" id="pwd" maxlength="50" placeholder="Password">
					<label for="confpwd"></label>
					<input type="password" name="confpwd" class="form-control" id="confpwd" maxlength="50" placeholder="Confirm Password">
					<label for="Gender"></label>
					<select id="gender" name="gender" class="gender" required>
						<option value="" style="display: none;color: red;">Choose your gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<label for="college"></label>
					<input type="text" name="college" class="form-control" id="college" maxlength="80" placeholder="College Name">
					<label for="age"></label>
					<input type="text" name="age" class="form-control" id="age" maxlength="2" placeholder="Age">
					<label for="accomodation"></label>
					<select id="accomodation" name="accomodation" required>
					  <option value="" style="display:none" >Need Accomodation?</option>
					  <option value="yes" >Yes</option>
					  <option value="No">No</option>
					</select>
					<label for="mobile"></label>
					<input type="text" name="mobile" class="form-control" id="mobile" maxlength="10" placeholder="Mobile Number">
					<label for="tshirt"></label>
					<select class="" id="tshirt" name="tshirt"  required>
						<option value="" style="display:none">Choose a tshirt size</option>
						<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
						<option value="XXL">XXL</option>
					</select>
					<label for="event"></label>
					<select id="event" name="event" required>
					 <option value="" style="display:none">Choose a primary event</option>
						
						<option value="16 Frames">16 Frames</option>
						<option value="Abhivyakti">Abhivyakti</option>
						<option value="Apocalypse">Apocalypse</option>
						<option value="Battle of Bands">Battle of Bands</option>
						<option value="Campus Princess">Campus Princess</option>
						<option value="Corporata">Corporata</option>
						<option value="Food Feista">Food Fiesta</option>
						<option value="Footloose">Footloose</option>
						<option value="Informals">Informals</option>
						<option value="Literati">Literati</option>
						<option value="M.J.G.F">M.J.G.F</option>
						<option value="Mr. & Ms. Thomso">Mr. & Ms. Thomso</option>
						<option value="Nukkad Natak">Nukkad Natak</option>
						<option value="Panel Discussion">Panel Discussion</option>
						<option value="Sargam">Sargam</option>
						<option value="Street Soccer">Street Soccer</option>
						<option value="Seiger">Seiger</option>
						<option value="Vogue">Vogue</option>
						<option value="Workshops">Workshops</option>
					</select>
					<span class="choice hidden" id="hide">
						<label for="event" class="you_want">Do you want to register for another event?</label>
						<label class="radio-inline"><input type="radio" name="yes" value="positive" class="circle" id="positive"><span style="">Yes</span></label>
						<label class="radio-inline"><input type="radio" name="yes" value="negative" class="circle" id="negative"><span style="">No</span></label>
					</span>
					<select class="another_event hidden" id="event1" name="event1">
					 <option value="None12"  disabled selected style="display: none;color: red;">Choose a secondary event</option>
						<option value="16 Frames">16 Frames</option>
						<option value="Abhivyakti">Abhivyakti</option>
						<option value="Apocalypse">Apocalypse</option>
						<option value="Battle of Bands">Battle of Bands</option>
						<option value="Campus Princess">Campus Princess</option>
						<option value="Corporata">Corporata</option>
						<option value="Food Feista">Food Fiesta</option>
						<option value="Footloose">Footloose</option>
						<option value="Informals">Informals</option>
						<option value="Literati">Literati</option>
						<option value="M.J.G.F">M.J.G.F</option>
						<option value="Mr. & Ms. Thomso">Mr. & Ms. Thomso</option>
						<option value="Nukkad Natak">Nukkad Natak</option>
						<option value="Panel Discussion">Panel Discussion</option>
						<option value="Sargam">Sargam</option>
						<option value="Street Soccer">Street Soccer</option>
						<option value="Seiger">Seiger</option>
						<option value="Vogue">Vogue</option>
						<option value="Workshops">Workshops</option>
					</select>
					
					<div class="box" style="margin-top: 4.6vh;">
					<input type="file" name="fileToUpload" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
					<label for="file-2" class="form-control" style="background-color: transparent !important; line-height: 0.2;opacity: 0.8;"><span>Upload your profile picture&hellip;</span></label>
				</div>
				<center><input type="submit" class="submit" name="submit" value="Submit"></div></center>
				</form>
			</div>
		</div>
</body>
<script src="js/custom-file-input.js"></script>
</html>