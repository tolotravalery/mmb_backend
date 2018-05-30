@extends('template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            {{ Form::open(array('url' => 'events','enctype'=>'multipart/form-data')) }}
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Create event</h3>
                                    </div>
                                    <hr>
                                    <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                        <label for="cc-name" class="control-label mb-1">English name</label>
                                        {!! Form::text('name_en', NULL, array('class' => 'form-control', 'placeholder' => 'name english')) !!}
                                        @if ($errors->has('name_en'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('name_en') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('name_cn') ? ' has-error' : '' }}">
                                        <label for="cc-name" class="control-label mb-1">Chinese name</label>
                                        {!! Form::text('name_cn', NULL, array('class' => 'form-control', 'placeholder' => 'name english')) !!}
                                        @if ($errors->has('name_cn'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('name_cn') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-name" class="control-label mb-1">Display Date EN</label>
                                        {!! Form::text('display_date_en', NULL, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-name" class="control-label mb-1">Display Date CN</label>
                                        {!! Form::text('display_date_cn', NULL, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('sort_date') ? ' has-error' : '' }}">
                                        <label for="cc-name" class="control-label mb-1">Sort date</label>
                                        {!! Form::date('sort_date', NULL, array('class' => 'form-control')) !!}
                                        @if ($errors->has('sort_date'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('sort_date') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-name" class="control-label mb-1">Promoted ?</label>
                                        {!! Form::checkbox('promoted', NULL, array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group ">
                                        <label for="cc-name" class="control-label mb-1">Image kely</label>
                                        <input type="file" id="file-input" name="path" class="form-control-file">
                                    </div>
                                    <div class="form-group ">
                                        <label for="cc-name" class="control-label mb-1">Image be</label>
                                        <input type="file" id="file-input" name="path2" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-name" class="control-label mb-1">Special</label>
                                        {!! Form::checkbox('etype', 'SPECIAL',true, array('class' => 'form-control')) !!}
                                        <label for="cc-name" class="control-label mb-1">Closed</label>
                                        {!! Form::checkbox('etype', 'CLOSE' ,false, array('class' => 'form-control')) !!}
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


