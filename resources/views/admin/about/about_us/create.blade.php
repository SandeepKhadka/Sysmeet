@extends('layouts.admin')
@section('title', 'Sysmeet | About us Form')
@section('scripts')

@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('about_us.index') }}">About us</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($about_us_data) ? 'Update' : 'Add' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">About us
                        {{ isset($about_us_data) ? 'Update' : 'Add' }}</h4>
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
                            @if (isset($about_us_data))
                                <form action="{{ route('about_us.update', @$about_us_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('about_us.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ @$about_us_data->title }}"
                                        required class="form-control" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea type="text" id="description" name="description" class="form-control" required style="resize: none"
                                        rows="5" cols="10">{{ @$about_us_data->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image <span class="text-danger">*</span>   (Preferred Image dimension : 1140 x 1300)</label>
                                    <div class="input-group">
                                        <input id="image" class="form-control" type="file" name="image"
                                            {{ isset($about_us_data) ? '' : 'required' }}>
                                    </div>
                                    <div>
                                        @if (isset($about_us_data))
                                            <img src="{{ asset('/uploads/about_us/' . @$about_us_data->image) }}"
                                                style="margin-top:15px;max-height:100px;" alt="Our help Image">
                                        @else
                                            <img id="holder" src="#" style="margin-top:15px;max-height:100px;"
                                                alt="" />
                                        @endif
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right"
                                value="Sumbit">{{ isset($about_us_data) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('about_us.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
