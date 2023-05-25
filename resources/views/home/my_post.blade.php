<!DOCTYPE html>
<html lang="en">
   <head>
    @include('home.homecss')

    <style type="text/css">

        .post_deg
        {
            padding: 30px;
            text-align: center;
            background-color: black;

        }

        .title_deg
        {
            font-size:30px;
            font-weight:bold;
            padding: 15px;
            color: white;

        }

        .des_deg
        {
            font-size:18px;
            font-weight:bold;
            padding: 15px;
            color: whitesmoke;
        }

        .img_deg
        {
            height: 200px;
            width: 300px;
            padding: 30px;
            margin: auto;
        }


    </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

        @if(session()->has('message'))

        <div class="alert alert-success">

        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>

        {{session()->get('message')}}

        </div>



        @endif

        
        @foreach($data as $data)

        <div class="post_deg">
            <img src="/postimage/{{$data->image}}" alt="" class="img_deg">
            <h4 class="title_deg">{{$data->title}}</h4>
            <p class="des_deg">{{$data->description}}</p>
            <a onclick="return confirm('Sure To Delete?')" href="{{url('my_post_del', $data->id)}}" class="btn btn-danger">Delete</a>

        </div>

        @endforeach
        
        
      </div>
     
   
        @include('home.footer')  
   </body>
</html>