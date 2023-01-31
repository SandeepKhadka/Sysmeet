@extends('layouts.admin')
@section('title', 'Sysmeet | Messages List')
@section('scripts')
    <script>
        $("input[name=toggle]").change(function() {
            var mode = $(this).prop("checked");
            var id = $(this).val();
            $.ajax({
                url: "{{ route('messages.status') }}",
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
                    <li class="breadcrumb-item active" aria-current="reply">Contact Messages</a></li>
                </ul>
                <p class="float-right" style="margin: 10px">Total Detail : {{ \App\Models\ContactMessage::count() }}</p>
                {{-- </nav> --}}
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">Contact Messages</h3>
                        {{-- <a href="{{ route('messages.deleteAll') }}" class="btn btn-danger float-right"
                            style="margin-bottom: 0px">
                                
                            </i>
                        </a> --}}
                        <form action="{{ route('messages.deleteAll') }}" method=""
                            class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger float-right"
                                onclick="return confirm('Do you want to delete this message?');">Delete All <i
                                    class="fa fa-trash"></i></button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($messages_data))
                                    @foreach ($messages_data as $messages => $message)
                                        <tr>
                                            <td>{{ $messages + 1 }}</td>
                                            <td>{{ $message->first_name }}</td>
                                            <td>{{ $message->last_name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->phone }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{!! html_entity_decode(Str::limit($message->message,20)) !!}</td>
                                            {{-- <td>
                                                <input type="checkbox" name="toggle" value="{{ @$message->id }}"
                                                    data-toggle="switchbutton"
                                                    {{ @$message->status == 'active' ? 'checked' : '' }}
                                                    data-onlabel="Active" data-offlabel="Inactive" data-size="sm"
                                                    data-width="100" data-onstyle="success" data-offstyle="danger">
                                            </td> --}}
                                            <td>
                                                <a href="{{ route('messages.show', $message->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                {{-- <a href="{{ route('messages.edit', $message->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a> --}}
                                                <form action="{{ route('messages.destroy', $message->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this message?');"><i
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
