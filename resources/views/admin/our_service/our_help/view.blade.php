@extends('layouts.admin')
@section('title', 'Sysmeet | Our Help Form')
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#desc").summernote('disable');
        });
    </script>
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('service_our_help.index') }}">Our Help</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Our Help
                        View</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ @$our_help_data->title }}"
                                        required class="form-control" required disabled>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" id="sub_title" name="sub_title"
                                        value="{{ @$our_help_data->sub_title }}" required class="form-control" required
                                        disabled>
                                    @error('sub_title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="desc">Description <span class="text-danger">*</span></label>
                                    <textarea type="text" id="desc" name="desc" class="form-control" required style="resize: none" rows="5"
                                        cols="10" disabled>{{ @$our_help_data->desc }}</textarea>
                                    @error('desc')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input id="image" class="form-control" type="file" name="image"
                                            {{ isset($our_help_data) ? '' : 'required' }} disabled>
                                    </div>
                                    <div>
                                        @if (isset($our_help_data))
                                            <img src="{{ asset('/uploads/our_help/' . @$our_help_data->image) }}"
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
                            <a href="{{ route('service_our_help.index') }}" type="submit"
                                class="btn btn-primary float-right" style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
