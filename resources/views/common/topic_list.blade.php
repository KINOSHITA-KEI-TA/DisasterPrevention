<aside id="fh5co-aside" role="complementary" class="border js-fullheight">
    <h1 id="fh5co-logo"><a href="/">Disaster<br>Prevention</a></h1>
    <nav id="fh5co-main-menu" role="navigation">
        <ul>
            <li class="fh5co-active">
            @foreach($category->topics as $topic)
                <li class="fh5co-active">
                    <a href="{{ url('/topic/'.$topic->id.'/topic_message') }}">{{$topic->topic}}</a></li>
                </li>
            @endforeach
        </ul>
    </nav>

</aside>