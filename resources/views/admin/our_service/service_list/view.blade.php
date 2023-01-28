@extends('layouts.admin')
@section('title', 'Sysmeet | Our Service List')
@section('scripts')
@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('service_list.index') }}">Service List</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Service List
                        View</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" value="{{ @$service_data->title }}"
                                        required class="form-control" required disabled>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="summary">Summary</label>
                                    <textarea type="text" id="summary" name="summary" class="form-control" required style="resize: none" rows="5"
                                        cols="10" disabled>{{ @$service_data->summary }}</textarea>
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="desc">Description</label>
                                    <textarea type="text" id="description" name="desc" class="form-control" disabled style="resize: none" rows="5"
                                        cols="10">{{ @$service_data->description }}</textarea>
                                    @error('desc')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="order_id">Order ID</label>
                                    <input type="number" id="order_id" name="order_id"
                                        value="{{ @$service_data->order_id }}" step="any" min="0" class="form-control" disabled>
                                    @error('order_id')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <a href="{{ route('service_list.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection