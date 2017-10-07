@extends('layouts.app')

@section('content')
        <h2>New News</h2>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('news.store')}}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Title <span class="text-danger">*</span></label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="" required autofocus  maxlength="255">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="title" class="col-md-2 control-label">Image</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control" name="image" value="">
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-2 control-label">News Body <span class="text-danger">*</span></label>

                <div class="col-md-6">
                    <textarea class="form-control" rows="15" name="description" id="description" required></textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Publish
                    </button>
                </div>
            </div>
        </form>
                
@endsection
