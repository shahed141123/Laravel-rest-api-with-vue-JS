@extends('backend.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header bg-dark" >
                <h5 class="card-title text-center" style="float: none">Manage Your Website Settings</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <section class="content">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-header">
                                <h5 class="card-title">Website Name</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget"> Name First Line</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->name}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget"> Name Second Line</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->short_name}}">
                                    </div>
                                    <div class="timeline-footer text-right">
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-name">Update</a>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                <h5 class="card-title">Website Address</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label>Address</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." readonly>{{$setting->address}}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget">Email</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->email}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget">Phone No:</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->phone}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget">Contact Hour</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->hour}}">
                                    </div>
                                    <div class="timeline-footer text-right">
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-address">Update</a>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                <h5 class="card-title">Website Logo</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{$setting->logo}}" alt="Website Logo" width="120px" height="120px">
                                        </div>

                                        <h5 class="profile-username text-center">Logo</h5>
                                    </div>
                                    <div class="timeline-footer text-right">
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-logo">Update</a>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                <h5 class="card-title">Website Favicon</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{$setting->favicon}}" alt="Website Favicon Icon" width="120px" height="120px">
                                        </div>

                                        <h5 class="profile-username text-center">Favicon Icon</h5>
                                    </div>
                                    <div class="timeline-footer text-right">
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-favicon">Update</a>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-header">
                                <h5 class="card-title">Social Links</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget">Facebook Url</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->facebook}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget">Twitter Url</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->twitter}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="inputEstimatedBudget">Linked In Url</label>
                                        <input type="text" readonly id="inputEstimatedBudget" class="form-control" value="{{$setting->linked_in}}">
                                    </div>
                                    <div class="timeline-footer text-right">
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-social">Update</a>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>


                    </div>
                </section>
                <!-- /.tab-content -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <!-- /.card-body -->





          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

        <div class="modal fade" id="modal-name">
           <div class="modal-dialog">
              <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Website Name</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('setting.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="inputEstimatedBudget"> Name First Line</label>
                            <input type="text" name="name" value="{{$setting->name}}" id="inputEstimatedBudget" class="form-control">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="inputEstimatedBudget"> Name Second Line</label>
                            <input type="text" name="short_name" value="{{$setting->short_name}}" id="inputEstimatedBudget" class="form-control">
                            @error('short_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
                </form>
              </div>
               <!-- /.modal-content -->
           </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-address">
           <div class="modal-dialog">
              <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Website Address</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('setting.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label>Address</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="Enter ...">{{$setting->address}}</textarea>
                             @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="inputEstimatedBudget">Email</label>
                            <input type="text" name="email" id="inputEstimatedBudget" class="form-control" value="{{$setting->email}}">
                             @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="inputEstimatedBudget">Phone No:</label>
                            <input type="text" name="phone" id="inputEstimatedBudget" class="form-control" value="{{$setting->phone}}">
                             @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="inputEstimatedBudget">Contact Hour</label>
                            <input type="text" name="hour" id="inputEstimatedBudget" class="form-control" value="{{$setting->hour}}">
                             @error('hour')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
                </form>
              </div>
               <!-- /.modal-content -->
           </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-logo">
           <div class="modal-dialog">
              <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Website Logo</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('setting.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="thumbnail">Logo <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="logo" value="{{$setting->logo}}">
                            </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                @error('logo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
                </form>
              </div>
               <!-- /.modal-content -->
           </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-favicon">
           <div class="modal-dialog">
              <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Website Favicon</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('setting.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="thumbnail">Favicon <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm1" data-input="thumbnail1" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail1" class="form-control" type="text" name="favicon" value="{{$setting->favicon}}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                @error('favicon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
                </form>
              </div>
               <!-- /.modal-content -->
           </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-social">
           <div class="modal-dialog">
              <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Website Name</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('setting.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="inputEstimatedBudget">Facebook Url</label>
                            <input type="text" name="facebook" id="inputEstimatedBudget" class="form-control" value="{{$setting->facebook}}">
                        </div>
                        <div class="mb-4">
                            <label for="inputEstimatedBudget">Twitter Url</label>
                            <input type="text" name="twitter" id="inputEstimatedBudget" class="form-control" value="{{$setting->twitter}}">
                        </div>
                        <div class="mb-4">
                            <label for="inputEstimatedBudget">Linked In Url</label>
                            <input type="text" name="linked_in" id="inputEstimatedBudget" class="form-control" value="{{$setting->linked_in}}">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
                </form>
              </div>
               <!-- /.modal-content -->
           </div>
               <!-- /.modal-dialog -->
        </div>
</div>



</div>



@endsection

@section('scripts')
    <script>
     $('#lfm').filemanager('image');
    </script>
    <script>
     $('#lfm1').filemanager('image');
    </script>
@endsection
