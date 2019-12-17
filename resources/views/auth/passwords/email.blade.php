@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <h1 class="is-size-3">Reset Password</h1>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field">
                    <label for="" class="label">Email</label>
                    <div class="control">
                        <input type="text" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                        value="{{ old('email') }}" placeholder="Enter an email address" required>

                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <button type="submit" class="button is-info">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
