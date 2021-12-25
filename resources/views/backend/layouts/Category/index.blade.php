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
                            <li class="breadcrumb-item active" aria-current="page">Category Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Category Table (Total Categories : {{\App\Models\Category::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Title</th>

                                                <th>Is Parent</th>
                                                <th>Parent Category</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($categories)>0)
                                            @foreach($categories as $category)
                                                @php
                                                $cats=DB::table('categories')->select('title')->where('id',$category->parent_id)->get();
                                                // dd($parent_cats);

                                                @endphp
                                                <tr>
                                                    <td>{{$category->title}}</td>
                                                    <td>{{(($category->is_parent==1)? 'Yes': 'No')}}</td>
                                                    <td>
                                                        @foreach($cats as $cat)
                                                            {{$cat->title}}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if($category->photo)
                                                            <img src="{{$category->photo}}" class="img-fluid" style="max-width:80px" alt="{{$category->title}}">
                                                        @else
                                                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" name="toggle" value="{{$category->id}}" {{$category->status=='active' ? 'checked' : ''}} >
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%; margin-bottom:5px" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit-alt"></i></a>
                                                    <form method="post" action="{{route('category.destroy',[$category->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$category->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No categories found!!! Please create category</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$categories->links()}}</span>
                                </div>
                            </div>

                    </div>
                    <div class="col-md-5">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Category</h6>
                        <hr/>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                                        @csrf



                                        <div class="mb-3">
                                            <label for="inputTitle" class="form-label">Library Category Name <span class="text-danger">*</span></label>

                                            <input class="form-control form-control-lg mb-3" id="inputTitle" type="text" name="title" value="{{old('title')}}" placeholder="Enter Library Category Name" aria-label=".form-control-lg example">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>




                                        <div class="mb-3">
                                            <label for="is_parent" class="form-label">Is Parent</label><br>
                                            <input type="checkbox" name='is_parent' id='is_parent' value='1' checked> Yes
                                        </div>



                                        <div class="mb-5 form-group d-none" id="parent_cat_div">
                                            <label for="parent_id">Parent Category</label>
                                            @if ($parent_cats)
                                            <select name="parent_id" class="form-control">
                                                <option value="">--Select any category--</option>
                                                @foreach($parent_cats as $parent_cat)

                                                    <option value="{{$parent_cat->id}}">{{$parent_cat->title}}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>

                                        <div class="mb-3">
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

                                        <div class="mb-3">
                                            <label for="thumbnail">Photo</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="photo">
                                            </div>
                                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>




                                            <div class="col-md-5">
                                                <a href="#" class="btn btn-secondary">Cancel</a>
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

    <script>
        $('#is_parent').change(function(){
            var is_checked=$('#is_parent').prop('checked');
            // alert(is_checked);
            if(is_checked){
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val('');
            }
            else{
            $('#parent_cat_div').removeClass('d-none');
            }
        })
    </script>

    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
