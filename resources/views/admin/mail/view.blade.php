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
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Mail Setting
                        View</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_transport">Mail Transport <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_transport" name="mail_transport"
                                        value="{{ @$mail_data->mail_transport }}" class="form-control" disabled>
                                    @error('mail_transport')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_host">Mail Host <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_host" name="mail_host"
                                        value="{{ @$mail_data->mail_host }}" class="form-control" disabled>
                                    @error('mail_host')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_port">Mail Port <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_port" name="mail_port"
                                        value="{{ @$mail_data->mail_port }}" class="form-control" disabled>
                                    @error('mail_port')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_username">Mail Username <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_username" name="mail_username"
                                        value="{{ @$mail_data->mail_username }}" class="form-control" disabled>
                                    @error('mail_username')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_password">Mail Password <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_password" name="mail_password"
                                        value="{{ @$mail_data->mail_password }}" class="form-control" disabled>
                                    @error('mail_password')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_encryption">Mail Encryption <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_encryption" name="mail_encryption"
                                        value="{{ @$mail_data->mail_encryption }}" class="form-control" disabled>
                                    @error('mail_encryption')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="mail_from">Mail From <span class="text-danger">*</span></label>
                                    <input type="text" id="mail_from" name="mail_from"
                                        value="{{ @$mail_data->mail_from }}" class="form-control" disabled>
                                    @error('mail_from')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
