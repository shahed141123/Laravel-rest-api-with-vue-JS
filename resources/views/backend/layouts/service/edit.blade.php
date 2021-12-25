@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <section class="content-header mt-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            {{-- <h1>Edit Lawyer Box</h1> --}}
          </div>
          <div class="col-sm-3">
           <a href="{{route('law.box')}}" class="btn btn-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="bx bx-happy-heart-eyes"></i>Lawyer Box List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
             <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Lawyer Box Edit Form</h3>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('lawyer-box.update',$box->id)}}">
                @csrf
                @method('PATCH')


                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                <div class="mb-3">
                    <label for="inputTitle" class="col-form-label">Lawyer Box Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$box->title}}" class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-sm-12">
                    <!-- textarea -->
                    <div class="mb-3">
                        <label>Lawyer box Summary</label>
                        <textarea class="form-control" rows="5" placeholder="Enter Short Summary" name="summary"> {{$box->summary}}</textarea>
                            @error('summary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputTitle" class="col-form-label">Icon Code<span class="text-danger">*</span>&nbsp;&nbsp;
                        <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-icon"><span class="bx bx-help-circle" data-toggle="tooltip" data-placement="top" title="Icon List"></span></a></label>
                    <input id="inputTitle" type="text" name="icon" placeholder="Enter Icon"  value="{{$box->icon}}" class="form-control">
                    @error('icon')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputStatus">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($box->status=='active') ? 'checked' : '')}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Active
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($box->status=='inactive') ? 'checked' : '')}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Inactive
                        </label>
                    </div>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                </div>
                </div>
                <div class="col-sm-3"></div>



            </div>

        </div>
        <div class="mb-3 mb-3 text-center">
                <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
    </section>
</div>


<div class="modal fade" id="modal-icon">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Icon List with Code</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Code</th>
                    <th>Icon</th>
                    <th>Code</th>
                    <th>Icon</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>fi fi flaticon-suitcase</td>
                        <td><h1><span class="fi fi flaticon-suitcase"></span></h1></td>
                        <td>fi fi flaticon-save-money</td>
                        <td><h1><span class="fi fi flaticon-save-money"></span></h1></td>
                    </tr>
                    <tr>
                        <td>fi fi flaticon-mortarboard</td>
                        <td><h1><span class="fi fi flaticon-mortarboard"></span></h1></td>
                        <td>fi fi flaticon-thief</td>
                        <td><h1><span class="fi fi flaticon-thief"></span></h1></td>
                    </tr>
                    <tr>
                        <td>fi fi flaticon-parents</td>
                        <td><h1><span class="fi fi flaticon-parents"></span></h1></td>
                        <td>fi fi flaticon-mace</td>
                        <td><h1><span class="fi fi flaticon-mace"></span></h1></td>
                    </tr>
                    <tr>
                        <td>fi fi flaticon-courthouse</td>
                        <td><h1><span class="fi fi flaticon-courthouse"></span></h1></td>
                        <td>fi fi flaticon-balance</td>
                        <td><h1><span class="fi fi flaticon-balance"></span></h1></td>
                    </tr>
                    <tr>
                        <td>fi fi flaticon-wounded</td>
                        <td><h1><span class="fi fi flaticon-wounded"></span></h1></td>
                        <td>{{-- fififlaticon-save-money --}}</td>
                        <td><h1><span class="{{-- fi fi flaticon-save-money --}}"></span></h1></td>
                    </tr>
                  </tbody>

                </table>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger text-right" data-bs-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@endsection

