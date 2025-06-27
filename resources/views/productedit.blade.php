@extends('layouts.mainlayout')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <h3 style="margin-left: 19px;color: green;">{{ session('success') }}</h3>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('editproduct') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="row">
           <div class="row">
    <div class="form-group col-md-4">
        <label for="category"><strong>Main Category</strong></label>
        <select name="category" id="category" class="form-control" required>
            <option value="">-- Select Category --</option>
            @foreach($markk as $cat)
                <option value="{{ $cat->id }}"
                    {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                    {{ $cat->category_name }}
                </option>
            @endforeach
        </select>
    </div>
 <div class="form-group col-md-4">
        <label for="subcategory"><strong>Subcategory</strong></label>
        <select name="subcategory" id="subcategory" class="form-control" required>
            <option value="">-- Select Subcategory --</option>
            @foreach($subcategories as $sub)
                <option value="{{ $sub->id }}"
                    data-parent="{{ $sub->cat_id }}"
                    {{ $sub->id == $product->subcategory_id ? 'selected' : '' }}>
                    {{ $sub->category_name }}
                </option>
            @endforeach
        </select>
    </div>
<div class="form-group col-md-4">
        <label for="productcategory"><strong>Product Category</strong></label>
        <select name="productcategory" id="productcategory" class="form-control" required>
            <option value="">-- Select Product Category --</option>
            @foreach($productCategories as $pc)
                <option value="{{ $pc->id }}"
                    data-parent="{{ $pc->cat_id }}"
                    {{ $pc->id == $product->product_category_id ? 'selected' : '' }}>
                    {{ $pc->category_name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group col-sm-6">
    <label><strong>Product Code</strong></label>
    <input class="form-control" name="product_code" value="{{ $product->product_code }}" required>
    </div>
<div class="form-group col-sm-6">
    <label><strong>Product Name</strong></label>
    <textarea class="form-control" name="product_name" required>{{ $product->product_name }}</textarea>
                                </div>
<div class="form-group col-sm-12">
        <label><strong>Thumbnail</strong></label><br>
                                    @if(!empty($product->thumbnail))
                                        <img src="{{ asset('images/products/' . $product->thumbnail) }}" width="150" class="mb-2"><br>
                                    @endif
                                    <input type="file" name="thumbnail" accept="image/*">
                                </div>
                              
        <div class="form-group mt-4">
            <h6><strong>Product Images</strong></h6>

            @if($market1->isEmpty())
                <p>No product images found.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($market1 as $image)
                            <tr>
                                <td><img src="{{ asset('images/products/' . $image->product_image) }}" width="100"></td>
                               
                                <td>
    <label class="btn btn-sm btn-outline-danger m-0">
        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" autocomplete="off">
        <i class="fas fa-trash"></i> Mark to Delete
    </label>
</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Add New Images -->
        <div class="form-group">
            <label><strong>Add New Images</strong></label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
        </div>
     </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div> <!-- /.row -->
    </div>
</div>
@endsection
