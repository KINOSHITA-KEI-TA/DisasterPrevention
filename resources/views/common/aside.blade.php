<aside id="fh5co-aside" role="complementary" class="border js-fullheight">
    <h1 id="fh5co-logo"><a href="/home">Disaster<br>Prevention</a></h1>
    <nav id="fh5co-main-menu" role="navigation">
        <ul>
            <li class="fh5co-active"><a href="/home">ホーム</a></li>
            @if(Auth::check())
            <li><a href="/userpage/{{Auth::user()->id}}">マイページ</a></li>
            @endif
            <li><a href="/category">カテゴリー</a></li>
            <li><a href="/buddy">バディ</a></li>
            <li><a href="/contact">dm</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('ログイン/新規登録') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @switch(Request::path())
            @case('category')
                <form class="category-select-form animate-box">
                    {{ csrf_field() }}
                    <div class="d-flex align-items-center justify-content-center">
                        <select id="inputTag" name="CategoryName" class="form-select category-select-input ">
                            <option selected value="">ジャンル</option>
                            @foreach ($genre as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->category_tag_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                @break
            @case('about')
                <p></p>
                @break
            @endswitch
        </ul>
    </nav>
    <div class="fh5co-footer">
        <p><small>&copy; 2016 Blend Free HTML5. All Rights Reserved. <br>Designed by<br>http://freehtml5.co/ FreeHTML5.co </small></p>
        <ul>
            <li><a href="https://twitter.com/DisasterPreven5"><i class="icon-twitter2"></i></a></li>
        </ul>
    </div>
</aside>