<!doctype html>
<html lang="en">
<head>
	<title>Login 10</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/cms/login/css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="img js-fullheight" style="background-image: url(<?php echo base_url(); ?>/assets/cms/login/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #10</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="<?= site_url("api/authentication/signin/login") ?>" class="signin-form">
		      		<div id="email-group" class="form-group">
		      			<input id="email-field" name="Email" type="text" class="form-control" placeholder="Username" required>
		      		</div>
					<div id="password-group" class="form-group">
						<input id="password-field" name="Password" type="password" class="form-control" placeholder="Password" required>
					<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>
					<div id="message-group" class="form-group">	
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
					</div>
					<!-- <div class="form-group d-md-flex">
						<div class="w-50">
							<label class="checkbox-wrap checkbox-primary">Remember Me
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="w-50 text-md-right">
							<a href="#" style="color: #fff">Forgot Password</a>
						</div>
					</div> -->
					<div class="w-100 text-center">
						<a href="#" style="color: #fff">Forgot Password</a>
					</div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

    <script src="<?php echo base_url('assets/cms/login/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/cms/login/js/popper.js')?>"></script>
    <script src="<?php echo base_url('assets/cms/login/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/cms/login/js/main.js')?>"></script>
	<script>
		$(document).ready(function () {
			$("form").submit(function (event) {
				var formData = {
					email: $("#email-field").val(),
					password: $("#password-field").val(),
				};
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: formData,
					dataType: "json",
					encode: true,
					error: function(error) {
						// console.log(error.responseJSON);
						$("#message-group").addClass("w-100 text-center");
						$("#message-group").append(
							'<div class="help-block">' + error.responseJSON.message + "</div>"
						);
					},
					success: function (data) {
						localStorage.setItem('auth_token', data.data.token);
						window.location.href = '<?= site_url("dashboard/homepage") ?>';
						// console.log(data.data.token);
					}
				});
				event.preventDefault();
			});
		});

		// function loadHomepage()
		// {	
		// 	// var $a = localStorage.getItem('auth_token');
			// $.ajax({
			// 	type: "POST",
			// 	url: "<?= site_url("authentication/signin") ?>",
			// 	headers: {'Authorization': localStorage.getItem('auth_token')},
			// 	success: function(response){
			// 		// res.render('somepage', {somevar: withsomevalue}); 
			// 		$("html").html(response);

			// 	}
			// });
		// 	window.location.href = '<?= site_url("dashboard/homepage") ?>';
		// }
	</script>

</body>

</html>

