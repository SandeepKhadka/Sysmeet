@extends('layouts.admin')
@section('title', 'Sysmeet | Banner Form')
@section('scripts')

@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('main_banner.index') }}">Main Banner</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Main Banner
                        View</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ @$banner_data->title }}"
                                        disabled required class="form-control" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" id="sub_title" name="sub_title" disabled
                                        value="{{ @$banner_data->sub_title }}" required class="form-control" required>
                                    @error('sub_title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="summary">Summary <span class="text-danger">*</span></label>
                                    <textarea type="text" id="summary" name="summary" disabled class="form-control" required style="resize: none"
                                        rows="5" cols="10">{{ @$banner_data->summary }}</textarea>
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="order_id">Order ID <span class="text-danger">*</span></label>
                                    <input type="number" id="order_id" name="order_id"
                                        value="{{ @$banner_data->order_id }}" step="any" min="0" disabled
                                        class="form-control" required>
                                    @error('order_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input id="image" class="form-control" type="file" name="image" disabled
                                            {{ isset($banner_data) ? '' : 'required' }}>
                                    </div>
                                    <div>
                                        @if (isset($banner_data))
                                            <img src="{{ asset('/uploads/main_banner/' . @$banner_data->image) }}"
                                                style="margin-top:15px;max-height:100px;" alt="banner_image">
                                        @else
                                            <img id="holder" src="#" style="margin-top:15px;max-height:100px;"
                                                alt="No preview image" />
                                        @endif
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('main_banner.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
