@extends('layouts.backend.master')

@section('css')
<link href="{{ asset('backend/img/brand/favicon.png') }}" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="{{ asset('backend/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<!-- Argon CSS -->
<link type="text/css" href="{{ asset('backend/css/argon.css?v=1.0.0') }}" rel="stylesheet">

<!-- Admin custom CSS -->
<link type="text/css" href="/css/admin_custom.css?v=1.0.0" rel="stylesheet">
@endsection


@section('content')
    @include('admin.partials' ,[
        'title' => 'Hello' , 
        'description' => 'This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks',
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#"><img src="{{ asset('backend/img/theme/team-4-800x800.jpg') }}" class="rounded-circle"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>

                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>

                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Photos</span>
                                    </div>

                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Comments</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->email }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i>Bucharest, Romania </div>
                            <div class="h5 mt-4"><i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer </div>
                            <div><i class="ni education_hat mr-2"></i>University of Computer Science</div>
                            <hr class="my-4" />
                            <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                            <a href="#">Show more</a>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">Edit Profile</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">User information</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>

                        </form>
                        <hr class="my-4" />

                        <form method="post" action="" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">password</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">Current Password</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="Current Password" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">New Password</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm New Password" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Change password</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('j.s')

<script src="{{ asset('backend') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('backend') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Argon JS -->
{{-- <script src="{{ asset('backend') }}/js/argon.js?v=1.0.0"></script> --}}
@endsection
