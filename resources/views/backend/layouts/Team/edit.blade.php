@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('product.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Product List">
            <i class="fas fa-eye"></i>Product List</a>

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
                <h3 class="card-title text-center" style="float: none">Edit Product Form</h3>


            </div>

            <form method="post" action="{{route('product.update',$product->id)}}">
                @csrf
                 @method('PATCH')
              <div class="card-body">


                    <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Product Name <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$product->title}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
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
                    <div class="form-group {{(($product->child_cat_id)? '' : 'd-none')}}" id="child_cat_div">
                      <label for="child_cat_id">Sub Category</label>
                      <select name="child_cat_id" id="child_cat_id" class="form-control">
                          <option value="">--Select any sub category--</option>

                      </select>
                    </div>


                    <div class="form-group">
                      <label for="brand_id">Brand</label>
                      {{-- {{$brands}} --}}

                      <select name="brand_id" class="form-control">
                          <option value="">--Select Brand--</option>
                        @foreach($brands as $brand)
                          <option value="{{$brand->id}}" {{(($product->brand_id==$brand->id)? 'selected':'')}}>{{$brand->title}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="vendor_id">Vendor</label>


                      <select name="vendor_id" class="form-control">
                          <option value="">--Select Vendor--</option>
                        @foreach(\App\Models\User::where('role','vendor')->get() as $vendor)
                          <option value="{{$vendor->id}}" {{(($product->vendor_id==$vendor->id)? 'selected':'')}}>{{$vendor->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Product Summary</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Long Description" name="summary">{{$product->summary}} </textarea>
                             @error('summary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="6" placeholder="Enter Long Description" name="description">{{$product->description}} </textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Additional information/Comparison with other Products</label>
                            <textarea class="form-control" rows="8" placeholder="Enter Long Description" name="additional_info" >{{$product->additional_info}} </textarea>
                                @error('additional_info')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Return/Cancellation Process Details</label>
                            <textarea class="form-control" rows="8" placeholder="Enter Long Description" name="return_cancellation" > {{$product->return_cancellation}}  </textarea>
                                @error('return_cancellation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        </div>
                    </div>

                <div class="form-group">
                    <label for="thumbnail">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                <div class="form-group">
                  <label for="stock">Stock Limit(Quantity)<span class="text-danger">*</span></label>
                  <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{$product->stock}}" class="form-control">
                  @error('stock')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="size">Size <span class="text-danger">*</span></label>
                  <select name="size" class="form-control show-tick"  multiple-data-live-search="true">
                      <option value="">--Select any size--</option>
                      <option value="S"  {{(($product->size=='S')? 'selected':'')}}>Small (S)</option>
                      <option value="M" {{(($product->size=='M')? 'selected':'')}}>Medium (M)</option>
                      <option value="L" {{(($product->size=='L')? 'selected':'')}}>Large (L)</option>
                      <option value="XL" {{(($product->size=='XL')? 'selected':'')}}>Extra Large (XL)</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="price" class="col-form-label">Price(TK) <span class="text-danger">*</span></label>
                  <input id="price" type="number" name="price" placeholder="Enter price"  value="{{$product->price}}" class="form-control">
                  @error('price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="discount" class="col-form-label">Discount(%)</label>
                  <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{$product->discount}}" class="form-control">
                  @error('discount')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="condition">Condition</label>
                    <select name="condition" class="form-control">
                        <option value="">--Select Condition--</option>
                        <option value="new" {{(($product->condition=='new')? 'selected':'')}}>New</option>
                        <option value="popular" {{(($product->condition=='popular')? 'selected':'')}}>Popular</option>
                        <option value="winter" {{(($product->condition=='winter')? 'selected':'')}}>Winter</option>
                        <option value="recycled" {{(($product->condition=='recycled')? 'selected':'')}}>Recycled</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="inputFeatured">Featured</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_featured" value="1" {{(($product->is_featured==1) ? 'checked' : '')}}  id="flexRadio1">
                        <label class="form-check-label" for="flexRadio1">
                            Yes
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_featured" value="0" {{(($product->is_featured==0) ? 'checked' : '')}} id="flexRadiot2" >
                        <label class="form-check-label" for="flexRadio2">
                            No
                        </label>
                    </div>
                    @error('is_featured')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                </div>



                <div class="form-group">
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

     <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
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
