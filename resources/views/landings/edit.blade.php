@extends('template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            {{ Form::model($image, array('route' => array('landings.update', $image->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Landing</h3>
                                </div>
                                <hr>
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="cc-name" class="control-label mb-1">English name</label>
                                    {!! Form::text('title', $image->title , array('class' => 'form-control', 'placeholder' => 'Title')) !!}
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('date_landing') ? ' has-error' : '' }}">
                                    <label for="cc-name" class="control-label mb-1">End date</label>
                                    {!! Form::date('date_landing', $image->date_landing, array('class' => 'form-control')) !!}
                                    @if ($errors->has('date_landing'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('date_landing') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('image_cn') ? ' has-error' : '' }} ">
                                    <label for="cc-name" class="control-label mb-1">Image Chinese</label>
                                    <input type="file" id="file-input" name="image_cn" class="form-control-file" >
                                    @if ($errors->has('image_cn'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('image_cn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('image_en') ? ' has-error' : '' }} ">
                                    <label for="cc-name" class="control-label mb-1">Image English</label>
                                    <input type="file" id="file-input" name="image_en" class="form-control-file" >
                                    @if ($errors->has('image_en'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('image_en') }}</strong>
                                                </span>
                                    @endif
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


