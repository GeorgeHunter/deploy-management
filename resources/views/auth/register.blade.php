@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-8 section">
            <div class="panel">
                <div class="panel-heading">Register</div>

                <div class="panel-block">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="input" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="password-confirm" class="label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button is-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
