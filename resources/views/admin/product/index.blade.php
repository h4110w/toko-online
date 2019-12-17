@extends('admin.templates.default')

@section('content')
@include('admin.templates.partials._alerts')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Product</h3>
            </div>

            <div class="box-body">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Data</a>
                <table class="table table-bordered">
                    <tr>
                        <th style="width:15px">No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $page = 1;
                        if (request()->has('page')) {
                            $page = request('page');
                        }
                        $no = config('olshop.pagination') * $page - (config('olshop.pagination') - 1);
                    @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ $product->getImage() }}" width="100" alt=""></td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @foreach ($product->categories as $category)
                                <span class="label label-primary">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <button id="delete" class="btn btn-danger" data-title="{{ $product->name }}"
                            href="{{ route('product.destroy', $product) }}"><i class="fa fa-trash"></i></button>
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
                {{ $products->render('vendor.pagination.adminlte') }}
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
            title: "Are you sure to delete this "+ title +" product?",
            text: "Once deleted, you will not be able to recover this product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                swal("Your product has been deleted!", {
                icon: "success",
                });
            }
        });
    });
</script>
@endpush
