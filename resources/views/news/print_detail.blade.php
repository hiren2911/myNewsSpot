
<h2>The New Detail</h2>

<div class="singlepost_area">
        <div class="singlepost_content"> 
            <span class="stuff_date">{{ $news->created_at->format('d M')}} <strong>{{ $news->created_at->format('y')}}</strong></span>
            <h2>Title:{{ $news->title }}</h2>
            <h4>Publish Date: {{ $news->created_at->format('d M y H:i:s') }}</h4>
            <img class="img-center" src="{{ asset('storage/' . $news->image) }}" alt="Image Not Found">
            <p> {!! nl2br(strip_tags($news->description)) !!} </p>

            <div class="author"> 
                <div class="author_details">
                    <h3>Author: {{ $news->user->name }}</a></h3>
                    <p>Email : {{ $news->user->email }} </p>
                </div>
            </div>

        </div>
    </div>

