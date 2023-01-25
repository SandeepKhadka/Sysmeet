@extends('layouts.admin')
@section('title', 'Sysmeet | Services to Choose us Form')
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#description").summernote('disable');
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
            <li class="breadcrumb-item"><a href="{{ route('services_choose.index') }}">Services to Choose us</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Services to Choose us
                        View</h4>
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
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title"
                                        value="{{ @$services_choose_data->title }}" disabled class="form-control" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea type="text" id="" name="description" class="form-control" required style="resize: none"
                                        rows="5" cols="10" disabled>{{ @$services_choose_data->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="order_id">Order ID <span class="text-danger">*</span></label>
                                    <input type="number" id="order_id" name="order_id"
                                        value="{{ @$services_choose_data->order_id }}" step="any" min="0" class="form-control" disabled>
                                    @error('order_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('services_choose.index') }}" type="submit"
                                class="btn btn-primary float-right" style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
