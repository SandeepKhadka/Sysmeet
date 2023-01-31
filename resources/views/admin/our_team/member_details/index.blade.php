@extends('layouts.admin')
@section('title', 'Sysmeet | Member List')
@section('scripts')
    <script>
        $("input[name=toggle]").change(function() {
            var mode = $(this).prop("checked");
            var id = $(this).val();
            $.ajax({
                url: "{{ route('member_details.status') }}",
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
                    <li class="breadcrumb-item active" aria-current="reply">Members</a></li>
                </ul>
                <p class="float-right" style="margin: 10px">Total Members : {{ \App\Models\MemberDetails::count() }}</p>
                {{-- </nav> --}}
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">Members</h3>
                        <a href="{{ route('member_details.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 14px">
                                Add Member
                            </i>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($member_details_data))
                                    @foreach ($member_details_data as $members => $member)
                                        <tr>
                                            <td>{{ $members + 1 }}</td>
                                            <td>{{ $member->first_name }}</td>
                                            <td>{{ $member->last_name }}</td>
                                            <td>
                                                <img src="{{ asset('/uploads/member_details/Thumb-' . $member->photo) }}"
                                                    alt="member_photo">
                                            </td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->phone }}</td>
                                            <td>{{ $member->role }}</td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{ @$member->id }}"
                                                    data-toggle="switchbutton"
                                                    {{ @$member->status == 'active' ? 'checked' : '' }}
                                                    data-onlabel="Active" data-offlabel="Inactive" data-size="sm"
                                                    data-width="100" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a href="{{ route('member_details.show', $member->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('member_details.edit', $member->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('member_details.destroy', $member->id) }}"
                                                    method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this member?');"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
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
