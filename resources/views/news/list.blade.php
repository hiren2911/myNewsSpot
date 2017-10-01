@extends('layouts.app')

@section('content')

<h2>{{ $mylist ? 'My Posts' : 'The New Stuff' }}</h2>

    @foreach ($news_list as $news)
    @include('news.summary')
    @endforeach
                
@endsection
