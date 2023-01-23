@extends('layouts.admin')
@section('title', 'Sysmeet | Member Details Form')
@section('scripts')

@endsection
@section('main-content')
    <div class="col-lg-12">
        @include('admin.section.notify')
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('member_details.index') }}">Member Details</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($member_details) ? 'Update' : 'Add' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Member Details
                        {{ isset($member_details) ? 'Update' : 'Add' }}</h4>
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
                            @if (isset($member_details))
                                <form action="{{ route('member_details.update', @$member_details->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('member_details.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="first_name">First name <span class="text-danger">*</span></label>
                                    <input type="text" id="first_name" name="first_name"
                                        value="{{ @$member_details->first_name }}" class="form-control" required
                                        old="{{ @$member_details->first_name }}">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="last_name">Last name <span class="text-danger">*</span></label>
                                    <input type="text" id="last_name" name="last_name"
                                        value="{{ @$member_details->last_name }}" class="form-control" required>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email"
                                        value="{{ @$member_details->email }}" required class="form-control" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="number" id="phone" name="phone"
                                        value="{{ @$member_details->phone }}" class="form-control" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="member_desc">Member description</label>
                                    <input type="text" id="member_desc" name="member_desc"
                                        value="{{ @$member_details->member_desc }}" class="form-control"
                                        placeholder="Short description about Member ">
                                    @error('member_desc')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="role">Role <span class="text-danger">*</span></label>
                                    <input type="text" id="role" name="role"
                                        value="{{ @$member_details->role }}" class="form-control" required
                                        placeholder="Enter the role of the member">
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="responsibility">Responsibiity</label>
                                    <input type="text" id="responsibility" name="responsibility"
                                        value="{{ @$member_details->responsibility }}" class="form-control"
                                        placeholder="Enter the responsibility of the member">
                                    @error('responsibility')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="experience">Experience</label>
                                    <input type="text" id="experience" name="experience"
                                        value="{{ @$member_details->experience }}" class="form-control"
                                        placeholder="Enter the year of experience of the member">
                                    @error('experience')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="biography">Biography</label>
                                    <textarea type="text" id="biography" name="biography" class="form-control"
                                        placeholder="Enter the biography of the member" style="resize: none" rows="5" cols="10">{{ @$member_details->biography }}</textarea>
                                    @error('biography')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="prof_skill">Professional Skills</label>
                                    <textarea type="text" id="prof_skill" name="prof_skill" class="form-control"
                                        placeholder="Enter the prof_skill of the member" style="resize: none" rows="5" cols="10">{{ @$member_details->prof_skill }}</textarea>
                                    @error('prof_skill')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="photo">Photo <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input id="image" class="form-control" type="file" name="photo"
                                            {{ isset($member_details) ? '' : 'required' }}>
                                    </div>
                                    <div>
                                        @if (isset($member_details))
                                            <img src="{{ asset('/uploads/member_details/' . @$member_details->photo) }}"
                                                style="margin-top:15px;max-height:100px;" alt="Member Image">
                                        @else
                                            <img id="holder" src="#" style="margin-top:15px;max-height:100px;"
                                                alt="No preview photo" />
                                        @endif
                                    </div>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="facebook_link">Facebook link</label>
                                    <input type="url" id="facebook_link" name="facebook_link"
                                        value="{{ @$member_details->facebook_link }}" class="form-control"
                                        placeholder="Eg https://www.facebook.com/user_name/">
                                    @error('facebook_link')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="twitter_link">Twitter link</label>
                                    <input type="url" id="twitter_link" name="twitter_link"
                                        value="{{ @$member_details->twitter_link }}" class="form-control"
                                        placeholder="Eg https://www.twitter.com/user_name/">
                                    @error('twitter_link')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="instagram_link">Instagram link</label>
                                    <input type="url" id="instagram_link" name="instagram_link"
                                        value="{{ @$member_details->instagram_link }}" class="form-control"
                                        placeholder="Eg https://www.instagram.com/user_name/">
                                    @error('instagram_link')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="pinterest_link">Pinterest link</label>
                                    <input type="url" id="pinterest_link" name="pinterest_link"
                                        value="{{ @$member_details->pinterest_link }}" class="form-control"
                                        placeholder="Eg https://www.pinterest.com/user_name/">
                                    @error('pinterest_link')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="linked_in_link">Linked In link</label>
                                    <input type="url" id="linked_in_link" name="linked_in_link"
                                        value="{{ @$member_details->linked_in_link }}" class="form-control"
                                        placeholder="Eg https://www.linkedin.com/user_name/">
                                    @error('linked_in_link')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right"
                                value="Sumbit">{{ isset($member_details) ? 'Update' : 'Add' }}</button>
                            <a href="{{ route('member_details.index') }}" type="submit"
                                class="btn btn-primary float-right" style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
