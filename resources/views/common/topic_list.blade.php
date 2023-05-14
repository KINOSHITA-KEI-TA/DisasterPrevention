<aside id="fh5co-aside" role="complementary" class="border custom-aside sidebar">
    <h1 id="fh5co-logo"><a href="/home">Disaster<br>Prevention</a></h1>
    <div id="scrollable-nav">
        <nav id="fh5co-main-menu" role="navigation">
            <ul>
                @foreach($category->topics as $topic)
                    <li class="fh5co-active">
                        <a href="{{ url('/topic/topic_message/'.$category->id.'/'.$topic->id.'') }}">{{$topic->topic}}</a></li>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="back-link-wrapper">
        @yield('back_link')
    </div>
</aside>
