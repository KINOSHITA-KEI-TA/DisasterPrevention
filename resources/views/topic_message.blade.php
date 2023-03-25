<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DisasterPrevention</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

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
	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}" ></script>
</head>
<body>
<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
    @extends('common.topic_list')
    <div id="fh5co-main">
        <aside id="fh5co-hero" class="js-fullheight">
            <div class="row justify-content-center animate-box">
            <a href="{{ url('/category/'.$category->id.'/topic') }}">< カテゴリ選択へ戻る</a>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <ul id="board">
                                @foreach($topic_messages->messages as $post)
                                    <li>{{ $post->message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="topic_id" value="{{ $id }}">
                            <input type="text" name="message" id="text">
                            <button id="submit" type="submit">送信</button>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
