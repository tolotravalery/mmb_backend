@extends('template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            {{ Form::open(array('url' => 'galleries','enctype'=>'multipart/form-data')) }}
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Create gallerie</h3>
                                    </div>
                                    <hr>
                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label for="cc-name" class="control-label mb-1">Title</label>
                                        {!! Form::text('title', NULL, array('title' => 'name', 'class' => 'form-control')) !!}
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-name" class="control-label mb-1">Type</label>
                                        <select name="type" class="form-control">
                                            <option value=""></option>
                                            <option value="bingo">Bingo</option>
                                            <option value="laboum">Laboum</option>
                                            <option value="more">More events</option>
                                        </select>
                                    </div>
                                    {!! Form::button('Create', array('class' => 'btn btn-lg btn-info btn-block','type' => 'submit', )) !!}

                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection