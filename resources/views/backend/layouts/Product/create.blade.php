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
                                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i></a>
                                                        <form method="post" action="{{route('product.destroy',[$product->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$product->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
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

                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="mb-3">
                                                <label>Summary (Not more than 100 words) <span class="text-danger">*</span></label>
                                                <textarea id="summary" name="summary">{{old('summary')}}</textarea>
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
                                                <textarea id="description" name="description">{{old('description')}}</textarea>
                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>

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
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write detail Summary.....",
          tabsize: 2,
          height: 100
      });
    });
    // $('#summernote').summernote()
    $(document).ready(function() {
      $('#description').summernote({
       placeholder: "Write detail Description.....",
          tabsize: 2,
          height: 350
      });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write detail Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    // $('select').selectpicker();

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
