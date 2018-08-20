<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Metronic | Login Options - Login Form 1</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<title>User | Login</title>
	{!!Html::style("http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all")!!}
	{!!Html::style("bower_components/global/plugins/bootstrap/css/bootstrap.min.css")!!}
	{!!Html::style("bower_components/admin/pages/css/login.css")!!}
	{!!Html::style("bower_components/global/css/components-rounded.css")!!}
	{!!Html::style("bower_components/css/custom_style.css")!!}
</head>
<body class="login">
	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler">
	</div>
	<!-- END SIDEBAR TOGGLER BUTTON -->
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="index.html">
		<img src="../../../assets/admin/layout4/img/logo-big.png" alt=""/>
		</a>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="m-t-100">
		<div class="content">
			<!-- BEGIN LOGIN FORM -->
			<form class="login-form" action="index.html" method="post">
				<h3 class="form-title">Sign In</h3>
				<div class="alert alert-danger display-hide">
					<button class="close" data-close="alert"></button>
					<span>
					Enter any username and password. </span>
				</div>
				<div class="form-group">
					<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
					<label class="control-label visible-ie8 visible-ie9">Username</label>
					<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
				</div>
				<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">Password</label>
					<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
				</div>
				<div class="form-actions">
					<div class="col-md-12 col-xs-12 t-c">
						<button type="submit" class="btn btn-success uppercase">Login</button>
					</div>
				</div>
			</form>
			<!-- END LOGIN FORM -->

		</div>
	</div>
	<!-- END LOGIN -->

{!!Html::script('bower_components/global/plugins/jquery.min.js')!!}
{!!Html::script('bower_components/global/plugins/bootstrap/js/bootstrap.min.js')!!}
{!!Html::script('bower_components/global/plugins/jquery-validation/js/jquery.validate.min.js')!!}
{!!Html::script('bower_components/global/scripts/metronic.js')!!}
{!!Html::script('bower_components/admin/layout/scripts/layout.js')!!}
{!!Html::script('bower_components/admin/pages/scripts/login.js')!!}
</body>
</html>
