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
                <h6 class="mb-0 pt-3 px-3 text-uppercase">Category Edit Form</h6>
                        <hr/>
                <div class="card-body">
                    <form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$category->title}}" class="form-control">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="is_parent">Is Parent</label><br>
                            <input type="checkbox" name='is_parent' id='is_parent' value='1' {{(($category->is_parent==1)? 'checked' : '')}}> Yes
                        </div>
                        {{-- {{$parent_cats}} --}}
                        {{-- {{$category}} --}}

                        <div class="mb-3 {{(($category->is_parent==1) ? 'd-none' : '')}}" id='parent_cat_div'>
                            <label for="parent_id">Parent Category</label>
                            <select name="parent_id" class="form-control">
                                <option value="">--Select any category--</option>
                                @foreach($parent_cats as $key=>$parent_cat)

                                    <option value='{{$parent_cat->id}}' {{(($parent_cat->id==$category->parent_id) ? 'selected' : '')}}>{{$parent_cat->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail">Photo <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$category->photo}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                                @error('photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>

                        <div class="mb-3">
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


                        <div class="mb-3 text-center">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

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

