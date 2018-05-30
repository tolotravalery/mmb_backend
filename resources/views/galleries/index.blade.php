@extends('template')
@section('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Gallerie listes</h1>
                </div>
                <div class="col-6">
                    <a href="{{ url('galleries/create') }}"> create gallerie</a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>type</th>
                                <th>created at</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $key => $value)
                                <tr class="tr-shadow">
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->type }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a class="item" href="{{ URL::to('galleries/' . $value->id) }}"><i class="fa fa-edit"></i></a>
                                            {{ Form::open(array('url' => 'galleries/' . $value->id, 'class' => 'pull-right')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/sb-admin-datatables.min.js') }}"></script>
@endsection
