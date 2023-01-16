@extends('layouts.admin')
@section('title', 'GoodGoods | Banner Form')
{{-- @section('styles')
    <style>
        body{
            background-color: blue;
        }
    </style>
@endsection --}}
@section('scripts')
    {{-- <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script> --}}

    <script></script>
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <div class="content">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Banner
                        {{ isset($banner_data) ? 'Update' : 'Add' }}</h4>
                    <div class="card">
                        <div class="card-body">
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Oh sorry!</strong>There were some issues with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}

                            @if (isset($banner_data))
                                <form action="{{ route('banner.update', @$banner_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('banner.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" value="{{ @$banner_data->title }}"
                                        required class="form-control" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="image" data-preview="holder"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="image" class="form-control" type="text" name="image">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <img id="holder" /> --}}
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input id="image" class="form-control" type="file" name="image" {{ isset($banner_data) ? '' : 'required' }}>
                                    </div>
                                    {{-- <div>
                                        @if (isset($banner_data))
                                            <img src="{{ asset('/uploads/banner/' . @$banner_data->image) }}"
                                                style="margin-top:15px;max-height:100px;" alt="banner_image">
                                        @else --}}
                                    <img id="holder" src="#" style="margin-top:15px;max-height:100px;"
                                        alt="No preview image" />
                                    {{-- @endif
                                    </div> --}}
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" id="description" name="description" class="form-control" style="resize: none" rows="5"
                                        cols="10">{{ @$banner_data->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Condition <span class="text-danger">*</span></label>
                                    <div>
                                        <select name="condition" id="condition" class="form-control">
                                            <option value="" disabled selected hidden>Select condition</option>
                                            <option value="banner"
                                                {{ @$banner_data->condition == 'banner' ? 'selected' : '' }}>Banner
                                            </option>
                                            <option value="promo"
                                                {{ @$banner_data->condition == 'promo' ? 'selected' : '' }}>
                                                Promote
                                            </option>
                                        </select>
                                        @error('condition')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- @if (isset($banner_data))
                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="active"
                                                {{ @$banner_data->status == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive"
                                                {{ @$banner_data->status == 'inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif --}}
                            {{-- <button type="submit" class="btn btn-success float-right"
                                value="Sumbit">{{ isset($banner_data) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('banner.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

{{-- @section('scripts')
    <script>
        alert('Hello');
        var loadFile = function(event){
            var holder = document.getElementById('holder');
            holder.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection --}}