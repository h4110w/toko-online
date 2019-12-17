@extends('admin.templates.default')

@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
        <div class="box-header with-bordered">
            <h3 class="box-title">Tambah Category</h3>
        </div>

        <form action="{{ route('category.store') }}" class="form-horizontal" method="POST">
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
                        <input type="text" name="description" class="form-control" placeholder="Description" value="{{ old('description') }}">
                            @if ($errors->has('description'))
                            <p class="help-block">
                                {{ $errors->first('description') }}
                            </p>
                            @endif
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('category.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
