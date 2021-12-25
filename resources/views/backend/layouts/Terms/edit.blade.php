@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Terms & Conditions Article</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('terms.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>Terms & Conditions</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
             <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Terms & Conditions Article Edit Form</h3>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('terms.update',$terms->id)}}">
                @csrf
                @method('PATCH')







                <div class="form-group">
                    <label for="description">Terms & Conditions Description</label>
                    <textarea id="description" name="terms"  >{{$terms->terms}} </textarea>
                     @error('terms')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>


            <div class="form-group">
                <label for="thumbnail">Photo <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-btn">
                       <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                         </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$terms->photo}}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                     @error('photo')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
            </div>


            </div>

        </div>
        <div class="form-group mb-3 text-center">
                <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
    </section>
</div>
@endsection

@section('scripts')


    <script>
        $('#lfm').filemanager('image');


        $(document).ready(function() {
            $('#description').summernote({
            placeholder: "Write detail Description.....",
                tabsize: 2,
                height: 350
            });
            });
    </script>
  @endsection
