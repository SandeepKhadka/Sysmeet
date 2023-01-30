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
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Quote
                        View</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="quote">Quote <span class="text-danger">*</span></label>
                                    <textarea type="text" id="quote" name="quote" class="form-control" disabled style="resize: none" rows="5"
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
                                        value="{{ @$quote_data->quote_by }}" class="form-control" disabled>
                                    @error('quote_by')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="role">Role of the quoter <span class="text-danger">*</span></label>
                                    <input type="text" id="role" name="role" value="{{ @$quote_data->role }}"
                                        class="form-control" disabled>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('quote.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
