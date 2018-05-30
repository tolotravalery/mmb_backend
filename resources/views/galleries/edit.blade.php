@extends('template')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            {{ Form::model($popup, array('route' => array('popups.update', $popup->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit popup</h3>
                                </div>
                                <hr>
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="cc-name" class="control-label mb-1">Title</label>
                                    {!! Form::text('title',$popup->title, array('title' => 'name', 'class' => 'form-control', 'placeholder' => 'titre image')) !!}
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="cc-name" class="control-label mb-1">Active</label>
                                    @if($popup->active == true)
                                        <input class="form-control" type="checkbox" name="active"  value-item="{{$popup->id}}" checked>
                                    @else
                                        <input class="form-control" type="checkbox"  value-item="{{$popup->id}}" name="active">
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('path') ? ' has-error' : '' }}">
                                    <label for="cc-name" class="control-label mb-1">Path</label>
                                    <input type="file" id="file-input" name="path" class="form-control-file">
                                </div>

                                {!! Form::button('Update', array('class' => 'btn btn-lg btn-info btn-block','type' => 'submit', )) !!}

                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
