<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="{{BASE_URL}}public/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{BASE_URL}}public/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{BASE_URL}}public/css/datepicker3.css" rel="stylesheet">
	<link href="{{BASE_URL}}public/css/styles.css" rel="stylesheet">
	
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	@include('layouts.header')
  @include('layouts.aside')

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Forms</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('content-title')</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
			@yield('content')
				</div><!-- /.panel-->
				
				
			
				
			</div><!-- /.col-->
			<div class="col-sm-12">
			
			</div>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="{{BASE_URL}}public/js/jquery-1.11.1.min.js"></script>
	<script src="{{BASE_URL}}public/js/bootstrap.min.js"></script>
	<script src="{{BASE_URL}}public/js/chart.min.js"></script>
	<script src="{{BASE_URL}}public/js/chart-data.js"></script>
	<script src="{{BASE_URL}}public/js/easypiechart.js"></script>
	<script src="{{BASE_URL}}public/js/easypiechart-data.js"></script>
	<script src="{{BASE_URL}}public/js/bootstrap-datepicker.js"></script>
	<script src="{{BASE_URL}}public/js/custom.js"></script>
	
</body>
</html>
