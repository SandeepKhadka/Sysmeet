@extends('layouts.admin')
@section('title', 'Sysmeet | How it Works')
@section('scripts')
    <script>
        $("input[name=toggle]").change(function() {
            var mode = $(this).prop("checked");
            var id = $(this).val();
            $.ajax({
                url: "{{ route('how_it_works.status') }}",
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
                    <li class="breadcrumb-item active" aria-current="reply">How It Works</a></li>
                </ul>
                <p class="float-right" style="margin: 10px">Total : {{ \App\Models\HowItWorks::count() }}</p>
                {{-- </nav> --}}
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">How It Works</h3>
                        <a href="{{ route('how_it_works.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 14px">
                                Add Work
                            </i>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>Title</th>
                                    <th>Summary</th>
                                    <th>Order ID</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($works_data))
                                    @foreach ($works_data as $works => $work)
                                        <tr>
                                            <td>{{ $works + 1 }}</td>
                                            <td>{{ $work->title }}</td>
                                            <td>{!! html_entity_decode(Str::limit($work->summary,1000)) !!}</td>
                                            <td>{{ $work->order_id }}</td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{ @$work->id }}"
                                                    data-toggle="switchbutton"
                                                    {{ @$work->status == 'active' ? 'checked' : '' }}
                                                    data-onlabel="Active" data-offlabel="Inactive" data-size="sm"
                                                    data-width="100" data-onstyle="success" data-offstyle="danger">
                                                {{-- <span
                                                    class="{{ @$work->status == 'active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ ucfirst($work->status) }} --}}
                                            </td>
                                            <td>
                                                <a href="{{ route('how_it_works.show', $work->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('how_it_works.edit', $work->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('how_it_works.destroy', $work->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this work?');"><i
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
