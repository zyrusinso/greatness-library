@extends('admin.authentication.master')

@section('title')Sign Up
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
@endpush

@section('content')
    <section>
	    <div class="container-fluid p-0">
	        <div class="row m-0">
	            <div class="col-12 p-0">
	                <div class="login-card">
	                    <form class="theme-form login-form" method="POST" action="{{ route('register') }}">
                        @csrf

	                        <div class="text-center">
								<h4>Create your account</h4>
	                        	<h6>Enter your personal details to create account</h6>
							</div>
	                        <div class="form-group">
	                            <label>Your Name</label>
	                            <div class="small-group">
	                                <div class="input-group">
	                                    <span class="input-group-text"><i class="icon-user"></i></span>
	                                    <input class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" value="{{ old('fname') }}" placeholder="Fist Name" />
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
	                                </div>
	                                <div class="input-group">
	                                    <span class="input-group-text"><i class="icon-user"></i></span>
	                                    <input class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" value="{{ old('lname') }}" placeholder="Last Name" />
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Email Address</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-email"></i></span>
	                                <input class="form-control @error('email') is-invalid @enderror" type="email " name="email" value="{{ old('email') }}" placeholder="Test@gmail.com" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="*********" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Confirm Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control" type="password" name="password_confirmation" placeholder="*********" />
	                            </div>
	                        </div>

							<div class="form-group">
								<div class="checkbox">
									<input id="checkbox1" type="checkbox" name="terms">
									<label class="text-muted" for="checkbox1">Agree with <a href="{{ route('privacy-terms') }}">Privacy and Terms</a></label>
									@error('terms')
										<div class="invalid-feedback" style="display: block !important">{{ $message }}</div>
									@enderror
								</div>
							</div>

	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
	                        </div>
	                        <div class="login-social-title">
	                            <h5>Authentication</h5>
	                        </div>
	                        <p>Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>


    @push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    @endpush

@endsection