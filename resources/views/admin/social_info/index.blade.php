@extends('layouts.admin')
@section('title', 'Sysmeet | Social Info List')
@section('scripts')
    <script>
        $("input[name=toggle]").change(function() {
            var mode = $(this).prop("checked");
            var id = $(this).val();
            $.ajax({
                url: "{{ route('social_info.status') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    mode: mode,
                    id: id,
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.msg);
                    } else {
                        alert('Please try again!');
                    }

                }
            });
        });
    </script>
@endsection
@section('main-content')
    <div class="container-fluid">
        {{-- <div class="col-lg-12">
            @include('admin.section.notify')
        </div> --}}
        {{-- BreadCrumb  --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                {{-- <nav aria-label="breadcrumb"> --}}
                <ul class="breadcrumb float-left">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="reply">Social Info</a></li>
                </ul>
                <p class="float-right" style="margin: 10px">Total Social Infos : {{ \App\Models\SocialInfo::count() }}</p>
                {{-- </nav> --}}
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">Social Info</h3>
                        {{-- <a href="{{ route('social_info.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 12px">
                                Add Banner
                            </i>
                        </a> --}}
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Order ID</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($social_info_data))
                                    @foreach ($social_info_data as $social_infos => $social_info)
                                        <tr>
                                            <td>{{ $social_infos + 1 }}</td>
                                            <td>{{ $social_info->title }}</td>
                                            <td>{{ $social_info->link }}</td>
                                            <td>{{ $social_info->order_id }}</td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{ @$social_info->id }}"
                                                    data-toggle="switchbutton"
                                                    {{ @$social_info->status == 'active' ? 'checked' : '' }}
                                                    data-onlabel="Active" data-offlabel="Inactive" data-size="sm"
                                                    data-width="100" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('social_info.show', $social_info->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a> --}}
                                                <a href="{{ route('social_info.edit', $social_info->id) }}" class="{{ isset($social_info->link) ? 'btn btn-warning' : 'btn btn-danger' }}">
                                                    {{-- <i class="fa fa-pen">

                                                    </i> --}}
                                                    {{ isset($social_info->link) ? 'Edit' : 'Add link' }}
                                                </a>
                                                {{-- <form action="{{ route('social_info.destroy', $social_info->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this social_info?');"><i
                                                            class="fa fa-trash"></i></button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
