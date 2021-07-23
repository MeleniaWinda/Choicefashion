<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nama Kriteria') }}
            {{ Form::text('name', $category->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nama Kriteria', 'required' => 'required']) }}
            {!! $errors->first('name', '<div class="small text-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('_tipe') }}
            {{ Form::select('_type', ['benefit' => 'Benefit', 'cost' => 'Cost'], $category->_type, ['class' => 'form-control' . ($errors->has('_type') ? ' is-invalid' : ''), 'placeholder' => ' Tipe', 'required' => 'required']) }}
            {!! $errors->first('_type', '<div class="small text-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Bobot') }}
            {{ Form::number('quality', $category->quality, ['class' => 'form-control' . ($errors->has('quality') ? ' is-invalid' : ''), 'placeholder' => 'Bobot', 'required' => 'required', 'step' => '0.1']) }}
            {!! $errors->first('quality', '<div class="small text-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Pertanyaan') }}
            {{ Form::textarea('question', $category->question, ['class' => 'form-control' . ($errors->has('question') ? ' is-invalid' : ''), 'placeholder' => 'Pertanyaan', 'required' => 'required']) }}
            {!! $errors->first('question', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>