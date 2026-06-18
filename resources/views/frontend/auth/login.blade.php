@extends('frontend.layouts.app')
@section('title', 'Login')
@section('content')

    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">

                <div class="auth-logo">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
                </div>

                <h2 class="auth-title">Welcome Back</h2>
                <p class="auth-subtitle">Login to your account</p>

                @if (session('success'))
                    <div class="alert-custom alert-success-custom">{{ session('success') }}</div>
                @endif

                <form action="{{ route('user.login.post') }}" method="POST">
                    @csrf

                    <div class="auth-field">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com"
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Password</label>
                        <div class="password-wrap">
                            <input type="password" name="password" id="loginPassword" placeholder="••••••••"
                                class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
                            <button type="button" class="toggle-pass" onclick="togglePass('loginPassword', this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-remember">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>

                    <button type="submit" class="auth-btn">Login</button>

                </form>

                <p class="auth-switch">
                    Don't have an account? <a href="{{ route('user.register') }}">Sign up</a>
                </p>

            </div>
        </div>
    </section>

@endsection
