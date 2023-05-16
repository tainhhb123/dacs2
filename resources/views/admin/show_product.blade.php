<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')

  <style type="text/css">
    .center{
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 40px;
    }
    table,th,td{
        border: 2px solid green;
        border-collapse: collapse;
        padding: 5px 20px;
    }
    .font_size{
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

    a.btn.btn-success{
        color:#E6E6FA;
        background-color: green;
    }
    a.btn.btn-success:hover{
        color:white;
        background-color: rgb(26, 190, 26);
    }
    button.btn.btn-success{
        color:#E6E6FA;
        background-color: green;
    }
    button.btn.btn-success:hover{
        color:white;
        background-color: rgb(26, 190, 26);
    }
    .modal-content{
        background-color: white;
    }
    #edit_admin_lable{
        color: black;
    }
    .form-group label{
        color: black;
        text-align: left;
    }
    div.modal-footer button.btn.btn-danger{
        background-color: rgb(231, 38, 38);
    }
    div.modal-footer button.btn.btn-danger:hover{
        background-color: rgb(255, 0, 0);
    }
    input.name.form-control{
        background-color: white;
        color: black;
    }
    #add_product span{
        text-align: right;
    }

  </style>
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    
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

                  {{-- thông báo xóa dữ liệu thành công --}}
                  @if(session()->has('message_delete_show_product'))
                  <div class="alert alert-danger">

                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                      {{session()->get('message_delete_show_product')}}
                  </div>
              @endif

                <h2 class="font_size">All Product</h2>

                  {{-- AddProduct --}}
                  <a href="" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddProductModal">Add</a>

                  {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                  </button> --}}

                  <!-- Modal -->
                  <div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div style="background-color: white" class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="modal-body">

                            <ul id="saveform_errList"></ul>

                              <div class="form-group mb-3">
                                  <label for="">Product Title</label>
                                  <input type="text" class="title form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Description</label>
                                  <input type="text" class="description form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Quantity</label>
                                  <input type="text" class="quantity form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Category</label>
                                  <input type="text" class="category form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Price</label>
                                  <input type="text" class="price form-control">
                              </div>
                              <div class="form-group mb-3">
                                  <label for="">Discount Price</label>
                                  <input type="text" class="discount_price form-control">
                              </div>
                           
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary add_product">Save changes</button>
                          </div>
                      </div>
                      </div>
                  </div>
                  {{-- EndAddProduct --}}

                {{-- <a href="" type="button" class="btn btn-success" id="add_product"><span>Add</span></a> --}}

                <div id="success_message_add_product"></div>

                <table class="center">
                    <tr class="th_color">
                        <th>Id Product</th>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($product as $product)

                    <tr class="td_color">
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>

                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>

                        <td>
                            {{-- <a class="btn btn-success" href="{{url('update_product', $product->id)}}">Edit</a> --}}
                         
                          {{-- <-- Button trigger modal --> --}}
                             
                          {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_admin_modal">
                                Edit
                            </button> --}}

                            {{-- EditProduct --}}

                            
                            <a href="{{url('update_product', $product->id)}}" type="button" class="edit_product btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_admin_modal">Edit</a>
                            <!-- Modal -->
                            <div class="modal fade" id="edit_admin_modal" tabindex="-1" aria-labelledby="edit_admin_lable" aria-hidden="true">
                                <div class="modal-dialog">
                                <div style="background-color: white" class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="edit_admin_lable">Edit Product</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div id="modal-body" class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="">Product Title</label>
                                            <input type="text" id="title" class="name form-control">  
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Description</label>
                                            <input type="text" class="name form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Quantity</label>
                                            <input type="text" class="name form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Category</label>
                                            <input type="text" class="name form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Price</label>
                                            <input type="text" class="name form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Discount Price</label>
                                            <input type="text" class="name form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="edit_product btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- EndEditProduct --}}
                        </td>

                        <td>
                            <a class="btn btn-danger" href="{{url('delete_product',$product->id)}}" onclick="return confirm('Are you sure delete')">Delete</a>
                        </td>

                        
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
   
    <!-- End custom js for this page -->

    <script>
        document.querySelector("#modal-body").addEventListener("click",(e)=>{
            target= e.target;
            if(target.classList.contains("edit")){
                selectedRow = target.parentElement.parentElement;
                document.querySelector("#title").value = selectedRow.children[0].textContent;
                // document.querySelector("#title").value = selectedRow.children[1].textContent;
                // document.querySelector("#title").value = selectedRow.children[2].textContent;
            }
        });
        // $(document).ready(function () {
        //     fetchproduct();
            // function fetchproduct() {
            //     $.ajax({
            //         type: "GET",
            //         url: "/fetch-product",
                    
            //         dataType: "json",
            //         success: function (response) {
            //             // $('tbody').html("");
            //             //console.log(response.product);
            //             $.each(response.product, function (key, item) { 
            //                  $('tbody').append(

            //                  );
            //             });
            //         }
            //     });
            // }
        

            // $(document).on('click','.edit_product', function (e) {
            //     e.preventDefault();
            //     var pro_id = $(this).val();
            //     // console.log(pro_id);
            //     $('#EditStudentModal').modal('show');
            // });

            // //biến document khi gặp sự kiện click sẽ hoạt động class add_product lấy từ button 
            // $(document).on('click', function (e) {
            //     e.preventDefault();
            //     // console.log("hello");
            //     var data = {
            //         //nếu cung cấp hàm val sẽ lấy các tệp đầu vào
            //         'title':$('.title').val(),
            //         'description':$('.description').val(),
            //         'category':$('.category').val(),
            //         'quantity':$('.quantity').val(),
            //         'price':$('.price').val(),
            //         'discount_price':$('.discount_price').val(),
            //     }
            //     // console.log(data);
            //     $.ajaxSetup({
            //        headers: {
            //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //          }
            //     });
                
            //     $.ajax({
            //         type: "POST",
            //         url: "/add_product_from_show",
            //         data: data,
            //         dataType: "json",
            //         success: function (response) {
            //             // console.log(response.errors.name);
            //             // nếu trạng thái phản hồi lại bằng 400
            //             if(response.status == 400){
            //                 //tải lần đầu tiên sẽ cho khung adđProduct trống
            //                 $('#saveform_errList').html("");

            //                 $('#saveform_errList').addClass('alert alert-danger');
            //                 //tạo vòng lặp nhận phản hồi lỗi
            //                 $.each(response.errors, function (key, err_values) { 
            //                     //danh sách lỗi
            //                      $('#saveform_errList').append('<li>'+err_values+'<li>');
            //                 });
            //              } 
            //              else{
            //                 $('#saveform_errList').html("");
            //                 $('#success_message_add_product').addClass('alert alert-success');
            //                 $('#success_message_add_product').text(response.message);
            //                 $('#AddProductModal').modal('hide');
            //                 $('#AddProductModal').find('input').val("");
            //                 fetchproduct();
            //              }
            //         }
            //     });
            // });
        // });
    </script>
  </body>
</html>