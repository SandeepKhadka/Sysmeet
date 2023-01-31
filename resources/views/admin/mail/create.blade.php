@extends('layouts.admin')
@section('title', 'Sysmeet | Mail Setting')
@section('scripts')
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('mail.index') }}">Mail Setting</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($mail_data) ? 'Update' : 'Add' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Mail Setting
                        {{ isset($mail_data) ? 'Update' : 'Add' }}</h4>
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
                            @if (isset($mail_data))
                                <form action="{{ route('mail.update', @$mail_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('mail.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_transport">Mail Transport <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_transport" name="mail_transport" value="{{ @$mail_data->mail_transport }}"
                                        required class="form-control" required>
                                    @error('mail_transport')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_host">Mail Host <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_host" name="mail_host" value="{{ @$mail_data->mail_host }}"
                                        required class="form-control" required>
                                    @error('mail_host')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_port">Mail Port <span class="text-danger">*</span></label>
                                    <input type="number" id="mail_port" name="mail_port" value="{{ @$mail_data->mail_port }}"
                                        required class="form-control" required>
                                    @error('mail_port')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_username">Mail Username <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_username" name="mail_username" value="{{ @$mail_data->mail_username }}"
                                        required class="form-control" required>
                                    @error('mail_username')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_password">Mail Password <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_password" name="mail_password" value="{{ @$mail_data->mail_password }}"
                                        required class="form-control" required>
                                    @error('mail_password')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_encryption">Mail Encryption <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_encryption" name="mail_encryption" value="{{ @$mail_data->mail_encryption }}"
                                        required class="form-control" required>
                                    @error('mail_encryption')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_from">Mail From <span class="text-danger">*</span></label>
                                    <input type="email" id="mail_from" name="mail_from" value="{{ @$mail_data->mail_from }}"
                                        required class="form-control" required>
                                    @error('mail_from')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right"
                                value="Sumbit">{{ isset($mail_data) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('mail.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
