@extends('auth.layouts.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Change Password</b>
        </div>
        <div class="card-body login-box-body">
            <form method="POST" action="{{ route('admin.change_password') }}">
                @csrf

                <input type="hidden" name="verify_token" value="{{ $verify_token }}">
                <div class="form-group has-feedback">
                    <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>
                    <input class="form-control" placeholder="password address" name="password" type="password" autocomplete="off" autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <label for="confirm-password" class="col-md-6 col-form-label">{{ __('Confirm Password') }}</label>
                    <input class="form-control" type="password" placeholder="confirm-password" name="confirm-password" type="confirm-password" autocomplete="off" autofocus>
                    @error('confirm-password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save New Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
@endpush