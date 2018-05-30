@extends('template')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Popup listes</h1>
                </div>
                <div class="col-6">
                    <a href="{{ url('popups/create') }}"> create popup</a>
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
                                <th>path</th>
                                <th>created at</th>
                                <th>Active?</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($popups as $key => $value)
                                <tr class="tr-shadow">
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->path }}</td>
                                    <td>{{ $value->dateAjout }}</td>
                                    @if($value->active == true)
                                        <td><input type="checkbox" name="active"  value-item="{{$value->id}}" checked></td>
                                    @else
                                        <td><input type="checkbox"  value-item="{{$value->id}}" name="active"></td>
                                    @endif
                                    <td>
                                        <div class="table-data-feature">
                                            <a class="item" href="{{ URL::to('popups/' . $value->id . '/edit') }}"><i class="fa fa-edit"></i></a>
                                            {{--<a class="item" href="{{ URL::to('popups/' . $value->id) }}"><i class="zmdi zmdi-slideshow"></i></a>--}}
                                            {{ Form::open(array('url' => 'popups/' . $value->id, 'class' => 'pull-right')) }}
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

