@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add About Us</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('about.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>About</a>

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


        <form method="POST" action="{{route('about.store')}}">
            @csrf
            <div class="card-body">





                <div class="mb-3">
                    <label for="mytextarea">About Description</label>
                    <textarea id="mytextarea" name="about">{{old('description')}}</textarea>
                     @error('about')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>

                <div class="mb-3">
                    <label for="thumbnail">Photo <span class="text-danger">*</span></label>
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
  @endsection
