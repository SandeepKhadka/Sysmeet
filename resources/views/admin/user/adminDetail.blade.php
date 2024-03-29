@extends('layouts.admin')
@section('title', 'Sysmeet | Admin Profile')
@section('scripts')
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const oldPassword = document.querySelector('#oldPassword');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = oldPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            oldPassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const toggleNewPassword = document.querySelector('#toggleNewPassword');
        const newPassword = document.querySelector('#newPassword');

        toggleNewPassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            newPassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const toggleRePassword = document.querySelector('#toggleRePassword');
        const newRePassword = document.querySelector('#retypeNewPassword');

        toggleRePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = newRePassword.getAttribute('type') === 'password' ? 'text' : 'password';
            newRePassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
@section('main-content')
    <div class="content">
        {{-- <div class="col-lg-12">
            @include('admin.section.notify')
        </div> --}}
        {{-- BreadCrumb  --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="reply">Profile</li>
            </ol>
        </nav>
        <div class="container">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center font-weight-bold">Profile</small></h1>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Oh sorry!</strong>There were some issues with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('adminProfile.update', auth()->user()->id) }}" method="post" class="form"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card p-2 ">
                    <div class="content">
                        <div class="container justify-content-sm-center">
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <div class="d-flex justify-content-center">

                                                    @if (isset(auth()->user()->photo) &&
                                                            auth()->user()->photo != null &&
                                                            file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                                                        <img class="img-circle elevation-3"
                                                            src="{{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}"
                                                            alt="User profile picture">
                                                        @error('photo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    @else
                                                        <img class="profile-user-img img-circle elevation-3"
                                                            src="{{ asset('dist/img/defaultUser.png') }}"
                                                            alt="User profile picture">
                                                    @endif
                                                </div>
                                                <input id="image" style="visibility:hidden;" name="photo"
                                                    type="file">
                                                <img id="holder" src="#" style="margin-top:15px;max-height:100px;"
                                                    alt="" />
                                            </div>
                                            <label for="image" class="btn d-flex justify-content-center"
                                                style="font-weight: lighter">Change
                                                profile</label>

                                            <h3 class="profile-username text-center">{{ auth()->user()->username }}
                                            </h3>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Email:</b> {{ auth()->user()->email }}<a class="float-right"></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Phone:</b> {{ auth()->user()->phone }}<a class="float-right"></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Address:</b> {{ auth()->user()->address }}<a class="float-right"></a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="container justify-content-sm-center">
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#userDetail"
                                                        data-toggle="tab">Edit User
                                                        Detail</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#passwords"
                                                        data-toggle="tab">Change Password</a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">

                                            <div class="tab-content">
                                                <div class="active tab-pane" id="userDetail">
                                                    <div class="form-group row">
                                                        <label for="full_name" class="col-sm-2 col-form-label">Full
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="full_name"
                                                                name="full_name" placeholder="Name"
                                                                value="{{ auth()->user()->full_name }}">
                                                            @error('full_name')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="username"
                                                            class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="username" class="form-control" name="username"
                                                                id="username" placeholder="username"
                                                                @error('username') is-invalid @enderror
                                                                value="{{ auth()->user()->username }}">
                                                            @error('username')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Email"
                                                                @error('email') is-invalid @enderror
                                                                value="{{ auth()->user()->email }}">
                                                            @error('email')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="phone"
                                                            class="col-sm-2 col-form-label">Phone</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" placeholder="Phone"
                                                                @error('phone') is-invalid @enderror
                                                                value="{{ auth()->user()->phone }}">
                                                            @error('phone')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="address"
                                                            class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="address"
                                                                @error('address') is-invalid @enderror id="address"
                                                                placeholder="Address"
                                                                value="{{ auth()->user()->address }}">
                                                            @error('address')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row" hidden>
                                                    <label for="password" class="col-sm-2 col-form-label">New
                                                        Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        @error('password') is-invalid @enderror id="password" readonly
                                                        value="{{ auth()->user()->password }}">
                                                </div>

                                                <div class="tab-pane" id="passwords">
                                                    <div class="form-group row">
                                                        <label for="oldPassword" class="col-sm-2 col-form-label">Old
                                                            Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control"
                                                                name="oldPassword"
                                                                @error('oldPassword') is-invalid @enderror id="oldPassword"
                                                                placeholder="Old Password" style="position: absolute;">
                                                            <i class="far fa-eye" id="togglePassword"
                                                                style="cursor: pointer; position: relative; top: 10px; float: right"></i>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="newPassword" class="col-sm-2 col-form-label">New
                                                            Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control"
                                                                name="newPassword"
                                                                @error('newPassword') is-invalid @enderror id="newPassword"
                                                                placeholder="New Password" style="position: absolute;">
                                                            <i class="far fa-eye" id="toggleNewPassword"
                                                                style="cursor: pointer; position: relative; top: 10px; float: right"></i>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="retypeNewPassword"
                                                            class="col-sm-2 col-form-label">Retype
                                                            New Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control"
                                                                name="retypeNewPassword"
                                                                @error('retypeNewPassword') is-invalid @enderror
                                                                id="retypeNewPassword" placeholder="Retype New Password"
                                                                style="position: absolute;">
                                                            <i class="far fa-eye" id="toggleRePassword"
                                                                style="cursor: pointer; position: relative; top: 10px; float: right"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right"
                                        onclick="return confirm('Do you want to update your detail.')">Update</button>
                                    <a href="{{ route('adminProfile.index') }}" type="submit"
                                        class="btn btn-danger float-right" style="margin-right: 10px"
                                        value="Back">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
