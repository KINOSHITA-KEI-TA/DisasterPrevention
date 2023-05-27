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
	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}" ></script>
	<script src="https://kit.fontawesome.com/9eabde9770.js" crossorigin="anonymous"></script>
</head>

	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		@extends('common.aside')

		<div id="fh5co-main">
		<aside>
                    @if($user != null)
					{{Auth::user()->name}}さんがログイン中（プロフィール編集中）
                        <!-- <h3>【大野】一旦、ユーザー検索→ユーザー個人ページ遷移で実装。カテゴリー機能実装完了次第、修正予定。</h2> -->
                        <br>
                        {{-- 相互フォロー機能追加予定 --}}
                        <form method="POST" action="{{route('addFollowFromUserPage',['addFollowId' => $user->id])}}">
                            <!-- <h4>フォローのたびにリダイレクトのエラー発生（フォロー、フォロー解除自体はできる）※リダイレクトは非同期で実装予定。</h4> -->
                            @csrf
                            @if(Auth::user() != $user)
                                <button style="background: skyblue" type="submit">フォローする</button>
							@else
                            @endif
                        </form>
                        @endif
				</aside>
            <form action="{{ route('update',$user->id)}}" method="POST">
            @csrf
			<div class="fh5co-narrow-content">
                <h2 class="fh5co-heading animate-box title-maypage" data-animate-effect="fadeInLeft">マイページ</h2>
            <div class="row row-bottom-padded-md MyProfile">
                	<div class="animate-box col-md-3 col-padding col-sm-6 fadeInUp text-center MyImage">
                    <a href="#" class="work image-popup" style="background-image: url(images/人物のアイコン素材.jpeg);">
                    <div class="Mypage-desc desc">
                    <h3>プロフィール画像</h3>       
                    <span>Illustration</span>
                    </div>
                    </a>
                    </div>
                    <div class="MyList">
                    <h2 class="MyListTitle" for="name">ニックネーム</h2>
                    <!-- <div><label class="MyListTitle_form" for="name">ニックネーム</label></div> -->
                    <div><input type="text" class="MyListContent_form" name="name" id="name" value="{{old('$user->name')?: $user->name}}"></div>
                    <!-- <p class="MyListContent">{{$user->name}}</p> -->
                    <h2 class="MyListTitle">所属自治体</h2>
                    <div class="Area">
                        <p class="MyListContent">東京都</p>
                        <p class="MyListContent">&nbsp葛飾区</p>
                    </div>
                    <h2 class="MyListTitle">紹介文</h2>
					<div class="Area">
					<textarea rows="4" cols="40" type="text" class="MyListContent_form_text" name="nickname" id="nickname" value="{{old('$user->nickname')?: $user->nickname}}">{{old('$user->nickname')?: $user->nickname}}</textarea>
                        <p class="MyListContent"></p>
                    </div>
                    <!-- <h2 class="MyListTitle">所属カテゴリー</h2> -->
                    <!-- <div class="MyCategory-list">
                    <div class="support-box">
                        <div class="support-img"><img src="images/23880633_s.jpeg" width="200px" height="200px" alt="カテゴリー画像"></div>
                        <div class="support-img"></div>
                        <div class="support-img"></div>
                        <div class="support-img"></div>
                        <div class="support-img"></div>
                        <div class="support-img"></div>
                    </div>
                    </div> -->
                    <!-- <ul>
                        <li>
                            <div class="support-img">
                            <a href="#" class="support-img_1" style="background-image: url(images/img-2.jpg);">
                            <div class="desc">
                                <h3>Project Name</h3>
                                <span>Brading</span>
                            </div>
                            </a>
                            </div>
                        </li>
                        <li>〜</li>
                        <li>〜</li>
                    </ul> -->
                    <!-- <h2 class="MyListTitle">バディ</h2>
                    <p class="MyListContent" id="ListTitle">23</p> -->
                    <!-- <label for="toggle" onclick=""  for="menuToggle">もっと見る</label>  
                    <input type="checkbox" id="toggle" autocomplete="off"> -->
                    <!-- <input type="checkbox" id="toggle" autocomplete="off">
                    <ul id="menu">  
                      <li class="MypageBuddyList">バディA</li>
                      <li class="MypageBuddyList">バディB</li>
                      <li class="MypageBuddyList">バディC</li>
                      <li class="MypageBuddyList ListMove"><a href="/userpage/{{Auth::user()->id}}">バディリスト</a></li>
                    </ul>
                    <label for="toggle" onclick=""  for="menuToggle">もっと見る</label>   -->
                    <button type="submit" class="btn">保存</button>
                </div>
                </form>
				@if(Auth::user() != $user)
				@else
				<div class="Mypage-category">
					<div class="Mypage-cat-1">
						<a class="cat-link" href=""></a>
						<div class="Mypage-cat-ai"><i class="fa-regular fa-comments"></i></div>
						<div class="Mypage-cat-co">
							<h4 class="Mypage-cat-t">CATEGORY</h4>
							<p class="Mypage-cat-p">カテゴリー</p>
						</div>
					</div>
					<div class="Mypage-cat-1">
						<a class="cat-link" href="/userpage/{{Auth::user()->id}}/edit"></a>
						<div class="Mypage-cat-ai"><i class="fa-solid fa-pencil"></i></div>
						<div class="Mypage-cat-co">
							<h4 class="Mypage-cat-t">EDIT</h4>
							<p class="Mypage-cat-p">プロフィール編集</p>
						</div>
					</div>
					<div class="Mypage-cat-1">
						<a class="cat-link" href=""></a>
						<div class="Mypage-cat-ai"><i class="fa-regular fa-handshake"></i></div>
						<div class="Mypage-cat-co">
							<h4 class="Mypage-cat-t">BUDDY</h4>
							<p class="Mypage-cat-p">バディリスト</p>
						</div>
					</div>
				</div>
				<div class="Mypage-category">
					<div class="Mypage-cat-1">
						<a class="cat-link" href=""></a>
						<div class="Mypage-cat-ai"><i class="fa-solid fa-question"></i></div>
						<div class="Mypage-cat-co">
							<h4 class="Mypage-cat-t">HELP</h4>
							<p class="Mypage-cat-p">ヘルプ</p>
						</div>
					</div>
					<div class="Mypage-cat-1">
						<a class="cat-link" href="/contact"></a>
						<div class="Mypage-cat-ai"><i class="fa-regular fa-envelope"></i></div>
						<div class="Mypage-cat-co">
							<h4 class="Mypage-cat-t">CONTACT</h4>
							<p class="Mypage-cat-p">問い合わせ</p>
						</div>
					</div>
					<div class="Mypage-cat-1">
						<a class="cat-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
						<div class="Mypage-cat-ai"><i class="fa-solid fa-right-from-bracket"></i></div>
						<div class="Mypage-cat-co">
							<h4 class="Mypage-cat-t">LOGOUT</h4>
							<p class="Mypage-cat-p">ログアウト</p>
						</div>
					</div>
				</div>
				@endif
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


	</body>
</html>

