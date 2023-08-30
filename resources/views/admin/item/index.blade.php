@extends('admin.components.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Items</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('system')}}">Home</a></li>
            <li class="breadcrumb-item active">Items</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<!-- Main content -->
<section class="content bg-white">

<table id="item-table" class='table table-bordered table-hover' style="width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Item Code</th>
            <th>Name</th>
            <th>Product Type</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Trending</th>
            <th>New</th>
            <th>Active Status</th>
            <th>Creation Date</th>
            <th>Description</th>
            <th>Discount</th>
            <th>Image</th>
            <th>Notes</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

@php

$i = 0;

@endphp

        @foreach ($items as $item)

@php

$i++;
$itemCode = sprintf('%06d', $item->id);

$activeStatus = 'Active';
$trending = 'Yes';
$new = 'Yes';

if($item->disabled == 't') {
    $activeStatus = 'Inactive';
}

if($item->trending == 'f') {
    $trending = 'No';
}

if($item->new == 'f') {
    $new = 'No';
}

@endphp

        <tr>
           <td>{{$i}}</td>
           <td>{{$itemCode}}</td>
           <td>{{$item->name}}</td>
           <td>{{$item->product->name}}</td>
           <td>{{$item->brand->name}}</td>
           <td>{{$item->price}}</td>
           <td>{{$item->quantity}}</td>
           <td>{{$trending}}</td>
           <td>{{$new}}</td>
           <td>{{$activeStatus}}</td>
           <td>{{$item->creation_date}}</td>
           <td>{{$item->description}}</td>
           <td>{{$item->discount}}</td>
           <td><img src="storage/{{$item->image}}" alt="image" width="50px"></td>
           <td>{{$item->notes}}</td>
           <td><a href='#' class='btn-sm btn-success'>Update</a></td>
        </tr>
        @endforeach
    </tbody>

</table>

</section>
<!-- /.content -->
@endsection

<script>
//   $(function () {
//     $("#item-table").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#item-table .col-md-6:eq(0)');
//   });
//   $(document).ready(function () {
//     var table = $('#item-table').DataTable({
//       paging: false,
//           info: false,
//         initComplete: function () {
//             this.api()
//                 .columns()
//                 .every(function () {
//                     var that = this;
 
//                     $('input', function () {
//                         if (that.search() !== this.value) {
//                             that.search(this.value).draw();
//                         }
//                     });
//                 });
//         },
//     });
// });
</script>

