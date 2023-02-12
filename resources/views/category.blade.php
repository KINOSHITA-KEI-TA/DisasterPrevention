
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DisasterPrevention</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		@extends('common.aside')

		<div id="fh5co-main">
			<form class="category-form d-flex animate-box" action="{{ url('/create') }}" method="POST">
			{{ csrf_field() }}
				<div class="col-md-4 category-form-tag">
					<select id="inputState" name="TagName" class="form-select category-form-input">
					<option selected>ジャンル</option>
					@foreach ($tags as $tag)
					<option value="{{ $tag->id }}">{{ $tag->category_tag_name }}</option>
					@endforeach
					</select>
				</div>
				<div class="col-md-6 category-form-text">
					<input type="text" name="CategoryName" class="form-control" placeholder="新規作成カテゴリ名入力">
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary btn-category-form">新規作成</button>
				</div>
			</form>
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">カテゴリ一覧</h2>
				<div class="row row-bottom-padded-md category-list animate-box">

					@foreach($data as $item)
						<div class="blog-entry">
							<a href="{{ url('/category/'.$item->id.'/topic') }}" class="blog-img"><img src="{{asset($item->category_tags->url)}}" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
							<div class="desc">
								<h3><a href="{{ url('/category/'.$item->id.'/topic') }}">{{ $item->category_name }}</a></h3>
								<a href="{{ url('/category/'.$item->id.'/topic') }}"class="lead">Read More <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					@endforeach
				</div>
			</div>

			<div id="get-in-touch">
				<div class="fh5co-narrow-content">
					<div class="row">
						<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
							<h1 class="fh5co-heading-colored">お問合せはこちら</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<p class="fh5co-lead"></p>
							<p><a href="/contact" class="btn btn-primary">お問合せ</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

