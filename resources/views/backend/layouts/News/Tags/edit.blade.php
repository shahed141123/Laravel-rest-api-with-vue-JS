@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <section class="content-header mt-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            {{-- <h1>Edit news Tags</h1> --}}
          </div>
          <div class="col-sm-3">
           <a href="{{route('news-tags.index')}}" class="btn btn-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>News Tags List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
             <div class="card-header bg-dark" >
                <h5 class="card-title text-center" style="float: none">News Tags Edit Form</h5>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('news-tags.update',$tag->id)}}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="inputTitle" class="col-form-label">News Tags Title <span class="text-danger">*</span></label>
                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$tag->title}}" class="form-control">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputStatus">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($tag->status=='active') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Active
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($tag->status=='inactive') ? 'checked' : '')}}>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Inactive
                                </label>
                            </div>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-3"></div>
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

