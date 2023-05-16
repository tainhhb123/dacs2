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
      <title>UT HOUSE</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
      <style>
         #all_comment{
            text-align: center;
            font-size: 3rem;
            padding: 30px 0;
            font-family: 'Playfair Display', serif;
         }
         .comment{
            background-color: #fff5fb;
            padding: 23px 37px;
            margin: 0 109px;
         }
         input.btn.btn-primary{
            margin-left: 0px;
         }
         hr{
            border: 26px solid rgba(0, 0, 0, 0.1);
            margin: -18px 0 31px -36px;
            width: 1079px;
         }
         .comment_reply{
            background-color: #fff5fb;
            padding: 23px 37px;
            margin: 0 109px;
         }
         .reply{
            background-color: #dee0e3;
            margin: 10px 28px 26px 46px;
            padding: 17px 0px 17px 35px;
            border-radius: 21px;
         }

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
       @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.new_arival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      {{-- Comment and reply  --}}

      <div class="comment">
         <h1>Comments</h1>
         <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea name="comment" id="" cols="10" rows="5" placeholder="Comment something here">

            </textarea>
            <br>
            <input type="submit" value="comment" class="btn btn-primary">
         </form>
      </div>

      <div class="comment_reply">
        <hr>

        @foreach ($comment as $comment)
         <div>
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>
            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
         </div>

         @foreach ($reply as $rep)
             @if($rep->comment_id==$comment->id)
             <div class="reply">
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
         <a href="javascript::void(0)" class="btn" onclick="reply_close(this)">Close</a>
      </form>

      </div>

      {{-- End comment and reply  --}}


      <!-- subscribe section -->
      @include('home.subscribe');
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client');
      <!-- end client section -->
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