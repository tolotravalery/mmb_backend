@extends('template')
@section('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection
@section('content')


        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Event listes</h1>
                </div>
                <div class="col-6">
                    <a href="{{url('events/create')}}">Create event</a>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>English name</th>
                                <th>Chinese name</th>
                                <th>Display date</th>
                                <th>Promoted ?</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name_en }}</td>
                                    <td>{{ $value->name_cn }}</td>
                                    <td>{{ $value->sort_date }}</td>
                                    @if($value->promoted == true)
                                        <td><input type="checkbox" name="promoted"  value-item="{{$value->id}}" checked></td>
                                    @else
                                        <td><input type="checkbox"  value-item="{{$value->id}}" name="promoted"></td>
                                    @endif
                                    <td>{{ $value->etype }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ URL::to('events/' . $value->id . '/edit') }}"><i class="fa fa-edit"></i></a>
                                            {{ Form::open(array('url' => 'events/' . $value->id)) }}
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
