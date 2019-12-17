@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Register</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="" class="label">Name</label>
                    <div class="control">
                        <input type="text" name="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}"
                            value="{{ old('name') }}" placeholder="Enter your name" required>

                        @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>

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
                    <label for="" class="label">Confirm Password</label>
                    <div class="control">
                        <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}"
                            value="{{ old('password_confirmation') }}" placeholder="Confirm your password" required>

                        @if ($errors->has('password_confirmation'))
                        <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Address</label>
                    <div class="control">
                        <input type="text" name="address" class="input {{ $errors->has('address') ? ' is-danger' : '' }}"
                            value="{{ old('address') }}" placeholder="Enter your address" required>

                        @if ($errors->has('address'))
                        <p class="help is-danger">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Phone</label>
                    <div class="control">
                        <input type="text" name="phone" class="input {{ $errors->has('phone') ? ' is-danger' : '' }}"
                            value="{{ old('phone') }}" placeholder="Enter your phone" required>

                        @if ($errors->has('phone'))
                        <p class="help is-danger">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="button is-info">
                            Register
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@endsection
