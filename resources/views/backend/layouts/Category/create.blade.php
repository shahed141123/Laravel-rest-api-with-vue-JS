@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('category.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>Category List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="card">
              <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Category Form</h3>


            </div>

        <form method="post" action="{{route('category.store')}}">
            @csrf
            <div class="card-body">


                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="summary">Category Summary</label>
                    <textarea id="summary" name="summary"> </textarea>
                     @error('summary')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>


                <div class="form-group">
                  <label for="is_parent">Is Parent</label><br>
                  <input type="checkbox" name='is_parent' id='is_parent' value='1' checked> Yes
                </div>
        {{-- {{$parent_cats}} --}}


                <div class="form-group d-none" id='parent_cat_div'>
                  <label for="parent_id">Parent Category</label>
                  <select name="parent_id" class="form-control">
                      <option value="">--Select any category--</option>
                      @foreach($parent_cats as $key=>$parent_cat)
                          <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
                      @endforeach
                  </select>
                </div>


            <div class="form-group">
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

            <div class="form-group">
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
  @endsection
