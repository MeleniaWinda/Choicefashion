<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Pilih kriteria') }}
            {{ Form::select('category_id', $categories, $categoriesSub->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Kriteria', 'required' => 'required']) }}
            {!! $errors->first('category_id', '<div class="small text-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nama Sub Kriteria') }}
            {{ Form::text('name', $categoriesSub->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Sub Kriteria', 'required' => 'required']) }}
            {!! $errors->first('name', '<div class="small text-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Bobot') }}
            {{ Form::number('quality', $categoriesSub->quality, ['class' => 'form-control' . ($errors->has('quality') ? ' is-invalid' : ''), 'placeholder' => 'Bobot', 'required' => 'required', 'step' => '0.1']) }}
            {!! $errors->first('quality', '<div class="small text-danger">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>