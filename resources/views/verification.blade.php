@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Email Verificaion</div>

                <div class="panel-body">
                    {{-- If user has already verified his account show him login link --}}
                    @if ( $user->verification_status == '1')
                        <div class="alert alert-info">
                            Your account is already verified. Please <a href="{{ route('login') }}">Click Here</a> to Login.
                        </div>
                    @else
                        <p>Hello {{$user->name}},</p>
                        <p>You are just one step away to start publishing news with us. Please set password for your account.</p>
                            <form class="form-horizontal" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Verify Account
                                        </button>
                                    </div>
                                </div>
                            </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
