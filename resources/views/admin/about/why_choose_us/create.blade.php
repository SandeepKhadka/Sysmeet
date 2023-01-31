@extends('layouts.admin')
@section('title', 'Sysmeet | Why choose us Form')
@section('scripts')

@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('why_choose_us.index') }}">Why choose us</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($why_choose_us_data) ? 'Update' : 'Add' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Why choose us
                        {{ isset($why_choose_us_data) ? 'Update' : 'Add' }}</h4>
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
                            @if (isset($why_choose_us_data))
                                <form action="{{ route('why_choose_us.update', @$why_choose_us_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('why_choose_us.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ @$why_choose_us_data->title }}"
                                        required class="form-control" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image <span class="text-danger">*</span>   (Preferred Image dimension : 1338 x 761)</label>
                                    <div class="input-group">
                                        <input id="image" class="form-control" type="file" name="image"
                                            {{ isset($why_choose_us_data) ? '' : 'required' }}>
                                    </div>
                                    <div>
                                        @if (isset($why_choose_us_data))
                                            <img src="{{ asset('/uploads/why_choose_us/' . @$why_choose_us_data->image) }}"
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
                                value="Sumbit">{{ isset($why_choose_us_data) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('why_choose_us.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
