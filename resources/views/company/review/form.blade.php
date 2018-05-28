<div class="form-group {{ $errors->has('paper_id') ? 'has-error' : ''}}">
    {!! Form::label('paper_id', 'Paper Selected', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select( 'paper_id',$userpapers, $paper_id, ['class' => 'form-control']) !!}
        {!! $errors->first('paper_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('quality') ? 'has-error' : ''}}">
    {!! Form::label('quality', 'Quality', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::selectRange( 'quality',0, 5, ['class' => 'form-control']) !!}
        {!! $errors->first('quality', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::selectRange( 'content',0, 5, ['class' => 'form-control']) !!}
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('performance') ? 'has-error' : ''}}">
    {!! Form::label('performance', 'Performance', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::selectRange( 'performance',0, 5, ['class' => 'form-control']) !!}
        {!! $errors->first('performance', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
    {!! Form::label('remark', 'Remarks', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('remark', null, ['class' => 'form-control']) !!}
        {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
