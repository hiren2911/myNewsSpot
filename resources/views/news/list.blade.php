@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">News List</div>

                <div class="panel-body">
                  @foreach ($news_list as $news)
                  <div class="col-md-3">
                    <p>{{ $news->title }}</p>
                    <p>{{$news->description }}</p>
                  </div>
                   
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
