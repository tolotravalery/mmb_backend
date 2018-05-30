@extends('template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            {{ Form::model($event, array('route' => array('events.update', $event->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit event</h3>
                                </div>
                                <hr>
                                <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                    <label for="cc-name" class="control-label mb-1">English name</label>
                                    {!! Form::text('name_en', $event->name_en, array('class' => 'form-control', 'placeholder' => 'name english')) !!}
                                    @if ($errors->has('name_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('name_cn') ? ' has-error' : '' }}">
                                    <label for="cc-name" class="control-label mb-1">Chinese name</label>
                                    {!! Form::text('name_cn', $event->name_cn, array('class' => 'form-control', 'placeholder' => 'name english')) !!}
                                    @if ($errors->has('name_cn'))
                                        <span class="help-block">
                                              <strong>{{ $errors->first('name_cn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="cc-name" class="control-label mb-1">Display Date EN</label>
                                    {!! Form::text('display_date_en', $event->display_date_en, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label for="cc-name" class="control-label mb-1">Display Date CN</label>
                                    {!! Form::text('display_date_cn', $event->display_date_cn, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group {{ $errors->has('sort_date') ? ' has-error' : '' }}">
                                    <label for="cc-name" class="control-label mb-1">Sort date</label>
                                    {!! Form::date('sort_date', $event->sort_date, array('class' => 'form-control')) !!}
                                    @if ($errors->has('sort_date'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('sort_date') }}</strong>
                                                </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="cc-name" class="control-label mb-1">Promoted ?</label>
                                    @if($event->promoted == true)
                                        <td><input type="checkbox" name="active"  value-item="{{$event->id}}" checked></td>
                                    @else
                                        <td><input type="checkbox"  value-item="{{$event->id}}" name="active"></td>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="cc-name" class="control-label mb-1">Special</label>
                                        @if($event->etype == "SPECIAL")
                                        {!! Form::checkbox('etype', 'SPECIAL',true, array('class' => 'form-control')) !!}
                                        @else
                                            {!! Form::checkbox('etype', 'CLOSE' ,false, array('class' => 'form-control')) !!}
                                        @endif
                                    <label for="cc-name" class="control-label mb-1">Closed</label>
                                        @if($event->etype == "CLOSE")
                                        {!! Form::checkbox('etype', 'CLOSE' ,true, array('class' => 'form-control')) !!}
                                        @else
                                        {!! Form::checkbox('etype', 'CLOSE' ,false, array('class' => 'form-control')) !!}
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


