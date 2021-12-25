@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
                <div class="breadcrumb-title pe-3">Admin Section</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Home Page Link Section</li>

                        </ol>

                    </nav>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3"><a class="btn btn-outline-info px-5 radius-30 mb-5" href="{{route('about.index')}}">
                   <i class="bx bx-plus"></i> About</a></div>
            </div>

            <!--end breadcrumb-->


    <section class="content">
        <div class="card">

            <div class="card-body">
            <form method="POST" action="{{route('about.update',$about->id)}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf


                <div class="mb-5">
                    <label for="mytextarea" class="mb-3">About Description</label>
                    <textarea id="mytextarea" name="about">{{$about->about}}</textarea>
                     @error('about')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>


                <div class="mb-5">
                    <label for="thumbnail" class="mb-3">Photo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$about->photo}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>


            </div>

        </div>
                <div class="mb-5 text-center">
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
