@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="is-size-2">Checkout</h1>
    <div class="columns">
        @if ($items)
        <div class="column is-8">
            <h1 class="is-size-4">Shipping Address</h1>
            <form method="POST" action="#">
                @csrf

                <div class="field">
                    <label for="" class="label">Name</label>
                    <div class="control">
                        <input type="text" name="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}"
                            value="{{ auth()->user()->name ?? old('name') }}" placeholder="Enter your name" required>

                        @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Email</label>
                    <div class="control">
                        <input type="text" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                            value="{{ auth()->user()->email ?? old('email') }}" placeholder="Enter your email" required>

                        @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Province</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="province" id="" class="{{ $errors->has('province') ? 'is-danger' : '' }}">
                                <option value="">Select a Province</option>
                                <option value="">Jawa Timur</option>
                                <option value="">Jawa Tengah</option>
                                <option value="">Jawa Barat</option>
                            </select>
                        </div>
                        @if ($errors->has('province'))
                        <p class="help is-danger">{{ $errors->first('province') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">City</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="city" id="" class="{{ $errors->has('city') ? 'is-danger' : '' }}">
                                <option value="">Select a City</option>
                                <option value="">Surabaya</option>
                                <option value="">Sidoarjo</option>
                                <option value="">Gresik</option>
                            </select>
                        </div>
                        @if ($errors->has('city'))
                        <p class="help is-danger">{{ $errors->first('city') }}</p>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Address</label>
                    <div class="control">
                        <textarea name="address" class="textarea {{ $errors->has('address') ? ' is-danger' : '' }}"
                            value="{{ old('address') }}" placeholder="Enter your address" required></textarea>

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
                            Save
                        </button>
                    </div>
                </div>
            </form>
            <h1 class="is-size-4">Shopping Cart</h1>
            @php
                $totalItems = 0;
                $totalPrice = 0;
            @endphp
            @foreach ($items as $item)
            @php
                $totalItems += $item['qty'];
                $totalPrice += $item['price'];
            @endphp
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">{{ $item['name'] }}</p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div class="columns">
                            <div class="column is-3">
                                <img src="{{ $item['image'] }}" alt="" class="image is-128x128">
                            </div>
                            <div class="coumn is-9">
                                <p>
                                    {{ $item['description'] }}
                                </p>
                                <p class="has-text-danger is-size-3">{{ format_rupiah($item['price']) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">

                </div>
            </div>
            @endforeach
        </div>
        <div class="column is-4">
            <h1 class="is-size-4">Cart Detail</h1>
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p>Total Items : {{ $totalItems }} items</p>
                        <p>Total Price : {{ format_rupiah($totalPrice) }}</p>
                        <hr>
                        <a href="" class="button is-danger is-fullwidth">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <h1 class="is-size-4">No Items in Cart</h1>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
