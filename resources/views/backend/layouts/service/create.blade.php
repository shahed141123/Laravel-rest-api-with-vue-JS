@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Lawyer box</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('law.box')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>Lawyer box List</a>

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
                <h3 class="card-title text-center" style="float: none">Lawyer box Form</h3>


            </div>

        <form method="post" action="{{route('lawyer-box.store')}}">
            @csrf
            <div class="card-body">


                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Lawyer box Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-sm-12">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Lawyer box Summary</label>
                        <textarea class="form-control" rows="5" placeholder="Enter Short Summary" name="summary"> </textarea>
                            @error('summary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Icon Code<span class="text-danger">*</span>&nbsp;&nbsp;
                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-icon"><span class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Icon List"></span></a></label>
                    <input id="inputTitle" type="text" name="icon" placeholder="Enter Icon"  value="{{old('icon')}}" class="form-control">
                    @error('icon')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Active
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Inactive
                        </label>
                    </div>
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
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-success" type="submit">Submit</button>
      </div>
      </form>
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-icon">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Icon List with Code</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
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
            <button type="button" class="btn btn-danger text-right" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



  @endsection

  @section('scripts')

  @endsection
