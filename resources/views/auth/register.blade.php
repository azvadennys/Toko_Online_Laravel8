@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender')
                                }}</label>

                            <div class="col-md-6 @error('gander') is-invalid @enderror">
                                <div class="form-check">
                                    <input class="form-check-input mr-3" name="gander" id="radio1" type="radio"
                                        value="Male" @if(old("gander")=='Male' ) checked @endif>
                                    <label class="form-check-label" for="radio1">
                                        Male</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input mr-3" name="gander" id="radio2" type="radio"
                                        value="Female" @if(old("gander")=='Female' ) checked @endif>
                                    <label class="form-check-label" for="radio2">
                                        Female</label>
                                </div>
                                @error('gander')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="birth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth')
                                }}</label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control @error('birth') is-invalid @enderror"
                                    name="birth" value="{{ old('birth') }}" max="<?= date('Y-m-d'); ?>" required
                                    autocomplete=" birth" autofocus>

                                @error('birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country')
                                }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('country') is-invalid @enderror" name="country"
                                    id="country" aria-label="Default select example" required>
                                    <option selected disabled>Choose a country</option>
                                    @foreach ($country as $index)

                                    <option value="{{ $index }}" @if(old("country")=='{{ $index }}' ) selected @endif>{{
                                        $index }}</option>
                                    @endforeach
                                </select>

                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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