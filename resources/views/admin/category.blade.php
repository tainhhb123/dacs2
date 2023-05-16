<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
   
 <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font{
            font-size: 30px;
            padding: 0px 0px 40px 10px;
        }
        .input_color{
            color: black;
            font-family:sans-serif, Arial;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 20px;
            border: 2px solid green;
        }
        input.btn.btn-primary{
            height: 42px;
            width: 120px;
            padding-left: 10px;
            margin-left: 10px;
        }
        input.btn.btn-primary:hover{
            color:rgb(12, 211, 12);
        }

        
        h1.h1_font{
            font-size: 35px;
            padding-bottom:  30px;
            font-weight: bold;
            color: aliceblue;
        }

        table,tr,td{
            border: 1px solid green;
        }
        td{
            padding: 6px 0;
        }
        td.title{
            padding: 6px 0;
            font-weight: bold;
            font-size: 17px;
            color: rgb(146, 255, 96);
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

                {{-- thông báo thêm dữ liệu thành công --}}
                @if(session()->has('message_add'))
                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                        {{session()->get('message_add')}}
                    </div>
                @endif

                {{-- thông báo xóa dữ liệu thành công --}}
                @if(session()->has('message_delete'))
                <div class="alert alert-danger">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message_delete')}}
                </div>
            @endif

                <div class="div_center"> 
                    <h1 class="h1_font">Add Category</h1>
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="category" placeholder="Write category name">
    
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>

                    <table class="center">
                        <tr>
                            <td class="title">Category Name</td>
                            <td class="title">Action</td>
                        </tr>

                        @foreach ($data as $data)
                            
                        

                        <tr>
                            {{-- lấy dữ liệu từ category_name trong mysql  --}}

                            <td>{{$data->category_name}}</td>
                            <td>
                                <a onclick="return confirm('Are you sure to delete')" class="btn btn-danger" href="{{url('delete_category', $data->id)}}">Delete</a>
                            </td>
                        </tr>

                        @endforeach

                    </table>

                </div>
               
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
   
    <!-- End custom js for this page -->
  </body>
</html>