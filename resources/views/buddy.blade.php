
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DisasterPrevention</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

    <div style="text-align:center">
        メモ（削除予定） <br>
        ※左のバディは、自分のバディ一覧 <br>
        ※バディを申請する際は、相手のマイページで申請する <br>
        ※申請待ちのバディは、バディページで確認できる <br>
   
        以下バディ一覧 <br>
        <br>
        ※フォーム作成必須 <br>
        @foreach($users as $user)
            <p>{{ $user->name }}</p>
          <button>申請</button>
          <br>
        @endforeach
        <br>
        ここまで <br>
   
    </div>

	
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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		@extends('common.aside')

		<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<div class="row row-bottom-padded-md">
					<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
						<img class="img-responsive" src="images/img_bg_1.jpg" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
					</div>
					<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
						<h2 class="fh5co-heading">About Company</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Quisque sit amet efficitur nih. Interdum et malesuada fames ac ante ipsum primis in faucibus interda et malesuada parturient.</p>
						<p>Quisque sit amet efficitur nih. Interdum et malesuada fames ac ante ipsum primis in faucibus interda et malesuada parturient.</p>
					</div>
				</div>
			</div>

			<div class="fh5co-narrow-content">
					<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Our Services</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-settings"></i>
								</div>
								<div class="fh5co-text">
									<h3>Strategy</h3>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-search4"></i>
								</div>
								<div class="fh5co-text">
									<h3>Explore</h3>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-paperplane"></i>
								</div>
								<div class="fh5co-text">
									<h3>Direction</h3>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-params"></i>
								</div>
								<div class="fh5co-text">
									<h3>Expertise</h3>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
								</div>
							</div>
						</div>
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

