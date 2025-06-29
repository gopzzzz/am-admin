@extends('layouts.mainlayout')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
           
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      @if(session('success'))
<h3 style="margin-left: 19px;color: green;">{{session('success')}}</h3>
@endif
      <div class="row">
          <!-- [ form-element ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Category</h5>
              
              </div>
              <div class="card-body">
                <div class="dt-responsive table-responsive">

   <p align="right">

 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Category</button>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form method="POST"  id="form1" action="{{url('categoryinsert')}}" enctype="multipart/form-data">

@csrf

<div class="modal-dialog" role="document" style="width:80%;">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title" id="exampleModalLabel">Add Category</h5>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">

<span aria-hidden="true">&times;</span>

</button>

</div>

<div class="modal-body row"> 
<div class="form-group col-sm-12">
<label class="exampleModalLabel">Category Name</label>
<input type="text" class="form-control" name="category_name"  placeholder="Enter Category Name" required>
</div>
<div class="form-group col-sm-12">
<label class="exampleModalLabel">Category Image</label>
                <input type="file" name="categoryimage" accept="image/*" required>
              </div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary form1-submit">Add</button>
</div>
</div>
</div>
</form>
</div>
              </p>
</div>
             <div class="card-body">
 <table id="example1" class="table table-bordered table-striped">
  <thead>
<tr>
                     <th>id</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Status</th>    

                    <th>Action</th>    
                    </tr>
                </thead>
                <tbody>
                     @php
                     $i = 1;
                     @endphp
   
                     @foreach($mark as $key)
   <tr>
       <td>{{ $i }}</td>
      
       <td>{{$key->category_name}}</td>
       <td>        <img src="{{ asset('/images/categories/'.$key->category_image) }}" alt="" width="200" height="100" />
       </td>
   <td>@if($key->status==0) Active
            @else Inactive 
            @endif
          </td>
   
           <td>
               <i class="fa fa-edit edit_category" aria-hidden="true" data-toggle="modal" data-id="{{ $key->id }}"></i>
              
   </td>
   <td style="width: 50px;">

         <a href="{{ route('subcategory', ['catId' => $key->id, 'categoryname' => $key->category_name]) }}" class="btn btn-success btn-sm order_trans">Subcategory</a>

</td>
    </tr>
       @php
       $i++;
       @endphp
       @endforeach
   </tbody>
     <tfoot>

                  <tr>
                  <th>id</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Status</th>    
                    <th>Action</th>    

                  </tr>

                  </tfoot>

                </table>
				
                <div class="modal" id="editcategory_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <form method="POST" action="{{url('categoryedit')}}" enctype="multipart/form-data" name="categoryedit">

@csrf
      <div class="modal-body row">
<input type="hidden" name="id" id="categoryid">

   
<div class="form-group col-sm-12">

<label class="exampleModalLabel">Category Name</label>
<input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name"  required>
</div>
<div class="form-group col-sm-12">
<label class="exampleModalLabel">Category Image</label>
                <input type="file" name="categoryimage" accept="image/*" id="categoryimage">
              </div>
 <div class="form-group col-sm-12">
 <label class="exampleModalLabel">Status</label>
<select name="status" id="status" class="form-control"  required>
<option value="0">Active</option>
<option value="1">In Active</option>
</select>
</div>
</div>
  <div class="modal-footer">

      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
   <!-- /.card-body -->

            </div>

            <!-- /.card -->

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->

      </div>

      <!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div> @endsection