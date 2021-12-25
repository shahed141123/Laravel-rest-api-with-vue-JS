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
                            <li class="breadcrumb-item active" aria-current="page">Banner Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <h6 class="mb-0 pt-3 px-3 text-uppercase">Banner Edit Form</h6>
                        <hr/>
                <div class="card-body">
                    <form method="post" action="{{route('banner.update',$banner->id)}}" enctype="multipart/form-data">
                                @csrf
                            @method('PATCH')
                        <div class="mb-3">
                            <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$banner->title}}" class="form-control">
                            @error('title')
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
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                                @error('photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputStatus">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($banner->status=='active') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Active
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($banner->status=='inactive') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Inactive
                                </label>
                            </div>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                        </div>

                        <div class="mb-3">
                            <label for="inputStatus">Condition</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="banner" id="flexRadioDefault11" {{(($banner->condition=='banner') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault11">
                                    Banner
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="promo" id="flexRadioDefault22" {{(($banner->condition=='promo') ? 'checked' : '')}} >
                                <label class="form-check-label" for="flexRadioDefault22">
                                    Promotional
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="bg" id="flexRadioDefault33" {{(($banner->condition=='bg') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault33">
                                    Home Page Background
                                </label>
                            </div>
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="i3_big" id="flexRadioDefault44" {{(($banner->condition=='i3_big') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault44">
                                    I3 Banner Big
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="i3" id="flexRadioDefault55" {{(($banner->condition=='i3') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault55">
                                    I3 Banner Wide
                                </label>
                            </div> --}}
                            @error('condition')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="mb-3 mb-3 text-center">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
@endsection

  @section('scripts')

     <script>
        $('#lfm').filemanager('image');
    </script>

@endsection
