@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mt-3 mb-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h5>Add Post</h5>
          </div>
          <div class="col-sm-2">
           <a href="{{route('blog-post.index')}}" class="btn btn-primary float-right rounded-pill" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="bx bx-eye"></i>Blog Post List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="card">

    <div class="card-body">
      <form method="post" action="{{route('blog-post.store')}}">
        @csrf
        <div class="mb-4">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="mytextarea" class="col-form-label">Quote</label>
          <textarea class="form-control" name="quote">{{old('quote')}}</textarea>
          @error('quote')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="inputTitle" class="col-form-label">Quote Source </span></label>
          <input id="inputTitle" type="text" name="quote_source" placeholder="Enter Name"  value="{{old('quote_source')}}" class="form-control">
          @error('quote_source')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label>Summary (Not more than 100 words) <span class="text-danger">*</span></label>
           <textarea class="form-control" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label>Post Description <span class="text-danger">*</span></label>
            <textarea id="descri" class="form-control" name="description" rows="18">{{old('description')}}</textarea>

          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="cat_id">Post Category <span class="text-danger">*</span></label>
          <select name="cat_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($categories as $key=>$data)
                  <option value='{{$data->id}}'>{{$data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="mb-4">
            <label >Post Tags</label>
            {{-- <select class="select2" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;"> --}}
            <select name="tags" class="form-control">>

                @foreach($tags as $key=>$data)
                    <option value='{{$data->title}}'>{{$data->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
          <label for="added_by">Author</label>
          <select name="added_by" class="form-control">
              <option value="">--Select any one--</option>
              @foreach($users as $key=>$data)
                <option value='{{$data->id}}' {{($key==0) ? 'selected' : ''}}>{{$data->name}}</option>
            @endforeach
          </select>
        </div>
        
        <div class="mb-4">
          <label for="inputTitle" class="col-form-label">Author Name On Your Own Choice</label>
          <input id="inputTitle" type="text" name="author" placeholder="Enter Author Name"  value="{{old('author')}}" class="form-control">
          @error('author')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        
        <div class="mb-4">
          <label for="inputPhoto" class="col-form-label">Post Header Photo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-4">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-4 mb-3 mr-3 ml-3">
          <button type="reset" class="btn btn-warning mr-3">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>


@endsection


@section('scripts')


<script>
    $('#lfm').filemanager('image');

    
    

</script>
@endsection
