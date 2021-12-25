@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header mt-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h4>Edit Post</h4>
          </div>
          <div class="col-sm-2">
           <a href="{{route('blog-post.index')}}" class="btn btn-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="blog-post List">
            <i class="fas fa-eye"></i>Blog Post List</a>

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
                <h5 class="card-title text-center" style="float: none">Edit Post Form</h5>
            </div>

            <form method="post" action="{{route('blog-post.update',$post->id)}}">
                @csrf
                 @method('PATCH')
                <div class="card-body">

                    <div class="mb-4">
                        <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$post->title}}" class="form-control">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mytextarea" class="col-form-label">Quote</label>
                        <textarea class="form-control" id="mytextarea" name="quote">{{$post->quote}}</textarea>
                        @error('quote')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="inputTitle" class="col-form-label">Quote Source </span></label>
                        <input id="inputTitle" type="text" name="quote_source" placeholder="Enter Name"  value="{{$post->quote_source}}" class="form-control">
                        @error('quote_source')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="mytextarea1" class="col-form-label">Summary <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="mytextarea1" name="summary">{{$post->summary}}</textarea>
                        @error('summary')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mytextarea2" class="col-form-label">Description</label>
                        <textarea class="form-control" id="mytextarea2" name="description">{{$post->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="post_cat_id">Category <span class="text-danger">*</span></label>
                        <select name="cat_id" class="form-control">
                            <option value="">--Select any category--</option>
                            @foreach($categories as $key=>$data)
                                <option value='{{$data->id}}' {{(($data->id==$post->cat_id)? 'selected' : '')}}>{{$data->title}}</option>
                            @endforeach
                        </select>
                    </div>
                        {{-- {{$post->tags}} --}}
                        @php
                                $post_tags=explode(',',$post->tags);
                                // dd($tags);
                            @endphp
                        <div class="mb-4">
                        <label for="tags">Tag</label>
                        <select name="tags" class="form-control">
                            <option value="">--Select any tag--</option>
                            @foreach($tags as $key=>$data)

                            <option value="{{$data->title}}"  {{(( in_array( "$data->title",$post_tags ) ) ? 'selected' : '')}}>{{$data->title}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-4">
                        <label for="added_by">Author</label>
                        <select name="added_by" class="form-control">
                            <option value="">--Select any one--</option>
                            @foreach($users as $key=>$data)
                                <option value='{{$data->id}}' {{(($post->added_by==$data->id)? 'selected' : '')}}>{{$data->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        
                        <div class="mb-4">
                          <label for="inputTitle" class="col-form-label">Author Name On Your Own Choice</label>
                          <input id="inputTitle" type="text" name="author" placeholder="Enter Author Name"  value="{{$post->author}}" class="form-control">
                          @error('author')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        
                        <div class="mb-4">
                        <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$post->photo}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <div class="mb-4">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{(($post->status=='active')? 'selected' : '')}}>Active</option>
                            <option value="inactive" {{(($post->status=='inactive')? 'selected' : '')}}>Inactive</option>
                        </select>
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
      <div class="row mb-3 ml-3">
        <div class="col-12 text-right mr-3 ml-3">
          <a href="#" class="btn btn-secondary mr-3">Cancel</a>
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
    
    


  @endsection
