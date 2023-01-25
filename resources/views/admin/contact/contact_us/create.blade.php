@extends('layouts.admin')
@section('title', 'Sysmeet | Contact Form')
@section('scripts')
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('contact_us.index') }}">Contact</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($contact_us_data) ? 'Update' : 'Add' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Contact
                        {{ isset($contact_us_data) ? 'Update' : 'Add' }}</h4>
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
                            @if (isset($contact_us_data))
                                <form action="{{ route('contact_us.update', @$contact_us_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('contact_us.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Company Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email"
                                        value="{{ @$contact_us_data->email }}" required class="form-control" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="phone">Company Phone <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" name="phone"
                                        value="{{ @$contact_us_data->phone }}" required class="form-control" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="country">Country <span class="text-danger">*</span></label>
                                    <input type="text" id="country" name="country"
                                        value="{{ @$contact_us_data->country }}" required class="form-control" required>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="city">City <span class="text-danger">*</span></label>
                                    <input type="text" id="city" name="city"
                                        value="{{ @$contact_us_data->city }}" required class="form-control" required>
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="street">Street address </label>
                                    <input type="text" id="street" name="street"
                                        value="{{ @$contact_us_data->street }}" class="form-control">
                                    @error('street')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state"
                                        value="{{ @$contact_us_data->state }}" class="form-control">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="why_contact_us">Why to contact us <span class="text-danger">*</span></label>
                                    <textarea type="text" id="why_contact_us" name="why_contact_us" class="form-control" required style="resize: none"
                                        rows="5" cols="10">{{ @$contact_us_data->why_contact_us }}</textarea>
                                    @error('why_contact_us')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right"
                                value="Sumbit">{{ isset($contact_us_data) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('contact_us.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
