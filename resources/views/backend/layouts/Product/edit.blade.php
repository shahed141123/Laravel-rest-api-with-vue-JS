@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Resource</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('product.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Resource List">
            <i class="fas fa-eye"></i>Resource List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="row">
         <div class="col-md-12">
            @include('backend.partials.notifications')
         </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="card">
              <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Edit Resource Form</h3>


            </div>

            <form method="post" action="{{route('product.update',$product->id)}}">
                @csrf
                 @method('PATCH')
              <div class="card-body">


                    <div class="mb-3">
                        <label for="inputTitle" class="col-form-label">Resource Name <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$product->title}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                      <label for="cat_id">Category <span class="text-danger">*</span></label>
                      <select name="cat_id" id="cat_id" class="form-control">
                          <option value="">--Select any category--</option>
                          @foreach($categories as $key=>$cat_data)
                              <option value='{{$cat_data->id}}' {{(($product->cat_id==$cat_data->id)? 'selected' : '')}}>{{$cat_data->title}}</option>
                          @endforeach
                      </select>
                    </div>
                    @php
                      $sub_cat_info=DB::table('categories')->select('title')->where('id',$product->child_cat_id)->get();
                    // dd($sub_cat_info);

                    @endphp
                    {{-- {{$product->child_cat_id}} --}}
                    <div class="mb-3 {{(($product->child_cat_id)? '' : 'd-none')}}" id="child_cat_div">
                      <label for="child_cat_id">Sub Category</label>
                      <select name="child_cat_id" id="child_cat_id" class="form-control">
                          <option value="">--Select any sub category--</option>

                      </select>
                    </div>




                    <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="mb-3">
                        <label>Summary (Not more than 100 words) </label>
                            <textarea class="form-control" rows="4" name="summary">{{$product->summary}}</textarea>
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
                            <textarea class="form-control" rows="10" name="description">{{$product->description}}</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail">Photo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                            @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>



                <div class="mb-3">
                    <label for="inputStatus">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" {{(($product->status=='active') ? 'checked' : '')}} id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Active
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive" {{(($product->status=='inactive') ? 'checked' : '')}} id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Inactive
                        </label>
                    </div>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                </div>

                    <div class="mb-3">
                        <label for="thumbnail">PDF <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                            <a id="lfm1" data-input="thumbnail1" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail1" class="form-control" type="text" name="file" value="{{$product->file}}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                            @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>



              </div>
                <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-success" type="submit">Submit</button>
      </div>
      </form>
    </section>
    <!-- /.content -->
</div>





  @endsection

  @section('scripts')
    <script>
     $('#lfm1').filemanager('file');
    </script>

    <script>
     $('#lfm').filemanager('image');



    </script>





<script>
  var  child_cat_id='{{$product->child_cat_id}}';
        // alert(child_cat_id);
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                // ajax call
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(response){
                        if(typeof(response)!='object'){
                            response=$.parseJSON(response);
                        }
                        var html_option="<option value=''>--Select any one--</option>";
                        if(response.status){
                            var data=response.data;
                            if(response.data){
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected ' : '')+">"+title+"</option>";
                                });
                            }
                            else{
                                console.log('no response data');
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

        });
        if(child_cat_id!=null){
            $('#cat_id').change();
        }
</script>
  @endsection
