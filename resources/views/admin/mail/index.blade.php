@extends('layouts.admin')
@section('title', 'Sysmeet | Mail Setting')
@section('scripts')
    <script>
        $("input[name=toggle]").change(function() {
            var mode = $(this).prop("checked");
            var id = $(this).val();
            $.ajax({
                url: "{{ route('mail.status') }}",
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
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                {{-- <nav aria-label="breadcrumb"> --}}
                <ul class="breadcrumb float-left">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="reply">Mail</a></li>
                </ul>
                <p class="float-right" style="margin: 10px">Total : {{ \App\Models\MailSetting::count() }}</p>
                {{-- </nav> --}}
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">Mail</h3>
                        <a href="{{ route('mail.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 14px">
                                Add Mail Detail
                            </i>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>Mail Transport</th>
                                    <th>Mail Host</th>
                                    <th>Mail Port</th>
                                    <th>Mail Username</th>
                                    <th>Mail From</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($mail_data))
                                    @foreach ($mail_data as $mails => $mail)
                                        <tr>
                                            <td>{{ $mails + 1 }}</td>
                                            <td>{{ $mail->mail_transport }}</td>
                                            <td>{{ $mail->mail_host }}</td>
                                            <td>{{ $mail->mail_port }}</td>
                                            <td>{{ $mail->mail_username }}</td>
                                            <td>{{ $mail->mail_from }}</td>
                                            <td>
                                                <input type="checkbox" name="toggle" value="{{ @$mail->id }}"
                                                    data-toggle="switchbutton"
                                                    {{ @$mail->status == 'active' ? 'checked' : '' }} data-onlabel="Active"
                                                    data-offlabel="Inactive" data-size="sm" data-width="100"
                                                    data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a href="{{ route('mail.show', $mail->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('mail.edit', $mail->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('mail.destroy', $mail->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this mail?');"><i
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
