<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
       
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
     

      <!-- why section -->
  
      <!-- product section -->
      @include('home.product_view')
      <!-- end product section -->

      {{-- Comment and reply  --}}

      <div>
         <h1>Comments</h1>
         <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea name="comment" id="" cols="10" rows="5" placeholder="Comment something here">

            </textarea>
            <br>
            <input type="submit" value="comment" class="btn btn-primary">
         </form>
      </div>

      <div>
         <h1>All Comment</h1>

        @foreach ($comment as $comment)
         <div>
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>
            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
         </div>

         @foreach ($reply as $rep)
             @if($rep->comment_id==$comment->id)
             <div style="padding-left: 10px">
               <b>{{$rep->name}}</b>
               <p>{{$rep->reply}}</p>
               <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

             </div>
             @endif
         @endforeach
        @endforeach

      
      </div>

      <div class="replyDiv" style="display: none">
         <form action="{{ url('add_reply')}}" method="POST">
            @csrf
         <input type="text" id="commentId" name="commentId" hidden="">

         <textarea name="reply" id="" cols="30" rows="10"></textarea>
         <button type="submit" class="btn btn-warning">Reply</button>
         <a href="javascript::void(0)" class="btn" onclick="reply_close(this)" >Close</a>
      </form>

      </div>

      {{-- End comment and reply  --}}



      <!-- footer start -->
    @include('home.footer');
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto"> <a href="https://html.design/">It is our responsibility to give you the best experience</a><br>
         
            <a href="https://themewagon.com/" target="_blank"></a>
         
         </p>
      </div>

      <script>
         function reply(caller){
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }

         function reply_close(caller){
           
            $('.replyDiv').hide();
         }
      </script>
       <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>