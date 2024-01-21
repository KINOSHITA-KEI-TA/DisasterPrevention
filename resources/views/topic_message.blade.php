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
	<!-- <link rel="shortcut icon" href="favicon.ico"> -->

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
	<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
    @extends('common.topic_list')
	@section('back_link')
		<a href="{{ url('/category') }}" class="text-muted"><i class="fas fa-chevron-left"></i> カテゴリ選択へ戻る</a>
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
		<label class="switch">
			<input id="one" type="checkbox" {{ $userDisplay['display_flg'] ? 'checked' : '' }}>
			<span class="slider"></span>
		</label>
	</div>
    <div id="fh5co-main">
		<aside id="fh5co-hero" class="js-fullheight topic_message_main">
			<div class="row justify-content-center animate-box">
				<div class="container mt-4">
					<div class="row">
						<div class="col-12">
							<div id="message-board">
								<div id="board"class="messege_area">
									@foreach($topic_messages->messages as $post)
									<div class="message-container" data-message-id="{{ $post->id }}" id="message-{{ $post->id }}">
										@if ($post->replyTo && $post->replyTo->originalMessage)
											<div class="reply-info d-flex align-items-center ml-4" data-reply-to="{{ $post->replyTo->originalMessage->id }}">
												<div class="reply-username">{{ $post->replyTo->originalMessage->user->name }}</div>
												@if($post->replyTo->originalMessage->trashed())
													<div class="reply-message pl-2">削除されたメッセージ</div>
												@else
													<div class="reply-message pl-2">{{ $post->replyTo->originalMessage->message }}</div>
												@endif
											</div>
										@endif
										<div class="d-flex align-items-center">
											<div class="username">{{ $post->user->name }}</div>
											<div class="post-date ml-2">{{ $post->created_at->format('Y/m/d') }}</div>
										</div>
										<div class="message">
											@if($post->trashed())
											<div class="originalMessage">
												削除されたメッセージ
											</div>
											@else
												<div class="originalMessage">
													{{ $post->message }}
												</div>
												@if($post->images)
													<div class="post-images">
														@foreach($post->images as $image)
															<img src="{{ $image->image_url }}" alt="Message Image" class="responsive-image">
														@endforeach
													</div>
												@endif
												<div class="emoji-icon" data-target="#emoji-tool-{{ $post->id }}">
													<i>&#9786;</i>
												</div>
												<div class="emoji-tool" id="emoji-tool-{{ $post->id }}"></div>
												<div class="reply-icon">
													<i class="fas fa-reply"></i>
												</div>
												@if($post->user_id == Auth::id())
												<form class="trash-icon" action="/message/{{ $category->id }}/{{ $post->id }}/delete" method="POST">
													@csrf
													<button type="submit" style="border: none; background: none;">
														<i class="fas fa-trash-alt"></i>
													</button>
												</form>
												@endif
												<div class="emojiReactionContent">
													@foreach($post->emojiMessages as $emojiMessage)
														@if($emojiMessage->emoji)
														<div class="emoji-reaction @if(auth()->user()->id == $emojiMessage->user->id) self-emoji-reaction @endif" style="left: {{ 20 + $loop->index * 17 }}px;">
														<span class="tooltip-text">{{$emojiMessage->user->name}}</span>
															{!! $emojiMessage->emoji->decimal_code !!}
														</div>
														@endif
													@endforeach
												</div>
											@endif
										</div>
									</div>
									@endforeach
								</div>
							</div>
							<div id="alternative-content">
								@foreach($topic_messages->messages as $post)
								@if (!$post->replyTo)
								<div class="message-container" data-message-id="{{ $post->id }}" id="message-{{ $post->id }}">
									<div class="d-flex align-items-center">
										<div class="username">{{ $post->user->name }}</div>
										<div class="post-date ml-2">{{ $post->created_at->format('Y/m/d') }}</div>
									</div>
									<div class="message">
										@if($post->trashed())
											削除されたメッセージ
										@else
											<div class="originalMessage">
												{{ $post->message }}
											</div>
											@if($post->images)
												<div class="post-images">
													@foreach($post->images as $image)
														<img src="{{ $image->image_url }}" alt="Message Image" class="responsive-image clickable-image">
													@endforeach
												</div>
											@endif

											<div class="emoji-icon" data-target="#emoji-tool2-{{ $post->id }}">
												<i>&#9786;</i>
											</div>
											<div class="emoji-tool2" id="emoji-tool2-{{ $post->id }}"></div>
											<div class="reply-icon">
												<i class="fas fa-reply"></i>
											</div>
											@if($post->user_id == Auth::id())
											<form class="trash-icon" action="/message/{{ $category->id }}/{{ $post->id }}/delete" method="POST">
												@csrf
												<button type="submit" style="border: none; background: none;">
													<i class="fas fa-trash-alt"></i>
												</button>
											</form>
											@endif
											@foreach($post->emojiMessages as $emojiMessage)
												@if($emojiMessage->emoji)
												<div class="emoji-reaction @if(auth()->user()->id == $emojiMessage->user->id) self-emoji-reaction @endif" style="left: {{ 20 + $loop->index * 17 }}px;">
												<span class="tooltip-text">{{$emojiMessage->user->name}}</span>
													{!! $emojiMessage->emoji->decimal_code !!}
												</div>
												@endif
											@endforeach
										@endif
									</div>
									@if ($post->replyMessages->count() > 0 && !$post->replyTo)
										<a href="#" class="replies-count text-primary" style="cursor: pointer;" data-original-message-id="{{ $post->id }}">
											{{ $post->replyMessages->count() }}件の返信
										</a>
									@endif
								</div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</aside>
	</div>
	<div id="replies-window" style="display: none; position: fixed; top: 0; right: -80%; width: 80%; height: 100%; background-color: white; overflow-y: scroll; padding: 20px; border-left: 1px solid #ccc; z-index: 10000;">
		<div id="replies-container" style="overflow-y: scroll; height: calc(100% - 60px);">
			<!-- 内容はjsで追加 -->
		</div>
		<div class="close-replies-window" style="position: absolute; top: -5px; right: 50px; font-size: 45px; cursor: pointer;">&times;</div>
		<div class= "message_text d-flex justify-content-center" style="padding: 0px 10px 0px 10px; position: absolute; bottom: 20px; left: 0; right: 0;">
			<input type="hidden" name="topic_id" value="{{ $id }}">
			<input type="hidden" id="current-user-id" value="{{ Auth::id() }}">
			<div class="form-control replies-editable-container" style="min-height: 54px; overflow: auto;">
				<div id="text1" class="editable-text" contenteditable="true" onfocus="this.parentNode.style.borderColor='#228896'" onblur="this.parentNode.style.borderColor=''"></div>
				<div id="replies-image-container"></div>
			</div>
			<input type="file" name="image[]" id="replies-image" class="form-control" accept="image/*" style="display: none;" multiple>
			<div class="btn-container">
				<button id="repliesUploadButton" type="button" class="btn btn-primary btn-category-form"><i class="fas fa-paperclip d-flex align-items-center"></i></button>
				<button id="repliesSubmit" type="submit" class="btn btn-primary btn-category-form"><i class="fas fa-paper-plane d-flex align-items-center"></i></button>
			</div>
		</div>
	</div>


	<aside class="sticky-bottom-form">
			<div class="text-center">
				<div id="replying-to" class="replying-to-message d-none">
					<span class="replying-text"></span>
					<a href="#" class="cancel-reply" style="text-decoration: none;">
						<i class="fas pl-5 fa-times"></i>キャンセル
					</a>
				</div>
			</div>
			<div class="message_text d-flex justify-content-center">
				<input type="hidden" name="topic_id" value="{{ $id }}">
				<input type="hidden" id="current-user-id" value="{{ Auth::id() }}">
				<div class="form-control editable-container" style="min-height: 54px; overflow: auto;">
					<div id="text2" class="editable-text" contenteditable="true" onfocus="this.parentNode.style.borderColor='#228896'" onblur="this.parentNode.style.borderColor=''"></div>
					<div id="image-container"></div>
				</div>
				<input type="file" name="image[]" id="main-image" class="form-control" accept="image/*" style="display: none;" multiple>
				<div class="btn-container">
					<button id="uploadButton" type="button" class="btn btn-primary btn-category-form"><i class="fas fa-paperclip d-flex align-items-center"></i></button>
					<button id="messageSubmit" type="submit" class="btn btn-primary btn-category-form"><i class="fas fa-paper-plane d-flex align-items-center"></i></button>
				</div>
			</div>
	</aside>
	<script>
		var csrfToken = "{{ csrf_token() }}";
		var currentUser = {{ Auth::id() }};
	</script>
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
