@extends('frontend.layouts.app')
@section('title', 'My Profile')
@section('content')

    <section class="auth-section">
        <div class="auth-container" style="max-width: 600px;">
            <div class="auth-card">

                {{-- Avatar --}}
                <div class="profile-avatar-wrap">
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="profile-avatar-img">
                    @else
                        <div class="profile-avatar-placeholder">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <h2 class="auth-title">{{ $user->name }}</h2>
                <p class="auth-subtitle">{{ $user->email }}</p>

                @if (session('success'))
                    <div class="alert-custom alert-success-custom">{{ session('success') }}</div>
                @endif

                {{-- Profile Update --}}
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="auth-field">
                        <label>Profile Photo</label>
                        <input type="file" name="avatar" accept="image/*">
                        @error('avatar')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ old('address', $user->address) }}">
                        @error('address')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="auth-btn">Update Profile</button>
                </form>

                <hr style="margin: 28px 0; border-color: #f0f0f0;">

                {{-- Password Change --}}
                <h4 style="margin-bottom: 16px; font-size: 16px;">Change Password</h4>

                <form action="{{ route('user.password.update') }}" method="POST">
                    @csrf

                    <div class="auth-field">
                        <label>Current Password</label>
                        <div class="password-wrap">
                            <input type="password" name="current_password" id="curPass" placeholder="••••••••">
                            <button type="button" class="toggle-pass" onclick="togglePass('curPass', this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        @error('current_password')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="auth-field">
                        <label>New Password</label>
                        <div class="password-wrap">
                            <input type="password" name="password" id="newPass" placeholder="Min. 6 characters">
                            <button type="button" class="toggle-pass" onclick="togglePass('newPass', this)">
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
                        <label>Confirm New Password</label>
                        <div class="password-wrap">
                            <input type="password" name="password_confirmation" id="confirmPass"
                                placeholder="Repeat password">
                            <button type="button" class="toggle-pass" onclick="togglePass('confirmPass', this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="auth-btn">Change Password</button>
                </form>

            </div>
        </div>
    </section>

@endsection
