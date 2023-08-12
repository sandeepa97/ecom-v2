@extends('admin.components.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('system')}}">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<!-- Main content -->
<section class="content bg-white">

<table id="customer-table" class='table table-bordered table-hover'>
    <thead>
        <tr>
            <th>#</th>
            <th>Customer ID</th>
            <th>Name</th>
            <th>NIC / Passport</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Country</th>
            <th>Location</th>
            <th>Active Status</th>
            <th>Creation Date</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

@php

$i = 0;

@endphp

        @foreach ($customers as $customer)

@php

$i++;
$customerId = sprintf('%06d', $customer->id);

$activeStatus = 'A';

if($customer->disabled == 't') {
    $activeStatus = 'I';
}

@endphp

        <tr>
           <td>{{$i}}</td>
           <td>{{$customerId}}</td>
           <td>{{$customer->saluation}} {{$customer->first_name}} {{$customer->last_name}}</td> 
           <td>{{$customer->nic}}</td>
           <td>{{$customer->mobile}}</td>
           <td>{{$customer->email}}</td>
           <td>{{$customer->country}}</td>
           <td>{{$customer->location}}</td>
           <td>{{$activeStatus}}</td>
           <td>{{$customer->creation_date}}</td>
           <td>{{$customer->username}}</td>
           <td><a href='#' class='btn-sm btn-success'>Update</a></td>

        </tr>
        @endforeach
    </tbody>

</table>

</section>
<!-- /.content -->
@endsection

<script>
  $(function () {
    $("#customer-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#customer-table .col-md-6:eq(0)');
  });
</script>

