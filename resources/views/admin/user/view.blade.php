@extends('layouts.admin')
@section('title', 'Sysmeet | User Form')
@section('scripts')

@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Users
                        View</h4>
                    <div class="card">
                        <div class="card-body">
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
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="full_name">Full name <span class="text-danger">*</span></label>
                                    <input type="text" id="full_name" name="full_name"
                                        value="{{ @$user_data->full_name }}" class="form-control" disabled
                                        old="{{ @$user_data->full_name }}">
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="username">Username <span class="text-danger">*</span></label>
                                    <input type="text" id="username" name="username" value="{{ @$user_data->username }}"
                                        class="form-control" disabled>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password" name="password"
                                        value="{{ @$user_data->password }}" class="form-control" disabled>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" value="{{ @$user_data->email }}"
                                        class="form-control" disabled>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="role">Role <span class="text-danger">*</span></label>
                                    <select type="text" class="form-control form-control-sm" id="role"
                                        name="role">
                                        <option value="" selected disabled>--Select role--</option>
                                        <option {{ @$user_data->role == 'admin' ? 'selected' : '' }}>admin
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone" name="phone" value="{{ @$user_data->phone }}"
                                        class="form-control" disabled>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" value="{{ @$user_data->address }}"
                                        class="form-control" disabled>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="photo">Photo</label>
                                    <div class="input-group">
                                        <input id="image" class="form-control" disabled type="file" name="photo">
                                    </div>
                                    <div>
                                        @if (isset($user_data))
                                            <img src="{{ asset('/uploads/user/' . @$user_data->photo) }}"
                                                style="margin-top:15px;max-height:100px;" alt="User Image">
                                        @else
                                            <img id="holder" src="#" style="margin-top:15px;max-height:100px;"
                                                alt="No preview photo" />
                                        @endif
                                    </div>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('user.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
