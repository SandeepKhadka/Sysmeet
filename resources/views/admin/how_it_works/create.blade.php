@extends('layouts.admin')
@section('title', 'Sysmeet | How it Works')
@section('scripts')
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('how_it_works.index') }}">How It Works</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($work_data) ? 'Update' : 'Add' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">How It Works
                        {{ isset($work_data) ? 'Update' : 'Add' }}</h4>
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
                            @if (isset($work_data))
                                <form action="{{ route('how_it_works.update', @$work_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('how_it_works.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ @$work_data->title }}"
                                        required class="form-control" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="summary">Summary <span class="text-danger">*</span></label>
                                    <textarea type="text" id="summary" name="summary" class="form-control" required style="resize: none" rows="5"
                                        cols="10">{{ @$work_data->summary }}</textarea>
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right"
                                value="Sumbit">{{ isset($work_data) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('how_it_works.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
