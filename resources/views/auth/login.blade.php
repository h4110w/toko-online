@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Login</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                            <label for="" class="label">Email</label>
                            <div class="control">
                                <input type="text" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                                value="{{ old('email') }}" placeholder="Enter your email" required>

                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="" class="label">Password</label>
                            <div class="control">
                                <input type="password" name="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                                value="{{ old('password') }}" placeholder="Enter your password" required>

                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>Remember Me
                            </label>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="button is-info">
                                    Login
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="button button-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
