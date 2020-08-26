@extends('layouts.dashboard')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/change-password.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
@endsection
@section('content')
    <div class="main">
        @include('partials.admin-topbar')
        <div class="content">
            <div class="navigation">
                <a class="category" href="{{url('settings')}}">
                    <svg id="ios-person" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                         fill="#9b9b9b">
                        <path id="Path"
                              d="M19.99,19.495c-.375-1.656-2.516-2.464-3.255-2.724a24.272,24.272,0,0,0-2.714-.521,2.757,2.757,0,0,1-1.255-.578,10.97,10.97,0,0,1-.083-2.568,7.725,7.725,0,0,0,.594-1.13A14.577,14.577,0,0,0,13.714,10s.427,0,.578-.75a7.379,7.379,0,0,0,.385-1.745c-.031-.6-.359-.583-.359-.583a9.131,9.131,0,0,0,.354-2.672C14.719,2.109,13.042,0,10.005,0,6.927,0,5.286,2.109,5.333,4.25a9.525,9.525,0,0,0,.349,2.672s-.328-.016-.359.583A7.379,7.379,0,0,0,5.708,9.25c.146.75.578.75.578.75a14.577,14.577,0,0,0,.438,1.974,7.725,7.725,0,0,0,.594,1.13,10.97,10.97,0,0,1-.083,2.568,2.757,2.757,0,0,1-1.255.578,24.272,24.272,0,0,0-2.714.521c-.74.26-2.88,1.068-3.255,2.724A.416.416,0,0,0,.421,20H19.584A.415.415,0,0,0,19.99,19.495Z"/>
                    </svg>
                    <div class="category__content">
                        <p>
                            Your profile
                        </p>
                        <p>
                            Details about your Personal Information
                        </p>
                    </div>
                </a>
                <a class="category active" href="{{url('settings/password')}}">
                    <svg id="ios-key" xmlns="http://www.w3.org/2000/svg" width="19.954" height="20"
                         viewBox="0 0 19.954 20" fill="#502274">
                        <path id="Shape"
                              d="M14.246,20a5.85,5.85,0,0,1-5.717-5.962,5.456,5.456,0,0,1,.451-2.293c-.048-.077-.106-.157-.167-.242a1.829,1.829,0,0,1-.332-.594,2.517,2.517,0,0,1,.142-.712,2.512,2.512,0,0,0,.142-.711.991.991,0,0,0-.527-.548.445.445,0,0,0-.1-.01,1.846,1.846,0,0,0-.71.24L7.366,9.2a1.635,1.635,0,0,1-.557.209.215.215,0,0,1-.044,0A1.822,1.822,0,0,1,5.729,8.245,1.324,1.324,0,0,1,5.915,7.6c.161-.347.328-.706.053-.987a.528.528,0,0,0-.393-.173,1.423,1.423,0,0,0-.546.162l-.02.009a1.316,1.316,0,0,1-.492.152H4.51a1.01,1.01,0,0,1-.748-.419,1.21,1.21,0,0,1-.442-.913A2.964,2.964,0,0,1,3.4,4.884a1.659,1.659,0,0,0,.062-.6.708.708,0,0,0-.5-.6.489.489,0,0,0-.193-.032,2.7,2.7,0,0,0-.432.054l-.03.005a3.065,3.065,0,0,1-.516.059.733.733,0,0,1-.555-.2c-.11-.112-.206-.2-.318-.309C.727,3.082.485,2.852.031,2.385A.125.125,0,0,1,0,2.292C.009,1.9,1.085.738,1.373.462A1.591,1.591,0,0,1,2.395,0a.968.968,0,0,1,.719.322C3.575.8,9.249,5.648,11.975,7.976l.467.4a5.382,5.382,0,0,1,1.794-.2,5.625,5.625,0,0,1,4.042,1.7,5.9,5.9,0,0,1,1.675,4.165A5.845,5.845,0,0,1,14.246,20Zm1.1-6.153a1.538,1.538,0,1,0,1.535,1.538A1.538,1.538,0,0,0,15.35,13.846Z"/>
                    </svg>
                    <div class="category__content">
                        <p>
                            Change Password
                        </p>
                        <p>
                            Change your Account Password
                        </p>
                    </div>
                </a>
            </div>
            <div class="content__form">
                <p class="content__form__header">
                    Change Password
                </p>
                <p class="content__form__subtext">
                    Details about your Personal Information
                </p>
                <form method="post" action="{{url('settings/password')}}">
                    @csrf
                    <div class="form-group">
                        <label for="old-password">Old Password</label>
                        <div class="password-div">
                            <input type="password" name="old_password" id="old-password" required>
                            <button type="button"><img src="{{asset('assets/images/eye.svg')}}"></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <div class="password-div">
                            <input type="password" name="password" id="new-password" required>
                            <button type="button"><img src="{{asset('assets/images/eye.svg')}}"></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm-new-password">Confirm New Password</label>
                        <div class="password-div">
                            <input type="password" name="password_confirmation" id="confirm-new-password" required>
                            <button type="button"><img src="{{asset('assets/images/eye.svg')}}"></button>
                        </div>
                    </div>
                    <button type="submit">Update</button>
                </form>
                <div class="page-links">
                    <button class="link-toggle">
                        <img src="../assets/images/add-straight.svg" alt="">
                    </button>
                    <a href="{{url('settings')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path id="Path"
                                  d="M19.99,19.495c-.375-1.656-2.516-2.464-3.255-2.724a24.272,24.272,0,0,0-2.714-.521,2.757,2.757,0,0,1-1.255-.578,10.97,10.97,0,0,1-.083-2.568,7.725,7.725,0,0,0,.594-1.13A14.577,14.577,0,0,0,13.714,10s.427,0,.578-.75a7.379,7.379,0,0,0,.385-1.745c-.031-.6-.359-.583-.359-.583a9.131,9.131,0,0,0,.354-2.672C14.719,2.109,13.042,0,10.005,0,6.927,0,5.286,2.109,5.333,4.25a9.525,9.525,0,0,0,.349,2.672s-.328-.016-.359.583A7.379,7.379,0,0,0,5.708,9.25c.146.75.578.75.578.75a14.577,14.577,0,0,0,.438,1.974,7.725,7.725,0,0,0,.594,1.13,10.97,10.97,0,0,1-.083,2.568,2.757,2.757,0,0,1-1.255.578,24.272,24.272,0,0,0-2.714.521c-.74.26-2.88,1.068-3.255,2.724A.416.416,0,0,0,.421,20H19.584A.415.415,0,0,0,19.99,19.495Z"
                                  fill="#fff"/>
                        </svg>
                    </a>
                    <a href="{{url('settings/password')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.954" height="20" viewBox="0 0 19.954 20"
                             fill="#fff">
                            <path id="Shape"
                                  d="M14.246,20a5.85,5.85,0,0,1-5.717-5.962,5.456,5.456,0,0,1,.451-2.293c-.048-.077-.106-.157-.167-.242a1.829,1.829,0,0,1-.332-.594,2.517,2.517,0,0,1,.142-.712,2.512,2.512,0,0,0,.142-.711.991.991,0,0,0-.527-.548.445.445,0,0,0-.1-.01,1.846,1.846,0,0,0-.71.24L7.366,9.2a1.635,1.635,0,0,1-.557.209.215.215,0,0,1-.044,0A1.822,1.822,0,0,1,5.729,8.245,1.324,1.324,0,0,1,5.915,7.6c.161-.347.328-.706.053-.987a.528.528,0,0,0-.393-.173,1.423,1.423,0,0,0-.546.162l-.02.009a1.316,1.316,0,0,1-.492.152H4.51a1.01,1.01,0,0,1-.748-.419,1.21,1.21,0,0,1-.442-.913A2.964,2.964,0,0,1,3.4,4.884a1.659,1.659,0,0,0,.062-.6.708.708,0,0,0-.5-.6.489.489,0,0,0-.193-.032,2.7,2.7,0,0,0-.432.054l-.03.005a3.065,3.065,0,0,1-.516.059.733.733,0,0,1-.555-.2c-.11-.112-.206-.2-.318-.309C.727,3.082.485,2.852.031,2.385A.125.125,0,0,1,0,2.292C.009,1.9,1.085.738,1.373.462A1.591,1.591,0,0,1,2.395,0a.968.968,0,0,1,.719.322C3.575.8,9.249,5.648,11.975,7.976l.467.4a5.382,5.382,0,0,1,1.794-.2,5.625,5.625,0,0,1,4.042,1.7,5.9,5.9,0,0,1,1.675,4.165A5.845,5.845,0,0,1,14.246,20Zm1.1-6.153a1.538,1.538,0,1,0,1.535,1.538A1.538,1.538,0,0,0,15.35,13.846Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            @include('partials.bottom-rate2')
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{asset('assets/js/signup.js')}}"></script>
    <script src="{{asset('assets/js/sidenav.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/Required-inputs.js')}}"></script>
@stop

