<style>
    form input[type=number] {
       width: 166px;
       margin: 25px 0px 25px 105px;
    }
 
    form input[type=submit] {
       width: 166px;
       margin-left: 105px;
    }
 </style>
 
 
 <section class="product_section layout_padding">
     <div class="container">
        <div class="heading_container heading_center">
      
 
           <div>
             <form action="{{ url('product_search_view')}}" method="GET">
                @csrf 
                <input type="text" name="search" placeholder="Search for something" value="">
                <input type="submit" value="search" name="" id="">
             </form>
           </div>
        </div>
 
 
 
        <div class="row">
 
 
          @foreach($product as $products)
 
 
           <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="box">
                 <div class="option_container">
                    <div class="options">
                       <a href="{{url('product_details',$products->id)}}" class="option1">
                       Product Details
                       </a>
                       <form action="{{url('add_cart', $products->id)}}" method="POST">
                         @csrf
                         <div class="row">
                            <div>
                               <input type="number" value="1" name="quantity" min="1">
                            </div>
                            <div>
                              <input  type="submit" value="Add to Cart">
                            </div>
                         </div>
                    
                       </form>
                    </div>
                 </div>
                 <div class="img-box">
                    <img src="product/{{$products->image}}" alt="">
                 </div>
                 <div class="detail-box">
                    <h5>
                       {{$products->title}}
                    </h5>
 
                    @if ($products->discount_price!=null)
                    <h6 style="color: red; font-weight: bold">
                      ${{$products->discount_price}}
                   </h6>
 
                   <h6 style="text-decoration: line-through">
                      ${{$products->price}}
                   </h6>
                   @else
                   <h6>
                      ${{$products->price}}
                   </h6>
 
                    @endif
                
                 </div>
              </div>
           </div>
          
     @endforeach
       <span style="padding-top: 20px">
             {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
       </span>
 
     </div>
  </section>