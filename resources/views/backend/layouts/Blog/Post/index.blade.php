@extends('backend.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mt-3 mb-3">
      <div class="container-fluid">

        <div class="row" >
          <div class="col-md-10">
            <h4>Blog Posts</h4>
          </div>
          <div class="col-md-2">
           <a href="{{route('blog-post.create')}}" class="btn btn-warning rounded-pill float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="bx bx-plus"></i> Add Post</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-10">

            <!-- /.card -->

            <div class="card">
              <div class="card-header bg-dark" >
                <h5 class="card-title text-center" style="float: none">Total Posts : {{\App\Models\BlogPost::count()}}&nbsp;( Active : {{\App\Models\BlogPost::where('status','active')->count()}} )</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 @if(count($posts)>0)
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Author</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($posts as $post)
                            @php
                            $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                            $cat_info=\App\Models\BlogCategory::where('id',$post->cat_id)->first();
                            @endphp
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$cat_info->title}}</td>
                                <td>{{$post->tags}}</td>

                                <td>
                                    @if($post->added_by != 0)
                                @foreach($author_info as $data)
                                    {{$data->name}}
                                @endforeach
                                @else
                                    {{ucfirst($post->author)}}
                                @endif
                                </td>
                                <td>
                                    @if($post->photo)
                                        <img src="{{$post->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$post->photo}}">
                                    @else
                                        <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                    @endif
                                </td>
                                <td>
                                    @if($post->status=='active')
                                        <span class="badge rounded-pill bg-success">{{$post->status}}</span>
                                    @else
                                        <span class="badge rounded-pill bg-danger">{{$post->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('blog-post.edit',$post->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i></a>
                                <form method="POST" action="{{route('blog-post.destroy',[$post->id])}}">
                                @csrf
                                @method('delete')
                                    <button class="btn btn-danger btn-sm dltBtn" data-id={{$post->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                    {{-- {{ $products->links() }} --}}
                    @else
                      <h6 class="text-center">No Blogs found!!! Please create Blog</h6>
                    @endif


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <!-- /.card-body -->






          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

@endsection









  @section('scripts')





    <script>
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();
      $.ajax({
          url:"{{route('post.status')}}",
          type:"POST",
          data:{
              _token:'{{csrf_token()}}',
              mode:mode,
              id:id,
          },
          success:function (response) {
              if (response.status) {
                  alert(response.msg);
              }
              else{
                  alert('Please Try Again!');
              }
          }

      })

     })
    </script>

    <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                        swal("Your File has been deleted!", {
                          icon:"success",
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
    </script>


@endsection
