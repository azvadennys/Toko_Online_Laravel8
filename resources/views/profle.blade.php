@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Profile') }}</div>

                <div class="card-body">
                    <div class="row   ">
                        <div class="mb-2">
                            <label for="name" class="form-label">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label">{{ __('Email') }}</label>

                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ auth()->user()->email }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label">{{ __('Gender') }}</label>

                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ auth()->user()->gander }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label">{{ __('Date Of Birth') }}</label>

                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ auth()->user()->birth }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="name" class="form-label">{{ __('Country') }}</label>

                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ auth()->user()->country }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection