@extends('admin.templates.default')

@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
        <div class="box-header with-bordered">
            <h3 class="box-title">Add Product</h3>
        </div>

        <form action="{{ route('product.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                            @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                    <textarea name="description" id="" cols="5" rows="10" class="form-control" placeholder="Product Description">{{ old('description')}}</textarea>
                            @if ($errors->has('description'))
                            <p class="help-block">
                                {{ $errors->first('description') }}
                            </p>
                            @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-data" value="{{ old('image') }}">
                            @if ($errors->has('image'))
                            <p class="help-block">
                                {{ $errors->first('image') }}
                            </p>
                            @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}">
                            @if ($errors->has('price'))
                            <p class="help-block">
                                {{ $errors->first('price') }}
                            </p>
                            @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                    <label for="" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category[]" id="" class="form-control select2" multiple="multiple">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                            @if ($errors->has('category'))
                            <p class="help-block">
                                {{ $errors->first('category') }}
                            </p>
                            @endif
                    </div>

                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('product.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('select2styles')
<link rel="stylesheet" href="{{ asset('adminlte2/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('adminlte2/bower_components/select2/dist/js/select2.full.js') }}"></script>
<script>
    $(function(){
        $('.select2').select2()
    });
</script>
@endpush
