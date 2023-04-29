<!DOCTYPE html>
<html>

  <head> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
   integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>


   @include('admin.css')


<style type="text/css">
    .title_des
    {
        font-size:30px;
        font-weight:bold;
        color: white;
        padding: 30px;
        text-align:center;
    }

    .table_des
    {
        border:1px solid white;
        width: 80%;
        text-align: center;
        margin-left: 70px;
    }

    .th_des
    {
        background-color: skyblue;

    }

    .img_des
    {
        height:100px;
        width:100px;
        padding:10px;

    }
</style>

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
            @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
     
      <div class="page-content">

      @if(session()->has('message'))

      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

        {{session()->get('message')}}


      </div>

      @endif

            <h1 class="title_des">All Post</h1>


            <table class="table_des">
                <tr class="th_des">
                    <th>Post Title</th>
                    <th>Post Description</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>UserType</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>


                @foreach($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td>
                        <img src="postimage/{{$post->image}}" alt="" class="img_des">
                    </td>
                    <td>
                        <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>

                    <td>
                        <a href="{{url('edit_page', $post->id)}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @endforeach



            </table>






      </div>

 
                @include('admin.footer')

                <script type="text/javascript">

            function confirmation(ev)
            {
                ev.preventDefault();

                var urlToRedirect=ev.currentTarget.getAttribute('href');

                console.log( urlToRedirect);

                swal({

                    title: "Are You sure To Delete" , 

                    text: "You wont be able to revert this action" ,

                    icon: "warning" ,

                    buttons: true,

                    dangerMode: true,


                })

                .then((willCancel)=>
                
                {
                        if(willCancel)
                        {
                            window.location.href= urlToRedirect;
                        }
                });

                
            }

                </script>
  </body>
</html>