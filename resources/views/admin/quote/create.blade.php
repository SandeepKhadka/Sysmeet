@extends('layouts.admin')
@section('title', 'Sysmeet | Quotes')
@section('scripts')
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('quote.index') }}">Quote</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($quote_data) ? 'Update' : 'Add' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Quote
                        {{ isset($quote_data) ? 'Update' : 'Add' }}</h4>
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
                            @if (isset($quote_data))
                                <form action="{{ route('quote.update', @$quote_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('quote.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="quote">Quote <span class="text-danger">*</span></label>
                                    <textarea type="text" id="quote" name="quote" class="form-control" required style="resize: none" rows="5"
                                        cols="10">{{ @$quote_data->quote }}</textarea>
                                    @error('quote')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="quote_by">Quote By <span class="text-danger">*</span></label>
                                    <input type="text" id="quote_by" name="quote_by"
                                        value="{{ @$quote_data->quote_by }}" required class="form-control" required>
                                    @error('quote_by')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="role">Role of the quoter <span class="text-danger">*</span></label>
                                    <input type="text" id="role" name="role" value="{{ @$quote_data->role }}"
                                        required class="form-control" required>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right"
                                value="Sumbit">{{ isset($quote_data) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('quote.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
