@extends('layouts.app')

@section('content')

<h2>The New Detail</h2>

<div class="singlepost_area">
        <div class="singlepost_content"> 
            <span class="stuff_date">{{ $news->created_at->format('d M')}} <strong>{{ $news->created_at->format('y')}}</strong></span>
            <h2>{{ $news->title }}</h2>
            <img class="img-center" src="{{ asset('storage/' . $news->image) }}" alt="Image Not Found">
            <p> {!! nl2br($news->description) !!} </p>


            
            <div class="social_area wow fadeInLeft">
                <ul>
                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                </ul>
            </div>

            <div class="author"> <a href="#"><img src="../images/100x100.jpg" alt=""></a>
                <div class="author_details">
                    <h3><a href="#">{{ $news->user->name }}</a></h3>
                    <p>Published Time : {{ $news->created_at->format('d M y H:i:s') }} </p>
                </div>
            </div>

        </div>
    </div>


@endsection