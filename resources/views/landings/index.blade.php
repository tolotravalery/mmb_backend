@extends('template')
@section('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')


        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Landing listes</h1>
                </div>
                <div class="col-6">
                    <a href="{{url('landings/create')}}">Create landing</a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>End date</th>
                                <th>Active</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->date_landing }}</td>
                                    @if($value->active == true)
                                        <td><input type="checkbox" name="active"  value-item="{{$value->id}}" checked></td>
                                    @else
                                        <td><input type="checkbox"  value-item="{{$value->id}}" name="active"></td>
                                    @endif
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ URL::to('landings/' . $value->id . '/edit') }}"><i class="fa fa-edit"></i></a>
                                            {{ Form::open(array('url' => 'landings/' . $value->id)) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button type="submit">
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
