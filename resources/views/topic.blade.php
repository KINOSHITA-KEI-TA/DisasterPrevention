
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
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<!-- Icomoon Icon Fonts-->
	<link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">
	<!-- Bootstrap  -->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<!-- Flexslider  -->
	<link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
	<!-- Theme style  -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<!-- Modernizr JS -->
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}" ></script>

</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		@extends('common.topic_list')
		@section('back_link')
			<a href="{{ url('/category') }}" class="text-muted mt-1"><i class="fas fa-chevron-left"></i> カテゴリ選択へ戻る</a>
		@endsection
		<div class="container-fluid sticky-top-form">
			<div class="row">
				<div class="col-12 d-flex justify-content-center animate-box">
					<form class="category-form d-flex col-lg-8 col-md-9 col-12" action="{{ url('/topic/create') }}" method="POST">
						{{ csrf_field() }}
						<div class="col-10 category-form-text d-flex flex-column">
							<input type="hidden" name="category_id" value="{{ $id }}">
							<input type="text" name="TopicName" class="form-control category-form-input @error('TopicName') is-invalid @enderror" placeholder="新規作成チャンネル">
							@error('TopicName')
								<span class="invalid-feedback-custom" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-primary btn-category-form"><i class="fas fa-paper-plane"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('js/jquery.min.js') }}" ></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('js/jquery.easing.1.3.js') }}" ></script>
	<!-- Bootstrap -->
	<script src="{{ asset('js/bootstrap.min.js') }}" ></script>
	<!-- Waypoints -->
	<script src="{{ asset('js/jquery.waypoints.min.js') }}" ></script>
	<!-- Flexslider -->
	<script src="{{ asset('js/jquery.flexslider-min.js') }}" ></script>

	<!-- MAIN JS -->
	<script src="{{ asset('js/main.js') }}" ></script>
	<script src="{{ asset('js/app.js') }}" ></script>
	</body>
</html>

