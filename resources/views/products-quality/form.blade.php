<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('produk') }}
            {{ Form::select('product_id', $products, $productsQuality->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invlid' : ''), 'placeholder' => 'Produk', 'required' => 'required']) }}
            {!! $errors->first('product_id', '<div class="small text-danger">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sub_kriteria') }}
            {{ Form::select('categories_sub_id', $categoriesSubs, $productsQuality->categories_sub_id, ['class' => 'form-control' . ($errors->has('categories_sub_id') ? ' is-invalid' : ''), 'placeholder' => 'Sub Kriteria', 'required' => 'required']) }}
            {!! $errors->first('categories_sub_id', '<div class="small text-danger">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>