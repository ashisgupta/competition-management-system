<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pdfurl') ? 'has-error' : ''}}">
    {!! Form::label('pdfurl', 'pdfurl', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('pdfurl', null, ['class' => 'form-control', 'readonly'=>'readonly']) !!}
        
        {!! $errors->first('pdfurl', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4"><a href="#" id="pdf_upload_widget_opener">Select a PDF</a></div>
</div>
<div class="form-group {{ $errors->has('ppturl') ? 'has-error' : ''}}">
    {!! Form::label('ppturl', 'ppturl', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('ppturl', null, ['class' => 'form-control', 'readonly'=>'readonly']) !!}
        {!! $errors->first('ppturl', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4"><a href="#" id="ppt_upload_widget_opener">Select a PPT</a></div>
</div>
<div class="form-group {{ $errors->has('videourl') ? 'has-error' : ''}}">
    {!! Form::label('videourl', 'videourl', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('videourl', null, ['class' => 'form-control']) !!}
        {!! $errors->first('videourl', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
