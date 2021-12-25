@extends('backend.master')
@section('content')

        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admin Section</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Category Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Blog Category Table (Total Categories : {{\App\Models\BlogCategory::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($categories)>0)
                                            @foreach($categories as $category)

                                                <tr>
                                                    <td>{{$category->title}}</td>

                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" name="toggle" value="{{$category->id}}" {{$category->status=='active' ? 'checked' : ''}} >
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('blog-category.edit',$category->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%; margin-bottom:5px" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit-alt"></i></a>
                                                    <form method="post" action="{{route('blog-category.destroy',[$category->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$category->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No Blog categories found!!! Please create category</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$categories->links()}}</span>
                                </div>
                            </div>

                    </div>
                    <div class="col-md-5">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Blog Category</h6>
                        <hr/>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('blog-category.store')}}" enctype="multipart/form-data">
                                        @csrf


                                        <div class="mb-4">
                                            <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="inputStatus">Status</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Active
                                                </label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Inactive
                                                </label>
                                            </div>
                                            @error('status')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror

                                        </div>

                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-secondary">Cancel</a>&nbsp;
                                            <button class="btn btn-success" type="submit">Submit</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

        </div>

@endsection









  @section('scripts')



    <script>
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();
      $.ajax({
          url:"{{route('category.status')}}",
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
