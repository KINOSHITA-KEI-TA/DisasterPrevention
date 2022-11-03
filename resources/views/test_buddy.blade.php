@foreach($users as $user)


<h1>{{$user->name}}</h1>

<form action="{{ route('buddy_register.create') }}" method="POST">
@csrf
    <button >バディ申請</button>
</form>
@endforeach