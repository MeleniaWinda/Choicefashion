<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nama') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nama', 'required' => 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('file_dir') }}
            {{ Form::text('file_dir', $product->file_dir, ['class' => 'form-control' . ($errors->has('file_dir') ? ' is-invalid' : ''), 'placeholder' => 'File Dir']) }}
            {!! $errors->first('file_dir', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('file') }}
            {{ Form::file('file', ['class' => 'form-control' . ($errors->has('file') ? ' is-invalid' : ''), 'placeholder' => 'File']) }}
            {!! $errors->first('file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file 2') }}
            {{ Form::file('file2', ['class' => 'form-control' . ($errors->has('file2') ? ' is-invalid' : ''), 'placeholder' => 'File']) }}
            {!! $errors->first('file2', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file 3') }}
            {{ Form::file('file3', ['class' => 'form-control' . ($errors->has('file3') ? ' is-invalid' : ''), 'placeholder' => 'File']) }}
            {!! $errors->first('file3', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Deksripsi') }}
            {{ Form::textarea('desc', $product->desc, ['class' => 'form-control' . ($errors->has('desc') ? ' is-invalid' : ''), 'placeholder' => 'Deksripsi', 'required' => 'required']) }}
            {!! $errors->first('desc', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>