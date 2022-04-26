<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Autocomplete Search</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body{
      background: white;
      padding: 0 20px;
    }

    ::selection{
      color: #fff;
      background: white;
    }

    .wrapper{
      max-width: 450px;
      /* margin: 150px auto; */
    }

    .wrapper .search-input{
      background: white;
      width: 100%;
      border-radius: 5px;
      position: relative;
      box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    }

    .search-input input{
      height: 55px;
      width: 100%;
      outline: none;
      border: none;
      border-radius: 5px;
      padding: 0 60px 0 20px;
      font-size: 18px;
      box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    }

    .no-bullets {
        list-style-type: none;
    }

    .search-input.active input{
      border-radius: 5px 5px 0 0;
    }

    .search-input .autocom-box{
      padding: 0;
      opacity: 0;
      pointer-events: none;
      max-height: 280px;
      overflow-y: auto;
    }

    .search-input.active .autocom-box{
      padding: 10px 8px;
      opacity: 1;
      pointer-events: auto;
    }

    .autocom-box li{
      list-style: none;
      padding: 8px 12px;
      display: none;
      width: 100%;
      cursor: default;
      border-radius: 3px;
    }

    .search-input.active .autocom-box li{
      display: block;
    }
    .autocom-box li:hover{
      background: #efefef;
    }

    .search-input .icon{
      position: absolute;
      right: 0px;
      top: 0px;
      height: 55px;
      width: 55px;
      text-align: center;
      line-height: 55px;
      font-size: 20px;
      color: #644bff;
      cursor: pointer;

    }
    .TextOverride
    {
     color: black !important;
    }
    </style>



    </head>
   <body>
      <div class="container-fluid">
        <h2 class="text-center">Point Of Sale</h2>
        <div class="row">

            <div class="col-md-6">

            <h3 class="TextOverride" align="center">Add a Sale</h3>
        <div class="wrapper">
            <form name="auto_search" id="suggestion" method="post" action="{{route('search.list')}}">
            @csrf
            <div class="search-input">
              <a href="" target="_blank" hidden></a>
              <input type="text" class="form-control" placeholder="Search For Products..." id="search_text" name="search_keyword">
              <div id="suggesstion-box"></div>
              <div class="icon"><i class="fas fa-search"></i>
            </div>

            </div>
          </form>
          <br>
          <button class="btn btn-success">Add Product</button>
          </div>
<br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->selling_price}}</td>
                        <td>
                            {{-- <input type="number" id="quantity"> --}}
                        </td>
                        <td>


                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table bordered" style="background-color: black;color:white">
                <thead>
                    <?php
                            $total = 0;
                            $total = DB::table('sale_products')
                                ->selectRaw('quantity * price')
                                ->sum('total');
                            ?>
                    <tr>
                        <th style="font-size: 40px">Sub Total</th>
                        <th style="font-size: 40px">{{$total}}</th>
                    </tr>
                </thead>
            </table>
              </div>
              <div class="col-md-6">
                <h3 class="text-center">Mode of Payment</h3>
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

{{--
         <div class="card">
            <form>
               <div class="card-header">View Result</div>
               <div class="card-body">

                  <div class="row">
                     <div class="col-md-6">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" value="{{$data->name}}" readonly>
                     </div>
                     <div class="col-md-6">
                        <label for="price">Price :</label>
                        <input type="number" class="form-control" id="price" value="{{$data->selling_price}}" readonly>
                     </div>
                       {{-- <div class="col-md-3">
                        <label for="price">Add Quantity :</label>
                        <input type="number" class="form-control" id="quantity">
                     </div>
                       <div class="col-md-3">
                        <label for="total">Total Amount :</label>
                        <input type="number" class="form-control" id="price" value="{{$data->selling_price * $sale_products->quantity}}">
                     </div> --}}
                     {{-- <div class="col-md-6">
                        <label for="address">Address :</label>
                        <input type="text" id="title" class="form-control" value="{{$data->address}}" readonly>
                     </div>
               </div>
               </div>
         </div> --}}
         {{-- </form> --}}
      </div>

   </body>
</html>
