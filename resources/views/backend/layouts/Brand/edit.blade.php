@extends('backend.master')
@section('content')

    <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Admin Section</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Home Page Links Section</li>
                        </ol>
                    </nav>
                </div>

        </div>

        <div class="card">
             <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Link Edit Form</h3>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')



                 <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Full Link URL (With https://) <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$brand->title}}" class="form-control">
                    @error('title')
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
                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$brand->photo}}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                     @error('photo')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
            </div>




              <div class="form-group">
                <label for="inputStatus">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($brand->status=='active') ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Active
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($brand->status=='inactive') ? 'checked' : '')}}>
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
        <div class="form-group mb-3 text-center">
                <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>

    </div>

@endsection

@section('scripts')

    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
