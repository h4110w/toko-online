@extends('admin.templates.default')

@section('content')
@include('admin.templates.partials._alerts')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Category</h3>
            </div>

            <div class="box-body">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Data</a>
                <table class="table table-bordered">
                    <tr>
                        <th style="width:15px">No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $page = 1;
                        if (request()->has('page')) {
                            $page = request('page');
                        }
                        $no = config('olshop.pagination') * $page - (config('olshop.pagination') - 1);
                    @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <button id="delete" class="btn btn-danger" data-title="{{ $category->name }}"
                            href="{{ route('category.destroy', $category) }}"><i class="fa fa-trash"></i></button>
                        </td>
                        <form action="" method="POST" id="deleteForm">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="" style="display: none">
                        </form>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $categories->render('vendor.pagination.adminlte') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script>
    $('button#delete').on('click', function(){
        var href = $(this).attr('href');
        var title = $(this).data('title');

        swal({
            title: "Are you sure to delete this "+ title +" category?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                swal("Your category has been deleted!", {
                icon: "success",
                });
            }
        });
    });
</script>
@endpush
