@extends('layouts.auth')

@section('title')
    Login Butterlife
@endsection

@section('content')

    <div class="page-content page-auth">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login">
                    <div class="col-lg-4">
                        <h2>Butterlife Login!</h2>
                        <form method="POST" action="{{ route('login') }}" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label>Email Adress</label>
                                <input id="email" 
                                        type="email" 
                                        class="form-control rounded-0 @error('email') is-invalid @enderror"
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required
                                        autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" 
                                        type="password" 
                                        class="form-control rounded-0 @error('password') is-invalid @enderror" 
                                        name="password"
                                        required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-dark btn-block mt-4 rounded-0">Log In</button>
                            <small class="btn btn-block" style="font-size: 13px; color: #aaa; cursor: text;">
                                 Don't have a account? <a href="{{ route('register') }}" style="text-decoration: none; color: black;">Sign Up</a>
                            </small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
