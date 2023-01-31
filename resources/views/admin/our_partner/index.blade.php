@extends('layouts.admin')
@section('title', 'Sysmeet | Our Partner')
@section('scripts')
    <script>
        $("input[name=toggle]").change(function() {
            var mode = $(this).prop("checked");
            var id = $(this).val();
            $.ajax({
                url: "{{ route('our_partner.status') }}",
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
                    <li class="breadcrumb-item active" aria-current="reply">Our Partner</a></li>
                </ul>
                <p class="float-right" style="margin: 10px">Total Partners : {{ \App\Models\OurPartner::count() }}</p>
                {{-- </nav> --}}
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">Our Partner</h3>
                        <a href="{{ route('our_partner.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 14px">
                                Add Partner
                            </i>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($partner_data))
                                    @foreach ($partner_data as $partners => $partner)
                                        <tr>
                                            <td>{{ $partners + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('/uploads/our_partner/Thumb-' . $partner->image) }}"
                                                    alt="partner_image">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{ @$partner->id }}"
                                                    data-toggle="switchbutton"
                                                    {{ @$partner->status == 'active' ? 'checked' : '' }}
                                                    data-onlabel="Active" data-offlabel="Inactive" data-size="sm"
                                                    data-width="100" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a href="{{ route('our_partner.show', $partner->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('our_partner.edit', $partner->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('our_partner.destroy', $partner->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this partner?');"><i
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
