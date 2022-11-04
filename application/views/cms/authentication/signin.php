<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>K&K Cosmetics - Đăng nhập</title>

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/cms/home/logo.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/cms/login/css/login.css">
</head>

<body class="img js-fullheight" style="background-image: url(<?php echo base_url(); ?>/assets/cms/login/images/login.jpeg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
					<h1 class="heading-section mb-0">K&K COSMETICS</h1>
				</div>
			</div>
			<div class="row justify-content-center mb-5">
				<div class="col-md-6 text-center">
					<h3 class="mb-0">Đăng nhập vào hệ thống cửa hàng</h3>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-6">
					<div class="login-wrap p-0">
						<form action="<?= site_url("api/authentication/signin/login") ?>">
							<div id="email-group" class="form-group">
								<input id="email-field" name="Email" type="text" class="form-control" placeholder="Email" required>
							</div>
							<div id="password-group" class="form-group">
								<input id="password-field" name="Password" type="password" class="form-control" placeholder="Mật khẩu đăng nhập" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="row justify-content-center mt-5">
								<button type="submit" class="form-control btn btn-primary col-8 col-md-8 col-lg-8">Đăng nhập</button>
							</div>
						</form>
						<div class="text-center mt-2">
							<a href="#" class="text-primary">Quên mật khẩu</a>
						</div>
						<div id="login-message" class="text-danger text-center"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url('assets/cms/login/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/cms/login/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/cms/login/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/cms/login/js/login.js') ?>"></script>

	<script>
		$(document).ready(function() {
			$("form").submit(function(event) {
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
						$("#login-message").text(error.responseJSON.message);
					},
					success: function(data) {
						localStorage.setItem('auth_token', data.data.token);
						window.location.href = '<?= site_url("dashboard/homepage") ?>';
					}
				});
				event.preventDefault();
			});

			$("#email-group, #password-group").change(function() {
				$("#login-message").text("");
			});
		});
	</script>

</body>

</html>