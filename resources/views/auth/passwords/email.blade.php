
@extends('layouts.master')
    @section('title', 'BOX')
        
        @section('header')
        <h1>BOX</h1>
        @stop

        @section('content') 

            @include('partials.nav')
            <div class="login-section">
    <div class="container">
    

    <div class="omb_login">
     <h3 class="omb_authTitle">Reset Password</h3>
        <div class="row omb_row-sm-offset-3 omb_socialButtons">
             
        </div> 
             <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                <div class="panel-body">
                       <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div> 

        </div>
    </div>

        @stop

