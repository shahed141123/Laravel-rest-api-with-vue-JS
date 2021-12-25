@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('product.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
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
                <h3 class="card-title text-center" style="float: none">Add Product Form</h3>


            </div>

            <form method="post" action="{{route('product.store')}}">
                @csrf
              <div class="card-body">


                    <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Product Name <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                      <label for="cat_id">Category <span class="text-danger">*</span></label>
                      <select name="cat_id" id="cat_id" class="form-control">
                          <option value=""> --Select any category-- </option>
                          @foreach($categories as $key=>$cat_data)
                              <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group d-none" id="child_cat_div">
                      <label for="child_cat_id">Sub Category</label>
                      <select name="child_cat_id" id="child_cat_id" class="form-control">
                          <option value=""> --Select any category-- </option>
                          {{-- @foreach($parent_cats as $key=>$parent_cat)
                              <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
                          @endforeach --}}
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="brand_id">Brand<span class="text-danger">*</span></label>
                      {{-- {{$brands}} --}}

                      <select name="brand_id" class="form-control">
                          <option value="">--Select Brand--</option>
                        @foreach($brands as $brand)
                          <option value="{{$brand->id}}">{{$brand->title}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="vendor_id">Vendor<span class="text-danger">*</span></label>


                      <select name="vendor_id" class="form-control">
                          <option value="">--Select Vendor--</option>
                        @foreach(\App\Models\User::where('role','vendor')->get() as $vendor)
                          <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Product Summary</label>
                            <textarea class="form-control" rows="3" placeholder="Enter Short Summary" name="summary"> </textarea>
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
                            <textarea class="form-control" rows="6" placeholder="Enter Long Description" value="{{ old('description') }}" name="description"> </textarea>
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
                            <textarea class="form-control" rows="8" placeholder="Enter Long Description" name="additional_info" value="{{ old('additional_info') }}"> </textarea>
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
                            <textarea class="form-control" rows="8" placeholder="Enter Long Description" name="return_cancellation" value="{{ old('return_cancellation') }}"> </textarea>
                                @error('return_cancellation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        </div>
                    </div>



                <div class="form-group">
                    <label for="thumbnail">Photo <span class="text-danger">*</span>  (Suggestion: use better resolution(1600px*1600px) for better zoom)</label>
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

                <div class="form-group">
                  <label for="stock">Stock Limit(Quantity)<span class="text-danger">*</span></label>
                  <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{old('stock')}}" class="form-control">
                  @error('stock')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                {{-- <div class="form-group">
                  <label for="size">Size <span class="text-danger">*</span></label>
                  <select name="size" class="form-control show-tick"  multiple-data-live-search="true">
                      <option value="">--Select any size--</option>
                      <option value="S">Small (S)</option>
                      <option value="M">Medium (M)</option>
                      <option value="L">Large (L)</option>
                      <option value="XL">Extra Large (XL)</option>
                  </select>
                </div> --}}

                <div class="form-group">
                  <label for="price" class="col-form-label">Price(TK) <span class="text-danger">*</span></label>
                  <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
                  @error('price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="discount" class="col-form-label">Discount(%)</label>
                  <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{old('discount')}}" class="form-control">
                  @error('discount')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="selectQty">Product Sell in Per Quantity: <span class="text-danger">*</span></label><br>
                                    {{-- <input class="form-control" type="text" name="size" placeholder="Eg. S,L,M,XL"> --}}
                    <select name="qty_in" id="selectQty">
                        <option selected value="Ps">Piece</option>
                        <option value="Kg">KiloGram</option>
                        <option value="Pr">Pair</option>
                        <option value="L">Litre</option>
                    </select>
                        @error('qty_in')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="condition">Condition<span class="text-danger">*</span></label>
                    <select name="condition" class="form-control">
                        <option value="">--Select Condition--</option>
                        <option value="new">New</option>
                        <option value="popular">Popular</option>
                        <option value="winter">Winter</option>
                        <option value="recycled">Recycled</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="inputFeatured">Featured<span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_featured" value="1" id="flexRadio1">
                        <label class="form-check-label" for="flexRadio1">
                            Yes
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_featured" value="0" id="flexRadiot2" checked>
                        <label class="form-check-label" for="flexRadio2">
                            No
                        </label>
                    </div>
                    @error('is_featured')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                </div>



                <div class="form-group">
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
     $('#lfm').filemanager('image');
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
