@extends('front.layout.master')

@section('title', 'Register')

@section('body')
    <!-- Main Register Start  -->
<div class="beacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                    <a href="register.html">Đăng Ký</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registers Login Main -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>

                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('notification')}}    
                        </div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="name">Name *</label>
                                <input type="text" id="name" name="name">
                            </div>
                            <div class="group-input">
                                <label for="email">Email address *</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="password">Password *</label>
                                <input type="password" id="password" name="password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password</label>
                                <input type="password" id="pass" name="password_confirmation">
                            </div>
                         
                            <button type="submit" class="site-btn register-btn">Đăng Ký</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login.html" class="or-login">Hoặc Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection