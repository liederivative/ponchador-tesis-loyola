@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:4em;">
            <div class="panel panel-default">
                <div class="panel-heading center">Proyecto Ponchador</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input  class="form-control" name="username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="dbs" class="col-md-4 control-label">University</label>
                                
                            <div class="col-md-6">
                               
                                <select class="form-control" name="uni" id="dbs">
                                  @foreach ($dbs as $a)
                                      @foreach ($a as $db => $name)
                                          <option value="{{$db}}">{{$name}}</option>
                                      @endforeach
                                  @endforeach
                                   <option value="mescyt_ponche">MESCYT</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

<!--
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
