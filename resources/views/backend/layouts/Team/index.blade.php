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
                            <li class="breadcrumb-item active" aria-current="page">Team Management Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Total Team Members : ( {{\App\Models\TeamMember::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Job Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @if(count($members)>0)
                                            @foreach($members as $member)

                                                <tr>

                                                    <td>
                                                    @if($member->photo)
                                                            <img src="{{$member->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$member->name}}">
                                                        @else
                                                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                                                        @endif
                                                    </td>
                                                    <td>{{$member->name}}</td>
                                                    <td>{{$member->job_title}}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="Show Member's Detail" data-bs-toggle="modal" data-bs-target="#caseID{{$member->id}}"><i class="bx bx-bullseye"></i></a>
                                                        <a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="Edit Member's Detail" data-bs-toggle="modal" data-bs-target="#editID{{$member->id}}"><i class="bx bx-edit"></i></a>
                                                        
                                                        <form method="post" action="{{route('team.destroy',[$member->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$member->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>



        <div class="modal fade" id="caseID{{$member->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">



                    <div class="modal-content" >
                        <div class="modal-header text-center">
                            <h4 class="modal-title" style="float: none"><h3><strong> Team Member's Details</strong></h3> <br></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row mt-0 text-center mb-3">
                                        <div class="col-md-12">
                                            <h5>Member Name:</h5>
                                            <h5>{{$member->name}}

                                            </h5>

                                        </div>
                                    </div>

                                    <div class="row mt-0 text-center mb-3">
                                        <div class="col-md-12">
                                            <h5>Designation:</h5>
                                            <h5>
                                                {{$member->email}}
                                            </h5>

                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 2rem">
                                        <div class="col-md-12">
                                            <h5>Twitter ID:</h5>
                                            <h6>{{$member->twitter}}</h6>

                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 2rem">
                                        <div class="col-md-12">
                                            <h5>Facebook ID:</h5>
                                            <h6>{{$member->facebook}}</h6>

                                        </div>
                                    </div>
                                    <div class="row " style="margin-bottom: 2rem">
                                        <div class="col-md-12">
                                            <h5>Linked IN</h5>
                                            <h6>{{$member->linked_in}}</h6>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <!--  <button type="button" class="btn btn-outline-light">Save changes</button> -->
                        </div>
                    </div>
                            <!-- /.modal-content -->
            </div>
                        <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="editID{{$member->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">



                    <div class="modal-content" >
                        <div class="modal-header text-center">
                            <h4 class="modal-title" style="float: none"><h3><strong> Edit Team Member's Details</strong></h3> <br></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                <form method="post" action="{{route('team.update',$member->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Member Name<span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{$member->name}}" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Member Job Title<span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="job_title" placeholder="Enter Job title"  value="{{$member->job_title}}" class="form-control">
                                            @error('job_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="inputEstimatedBudget">Member's Designation :</label>
                                            <input type="text" name="email" id="inputEstimatedBudget" class="form-control" placeholder="Enter Email Id" value="{{$member->email}}">
                                        </div>

                                        
                                        <div class="mb-3">
                                            <label for="inputEstimatedBudget">Member's Facebook Url</label>
                                            <input type="text" name="facebook" id="inputEstimatedBudget" class="form-control" placeholder="Enter Facebook" value="{{$member->facebook}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputEstimatedBudget">Member's Twitter Url</label>
                                            <input type="text" name="twitter" id="inputEstimatedBudget" class="form-control" placeholder="Enter Twitter" value="{{$member->twitter}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputEstimatedBudget">Member's Linked In Url</label>
                                            <input type="text" name="linked_in" id="inputEstimatedBudget" class="form-control" placeholder="Enter Linked IN" value="{{$member->linked_in}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="thumbnail">Member's Photo<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$member->photo}}">
                                            </div>
                                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                            <a href="#" class="btn btn-secondary">Cancel</a>
                                            <button class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <!--  <button type="button" class="btn btn-outline-light">Save changes</button> -->
                        </div>
                    </div>
                            <!-- /.modal-content -->
            </div>
                        <!-- /.modal-dialog -->
        </div>


                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No Team Member found!!! Please Add Member in your Team.</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$members->links()}}</span>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-5">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Team Members</h6>
                        <hr/>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('team.store')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Member Name<span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Member Job Title<span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="job_title" placeholder="Enter Job title"  value="{{old('job_title')}}" class="form-control">
                                            @error('job_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="inputEstimatedBudget">Member's Designation :<span class="text-danger">*</span></label>
                                            <input type="text" name="email" id="inputEstimatedBudget" class="form-control" placeholder="Enter Member's Designation">
                                        </div>

                                        
                                        <div class="mb-3">
                                            <label for="inputEstimatedBudget">Member's Facebook Url</label>
                                            <input type="text" name="facebook" id="inputEstimatedBudget" class="form-control" placeholder="Enter Facebook">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputEstimatedBudget">Member's Twitter Url</label>
                                            <input type="text" name="twitter" id="inputEstimatedBudget" class="form-control" placeholder="Enter Twitter">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputEstimatedBudget">Member's Linked In Url</label>
                                            <input type="text" name="linked_in" id="inputEstimatedBudget" class="form-control" placeholder="Enter Linked IN">
                                        </div>

                                        <div class="mb-3">
                                            <label for="thumbnail">Member's Photo<span class="text-danger">*</span></label>
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

                                        <div class="row">
                                            <div class="col-12">
                                            <a href="#" class="btn btn-secondary">Cancel</a>
                                            <button class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

        </div>




@endsection









  @section('scripts')

    

    <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                        swal("Your File has been deleted!", {
                          icon:"success",
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
    </script>

    <script>
     $('#lfm').filemanager('image');
    </script>

@endsection
