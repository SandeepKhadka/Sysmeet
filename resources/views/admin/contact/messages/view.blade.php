@extends('layouts.admin')
@section('title', 'Sysmeet | Contact Messages')
@section('scripts')
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('messages.index') }}">Contact Messages</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Contact Messages
                        View</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" id="first_name" name="first_name"
                                        value="{{ @$messages_data->first_name }}" class="form-control" disabled>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" id="last_name" name="last_name"
                                        value="{{ @$messages_data->last_name }}" class="form-control" disabled>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email"
                                        value="{{ @$messages_data->email }}" class="form-control" disabled>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" name="phone"
                                        value="{{ @$messages_data->phone }}" class="form-control" disabled>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="subject">Subject <span class="text-danger">*</span></label>
                                    <input type="text" id="subject" name="subject"
                                        value="{{ @$messages_data->subject }}" class="form-control" disabled>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message <span class="text-danger">*</span></label>
                                    <textarea type="text" id="message" name="message" class="form-control" required style="resize: none" rows="5"
                                        cols="10" disabled>{{ @$messages_data->message }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('messages.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
