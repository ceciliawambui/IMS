   {{-- @extends('products.base')
@extends('layouts.sidenav')
@section('content') --}}
   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <title>Point of Sale</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
       <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
       {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
       <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

       <style>
           body {
               font-family: 'Times New Roman', serif;
           }

           .btn-group-xs>.btn,
           .btn-xs {
               padding: .35rem .5rem;
               font-size: .875rem;
               line-height: .5;
               border-radius: .2rem;
           }

           .table.dataTable td {
               padding: 3px;
           }

           .table.dataTable th {
               padding: 3px;
           }

       </style>

   </head>

   <body>
       <div class="container-fluid mt-2">

           <div class="row">

               <div class="col-lg-12">
                   <div>
                       <h3 class="text-center">Point Of Sale</h3>
                       {{-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Point Of Sale</li>
                            </ol>
                        </nav> --}}

                   </div>
                   <div class="row">
                       <div class="col-md-6">
                           <h5 class="text-center"><b>Make a Sale </b></h5>
                           <a class="btn btn-info btn-sm" href="{{ route('home') }}"> Back</a>
                           {{-- <a class="btn btn-success btn-sm" href="{{ route('sale_products.create') }}">Add Product</a> --}}

                           <div class="float-right">
                               <h4> Search for Product name</h4>
                               <select class="form-control" id="search" style="width:300px;"
                                   name="product_id"></select>
                               {{-- <a class="btn btn-success btn-sm" href="{{ route('sale_products.create') }}">Add</a> --}}

                           </div>


                       </div>
                       <div class="col-md-6">
                           <h5 class="text-center"><b>Mode of Payment</b></h5>
                       </div>

                   </div>

                   <div></div>
                   <div></div>
                   <div>
                       {{-- <form name="viewTrashed" class="d-flex float-right">
                        <select name="trashed" id="trashed" class="form-control mr-2 size=5">
                            <option value="">View Sale Products</option>
                            <option value="1">View Trashed</option>
                        </select>
                        <button type="button" id="filterTrashed" class="btn btn-sm btn-success btn-xs">Filter</button>
                    </form> --}}

                   </div>
               </div>

           </div>
           @if ($message = Session::get('success'))
               <div class="alert alert-success">
                   <p>{{ $message }}</p>
               </div>
           @endif
           <div class="card-body">
               <div class="row">
                   <div class="col-md-6">
                       <table class="table table-bordered" id="datatable-crud" style="width: 100%">
                           <thead>
                               <tr>
                                   <th>Product ID</th>
                                   <th>Product Name</th>
                                   <th>Quantity</th>
                                   <th>Price</th>
                                   <th>Total</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                       </table>
                       <table class="table table-bordered" id="datatable-crud"
                           style="width: 100%; background-color:black; color:white">
                           <thead>

                               <tr>
                                   <th style="font-size: 40px">Total</th>
                                   <th style="font-size: 40px" id="cartTotal">0</th>
                               </tr>
                           </thead>
                       </table>

                   </div>
                   <div class="col-md-6">
                       <div class="row">
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                               <div class="card" style="width: 30rem;">
                                   <img class="card-img-top" src="mode of payment.jpg" alt="Card image cap">

                                   <ul class="list-group list-group-flush">
                                       <li class="list-group-item">ATM Card <button type="button"
                                               class="btn btn-success float-right">PAY</button></li>
                                       <li class="list-group-item">Mpesa<button type="button"
                                               class="btn btn-success float-right">PAY</button></li>
                                       <li class="list-group-item">Cash <button type="button"
                                               class="btn btn-success float-right">PAY</button></li>
                                   </ul>

                               </div>

                           </div>
                           <div class="col-md-3"></div>
                       </div>
                   </div>

               </div>
           </div>
       </div>

       <script type="text/javascript">
           $(document).ready(function() {
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               let cartTablle = $('#datatable-crud').DataTable({
                   processing: false,
                   serverSide: false,
                   columns: [{
                           data: 'product_id',
                           name: 'product_id',
                           "visible": false,
                       },
                       {
                           data: 'product_name',
                           name: 'product_name'
                       },
                       {
                           data: 'quantity',
                           name: 'quantity'
                       },
                       {
                           data: 'price',
                           name: 'price'
                       },
                       {
                           data: 'total',
                           name: 'total'
                       },
                       {
                           data: 'action',
                           name: 'action',
                           orderable: false
                       },
                   ],
                   order: [
                       [0, 'desc']
                   ],
                   columnDefs: [{
                       targets: [4],
                       render: function(data, type, row) {
                           calculateTotalCartPrice(row, (row.quantity) * parseInt(row.price))
                           return parseInt(row.quantity) * parseInt(row.price);
                       }
                   }],

               });

               var path = "{{ route('autocomplete') }}";
               $('#search').select2({
                   placeholder: 'Select a product',
                   ajax: {
                       url: path,
                       dataType: 'json',
                       delay: 100,
                       processResults: function(data) {
                           return {
                               results: $.map(data, function(item) {
                                   return {
                                       text: item.name,
                                       selling_price: item.selling_price,
                                       id: item.id

                                   }
                               })
                           };
                       },
                       cache: true
                   }
               });
               var test = $('#search');
               test.on("select2:select", function(event) {
                   var searchResults = event.params.data;

                   //Got array of existing entries
                   var itemIdColumnData = cartTablle.column(0).data().toArray();

                   //ifNotExist will return -1 if value not in array
                   var ifNotExist = jQuery.inArray(searchResults.id, itemIdColumnData);
                   let currentRow = null;
                   if (ifNotExist === -1) {
                       currentRow = cartTablle.row.add({
                           "product_id": searchResults.id,
                           "product_name": searchResults.text,
                           "quantity": 1,
                           "price": searchResults.selling_price,
                           "total": 0,
                           "action": '<a></a>'
                       }).draw();
                   } else {
                       var matchRow = cartTablle.row(function(idx, rowdata, node) {
                           return rowdata.product_id === searchResults.id ? true : false;
                       });
                       currentRow = matchRow;
                       matchData = matchRow.data();
                       matchData.quantity = parseInt(matchData.quantity) + 1;
                       matchRow.data(matchData).draw();
                   }
               });
               const cartData = [];

               function calculateTotalCartPrice(newRowData, newTotal) {
                   if (cartData.some(product => product.product_id === newRowData.product_id)) {
                       //product exist in cart
                       let index = cartData.findIndex(product => product.product_id === newRowData.product_id);
                       cartData[index] = {
                           ...newRowData,
                           total: newTotal
                       }

                   } else {
                       cartData.push({
                           ...newRowData,
                           total: newTotal
                       });
                   }
                   const totalPrice = cartData.map(product => product.total).reduce((prev, next) => prev + next)
                   $("#cartTotal").text(totalPrice)
               }

               $('body').on('click', '.delete', function() {
                   if (confirm("Delete Record?") == true) {
                       var id = $(this).data('id');
                       // ajax
                       $.ajax({
                           type: "POST",
                           url: "{{ url('delete-sale-product') }}",
                           data: {
                               id: id
                           },
                           dataType: 'json',
                           success: function(res) {
                               var oTable = $('#datatable-crud').dataTable();
                               oTable.fnDraw(false);
                           }
                       });
                   }
               });
               $('#filterTrashed').click(function() {
                   $('#datatable-crud').DataTable().draw(true)
               })
           });
       </script>
   </body>

   </html>

   {{-- @endsection --}}
