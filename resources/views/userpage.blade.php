<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>マイページ</title>
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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

</head>



	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		@extends('common.aside')

		<div id="fh5co-main">
			<aside id="fh5co-hero" class="js-fullheight">
				<div class="flexslider js-fullheight">
                    <h3>【大野】一旦、ユーザー検索→ユーザー個人ページ遷移で実装。カテゴリー機能実装完了次第、修正予定。</h2>
                    <br>
                    {{$user->name}}さんのページ
                    {{-- 相互フォロー機能追加予定 --}}
                    @if(!in_array($user->id, $followUserIdArray))
                    <form method="POST" action="{{route('addFollowFromUserPage',['addFollowId' => $user->id])}}">
                        <h4>フォローのたびにリダイレクトのエラー発生（フォロー、フォロー解除自体はできる）※リダイレクトは非同期で実装予定。</h4>
                        @csrf
                        @if(Auth::user() != $user)
                            <button style="background: skyblue" type="submit">フォローする</button>
                        @endif
                    </form>
                    @endif
                    @if(in_array($user->id, $followUserIdArray))
                        <form method="POST" action="{{route('deleteFollow',['followerId' => $user->id])}}">
                            @csrf
                            @if(Auth::user() != $user)
                                <button style="background: yellow" type="submit">フォロー解除</button>
                            @endif
                        </form>
                    @endif
				</div>
			</aside>

			
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Services</h2>
				<div class="row">
					<div class="col-md-6">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<a href="/mypage"><i class="icon-settings"></i></a>
							</div>
							<div class="fh5co-text">
								<h3>setting</h3>
								<p>マイページ </p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
							<!-- Wordpressのurl -->
								<a href="/"><i class="icon-document-text"></i></a>
							</div>
							<div class="fh5co-text">
								<h3>blog</h3>
								<p>Wordpress </p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<a href="/"><i class="icon-paperplane"></i></a>
							</div>
							<div class="fh5co-text">
								<h3>dm</h3>
								<p>ダイレクトメッセージ </p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="fh5co-icon">
								<a href="/buddy"><i class="icon-group"></i></a>
							</div>
							<div class="fh5co-text">
								<h3>Buddy</h3>
								<p> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Categories</h2>
				<div class="row row-bottom-padded-md">
					<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
							<a href="#" class="blog-img"><img src="images/23880633_s.jpeg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
							<div class="desc">
								<h3><a href="#">防災対策</a></h3>
								<p>防災対策についての部屋</p>
								<a href="#" class="lead">もっと見る <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
							<a href="#" class="blog-img"><img src="images/24151121_s.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
							<div class="desc">
								<h3><a href="#">ハザードマップ</a></h3>
								<p>各地域のハザードマップ</p>
								<a href="#" class="lead">もっと見る <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
							<a href="#" class="blog-img"><img src="images/23311032_s.jpeg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
							<div class="desc">
								<h3><a href="#">防災グッズ</a></h3>
								<p>こんなにある防災グッズ</p>
								<a href="#" class="lead">もっと見る <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
							<a href="#" class="blog-img"><img src="images/23845735_s.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
							<div class="desc">
								<h3><a href="#">震災</a></h3>
								<p>震災について話し合おう</p>
								<a href="#" class="lead">もっと見る <i class="icon-arrow-right3"></i></a>
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

                    {{-- テストページ一覧※削除予定 --}}
                    <div class="row">
                        <h2>以下テスト用リンク</h2>
                        <li><a href="/testpagelist">【大野】テストページ一覧※削除予定</a></li>
                        @if(Auth::user())
                            <li><a href="/mypage">マイページ</a></li>
                            <li>【大野確認用】{{Auth::user()->name}}さんがログイン中</li>
                        @else
                            <li><a href="/login">ログイン</a></li>
                        @endif
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

