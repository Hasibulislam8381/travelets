@extends('frontend.layouts.app')
@section('title', 'Register')
@section('content')

    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">

                <div class="auth-logo">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
                </div>

                <h2 class="auth-title">Create Account</h2>
                <p class="auth-subtitle">Join our women's community</p>

                <form action="{{ route('user.register.post') }}" method="POST">
                    @csrf

                    <div class="auth-field">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Your full name"
                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                        @error('name')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com"
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="01XXXXXXXXX"
                            class="{{ $errors->has('phone') ? 'is-invalid' : '' }}">
                        @error('phone')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" placeholder="Your address"
                            class="{{ $errors->has('address') ? 'is-invalid' : '' }}">
                        @error('address')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Password</label>
                        <div class="password-wrap">
                            <input type="password" name="password" id="regPassword" placeholder="Min. 6 characters"
                                class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
                            <button type="button" class="toggle-pass" onclick="togglePass('regPassword', this)">
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

                    <div class="auth-field">
                        <label>Confirm Password</label>
                        <div class="password-wrap">
                            <input type="password" name="password_confirmation" id="regPasswordConfirm"
                                placeholder="Repeat password">
                            <button type="button" class="toggle-pass" onclick="togglePass('regPasswordConfirm', this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="auth-field auth-terms">
                        <label>
                            <input type="checkbox" name="agree_to_terms" value="1"
                                {{ old('agree_to_terms') ? 'checked' : '' }}>
                            I agree to the <a href="#">Terms & Conditions</a>
                        </label>
                        @error('agree_to_terms')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="auth-btn">Create Account</button>

                </form>

                <p class="auth-switch">
                    Already have an account? <a href="{{ route('user.login') }}">Login</a>
                </p>

            </div>
        </div>
    </section>

@endsection
