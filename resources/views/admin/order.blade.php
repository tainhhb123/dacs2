<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    
    <style>
        .material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
        .center{
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 40px;
    }
    table{
        width: 100%;
    }
    table,th,td{
        border: 2px solid green;
        border-collapse: collapse;
        padding: 5px 3px;
    }
    .title_deg{
        text-align: center;
        font-size: 35px;
        font-family: Arial, Helvetica, sans-serif;
        padding-top: 10px;
        letter-spacing: 3px;
        color: green;
        font-weight: bold;
     
    }

    .img_size{
        width: 120px;
        height: 70px;
    }
    .th_color{
        background: #E6E6FA;
        color: green;
    }
    .td_color{
        color: #E6E6FA;
    }

    #delivery_status_processing{
        background-color: tomato;
        padding: 4px;
       border-radius: 7px;
    }
    #delivery_status_delivered{
        background-color: forestgreen;
        padding: 4px;
       border-radius: 7px;
    }
    #delivered{
        background-color: forestgreen;
        border-radius: 7px;
        padding: 4px;
    }
    input[type=text]{
        color: black;
    }
    .search_order{
        float: right;
        padding: 17px 0px;
    }

    .material-symbols-outlined {
    font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 48
    }
    #search_icon{
        background-color: #008f00;
   
        padding: 2px 13px 15px 5px;
    }
    #search_icon:hover{
        background-color: greenyellow;
    }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

            
                
                <h2 class="title_deg">All Orders</h2>

                <div>
                    <form action="{{url('search')}}" method="GET">

                        @csrf

                        <div class="search_order">
                            <input type="text" name="search" placeholder="Search..." value="">
                            <input id="search_icon" class="material-symbols-outlined" type="submit" value="search" class="btn btn-outline-primary" name="" id="">
                        </div>
                    </form>
                </div>

                <table class="center">
                    <tr class="th_color">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Print PDF</th>
                        <th>Send Email</th>
                    </tr>

                    @forelse ($order as $order)
                            
                        <tr class="td_color">
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>
                              
                              
                                @if ($order->delivery_status=='Processing') 
                                    <span id="delivery_status_processing">{{$order->delivery_status}}</span>
                                
                                @else
                                    <span id="delivery_status_delivered">{{$order->delivery_status}}</span>
                                @endif

                            </td>
                         
                            <td>
                                <img class="img_size" src="/product/{{$order->image}}" alt="">
                            </td>
                            <td>
                                @if ($order->delivery_status=='Processing')

                                <a href="{{ url('delivered', $order->id) }}" onclick="return confirm('Are you sure this product is delivered !!!')" class="btn btn-primary">Delivered</a>

                                @else 

                                 <p id="delivered">Delivered</p>

                                 @endif

                            </td>

                            <td>
                                <a href="{{url('print_pdf', $order->id)}}"><i class="material-icons" style="font-size:36px">assignment_returned</i></a>
                            </td>

                            <td>
                                <a href="{{ url('send_email',$order->id) }}">
                                    <span class="material-symbols-outlined">send</span>
                                </a>
                            </td>
                        </tr>

                        @empty
                            <tr>
                                <td colspan="16">
                                    No Data Found
                                </td>
                            </tr>
                       

                    @endforelse
               
                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'><i class='fab fa-500px' style='font-size:24px'></i></script>
    <!-- End custom js for this page -->
  </body>
</html>