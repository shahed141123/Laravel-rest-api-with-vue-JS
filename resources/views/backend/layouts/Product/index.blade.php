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
                            <li class="breadcrumb-item active" aria-current="page">Resource Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Resource Table (Total Resources : {{\App\Models\Product::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @if(count($products)>0)
                                            @foreach($products as $product)

                                                <tr>


                                                    <td>
                                                        @if($product->photo)
                                                            <img src="{{$product->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$product->title}}">
                                                        @else
                                                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                                                        @endif
                                                    </td>
                                                    <td>{{$product->title}}</td>
                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" name="toggle" value="{{$product->id}}" {{$product->status=='active' ? 'checked' : ''}} >
                                                            <span class="slider round"></span>
                                                        </label>

                                                    </td>



                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="Show Product" data-bs-toggle="modal" data-bs-target="#productID{{$product->id}}"><i class="bx bx-bullseye"></i></a>
                                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i></a>
                                                        <form method="post" action="{{route('product.destroy',[$product->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$product->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                                
                                                
                                                
                                        <div class="modal fade" id="productID{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

                            @php
                            $product=\App\Models\Product::where('id', $product->id)->first();
                            @endphp

                    <div class="modal-content" >
                        <div class="modal-header text-center">
                            <h4 class="modal-title" style="float: none"><h3><strong>Resource Details</strong></h3> <br></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row mt-0 text-center mb-3">
                                    <div class="col-md-12">
                                        <h5>Title:</h5>
                                        <h5>{{$product->title}}

                                        </h5>

                                    </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 2rem">
                                    <div class="col-md-12">
                                        <h5>Summary:</h5>
                                        <h6>{!! html_entity_decode($product->summary) !!}</h6>

                                    </div>
                                    </div>
                                    <div class="row " style="margin-bottom: 2rem">
                                    <div class="col-md-12">
                                        <h5>Resource Description:</h5>
                                        <h6>{!! html_entity_decode($product->description) !!}</h6>

                                    </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 2rem">
                                        <div class="col-md-6" style="margin-bottom: 1rem">
                                        <h5>Resource Category:</h5>
                                        <h5>{{\App\Models\Category::where('id', $product->cat_id)->value('title')}}</h5>

                                        </div>
                                        <div class="col-md-6">
                                            @if ($product->child_cat_id)

                                                    <h5>Resource Sub-Category:</h5>
                                                    <h6>{{\App\Models\Category::where('id', $product->child_cat_id)->value('title')}}</h6>


                                                    @else
                                                @endif
                                        </div>

                                    </div>



                                    <div class="row" style="margin-bottom: 2rem">

                                        <div class="col-md-6">
                                            <h5>Status:</h5>
                                            <h5>
                                                @if($product->status=='active')
                                                    <span class="badge rounded-pill bg-success" style="font-size: large">{{$product->status}}</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger" style="font-size: large">{{$product->status}}</span>
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>PDF:</h5>
                                            <h5>
                                                @if($product->file)
                                                    <a class="btn btn-light" href="javascript:void(0);" title="Show Pdf" data-bs-toggle="modal" data-bs-target="#pdfID{{$product->id}}">Show</a>
                                                @else
                                                    <span class="badge rounded-pill bg-danger" style="font-size: larger">No PDF</span>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <!--  <button type="button" class="btn btn-outline-light">Save changes</button> -->
                        </div>
                    </div>
                            <!-- /.modal-content -->
            </div>
                        <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="pdfID{{$product->id}}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable" style="height: 600px">

                            @php
                            $data=\App\Models\Product::where('id', $product->id)->first();
                            @endphp

                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title" style="float: none"><h3><strong>PDF</strong></h3> <br></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <iframe src="{{ $data->file }}" frameborder="0" style="width: 100%; height: 700px"></iframe>



                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <!--  <button type="button" class="btn btn-outline-light">Save changes</button> -->
                        </div>
                    </div>
                            <!-- /.modal-content -->
            </div>
                        <!-- /.modal-dialog -->
        </div>         
                                                
                                                
                                                
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No Resource found!!! Please create Resource</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$products->links()}}</span>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-5">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Resource</h6>
                        <hr/>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Resource Name <span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                        <label for="cat_id">Category <span class="text-danger">*</span></label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value=""> --Select any category-- </option>
                                            @foreach($categories as $key=>$cat_data)
                                                <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
                                            @endforeach
                                        </select>
                                        </div>

                                        <div class="mb-3 d-none" id="child_cat_div">
                                        <label for="child_cat_id">Sub Category</label>
                                        <select name="child_cat_id" id="child_cat_id" class="form-control">
                                            <option value=""> --Select any category-- </option>
                                            {{-- @foreach($parent_cats as $key=>$parent_cat)
                                                <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
                                            @endforeach --}}
                                        </select>
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

                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="mb-3">
                                                <label>Summary (Not more than 100 words) <span class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="4" name="summary">{{old('summary')}}</textarea>
                                                @error('summary')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="mb-3">
                                                 <label>Resource Description</label>
                                                <textarea class="form-control" rows="10" name="description">{{old('description')}}</textarea>
                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="thumbnail">PDF</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm1" data-input="thumbnail1" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail1" class="form-control" type="text" name="file">
                                            </div>
                                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                                @error('file')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Resource Pdf <span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="file" name="file" value="{{old('file')}}" class="form-control">
                                            @error('file')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div> --}}

                                        <div class="mb-3">
                                            <label for="inputStatus">Status<span class="text-danger">*</span></label>
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

                                        <div class="row">
                                            <div class="col-12">
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
     $('#lfm').filemanager('image');
    </script>
    <script>
     $('#lfm1').filemanager('file');
    </script>

    <script>
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();
      $.ajax({
          url:"{{route('product.status')}}",
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
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        type:"POST",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id,
        },

        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endsection
