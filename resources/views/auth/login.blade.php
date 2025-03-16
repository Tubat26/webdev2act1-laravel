@extends('base')
@section('title', 'Login')

<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                        <h3 class="mb-0">Login</h3>
                    </div>
                    
                    <div class="card-body p-4">
                        @if(Session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if(Session('fail'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('fail') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        <form method="post" action="{{ route('auth.login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control form-control-lg rounded-3" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control form-control-lg rounded-3" id="password" name="password" placeholder="Enter password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-2 rounded-3">Login</button>
                        </form>
                        
                        <div class="text-center mt-3">
                            <a href="{{ route('auth.register') }}" class="text-decoration-none">Don't have an account? <strong>Register</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
