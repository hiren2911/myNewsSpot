@extends('layouts.app')

@section('content')

<h2>The New Detail</h2>

<div class="singlepost_area">
        <div class="singlepost_content"> 
            <span class="stuff_date">{{ $news->created_at->format('d M')}} <strong>{{ $news->created_at->format('y')}}</strong></span>
            <h2>{{ $news->title }}
                <span class="pull-right">
                    <a href="{{route('printnews', $news->id)}}" title="Download Artical in PDF format" target="_blank"><i class="fa fa-print"></i></a>
                </span>
            </h2>
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

            <div class="author"> 
                <div class="row">   
                    <div class="col-sm-1 author_icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="col-sm-10">
                        <div class="author_details">
                            <h3>Author: {{ $news->user->name }}</h3>
                            <h4>Email: {{ $news->user->email }}</h4>
                            <p>Published Time : {{ $news->created_at->format('d M y H:i:s') }} </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection