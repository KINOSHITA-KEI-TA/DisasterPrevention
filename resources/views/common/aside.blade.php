<aside id="fh5co-aside" role="complementary" class="border js-fullheight">
    <h1 id="fh5co-logo"><a href="/">Disaster<br>Prevention</a></h1>
    <nav id="fh5co-main-menu" role="navigation">
        <ul>
            <li class="fh5co-active"><a href="/">ホーム</a></li>
            <li><a href="/mypage">マイページ</a></li>
            <li><a href="/category">カテゴリー</a></li>
            <li><a href="/buddy">バディ</a></li>
            <li><a href="/contact">dm</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </nav>
    <div class="fh5co-footer">
        <p><small>&copy; 2016 Blend Free HTML5. All Rights Reserved. <br>Designed by<br>http://freehtml5.co/ FreeHTML5.co <br>Demo Images: https://unsplash.com/ Unsplash</small></p>
        <ul>
            <li><a href="#"><i class="icon-facebook2"></i></a></li>
            <li><a href="#"><i class="icon-twitter2"></i></a></li>
            <li><a href="#"><i class="icon-instagram"></i></a></li>
        </ul>
    </div>
</aside>