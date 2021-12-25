@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <section class="content-header mt-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            {{-- <h1>Edit Category</h1> --}}
          </div>
          <div class="col-sm-3">
           <a href="{{route('news-category.index')}}" class="btn btn-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="bx bx-eye"></i>News Category List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
             <div class="card-header bg-dark" >
                <h5 class="card-title text-center" style="float: none">News Category Edit Form</h5>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('news-category.update',$category->id)}}">
                @csrf
                @method('PATCH')



                 <div class="mb-4">
                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$category->title}}" class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>



                <div class="mb-4">
                    <label for="inputStatus">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($category->status=='active') ? 'checked' : '')}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Active
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($category->status=='inactive') ? 'checked' : '')}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Inactive
                        </label>
                    </div>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                </div>





            </div>

        </div>
        <div class="mb-4 mb-3 text-center">
                <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
    </section>
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

