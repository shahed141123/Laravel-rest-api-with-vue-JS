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
                            <li class="breadcrumb-item active" aria-current="page">Free Consultation Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-10">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Consultation Messages Table (Total Messages Pending: {{\App\Models\Consult::where('status','inactive')->count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Mobile Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($appointments)>0)
                                            @foreach($appointments as $appointment)

                                                <tr>
                                                    <td>{{$appointment->name}}</td>

                                                    <td>
                                                       {{$appointment->phone}}
                                                    </td>

                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" name="toggle" value="{{$appointment->id}}" {{$appointment->status=='active' ? 'checked' : ''}} >
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="Show Message" data-bs-toggle="modal" data-bs-target="#appointmentID{{$appointment->id}}"><i class="bx bx-bullseye"></i></a>
                                                        {{-- <a href="{{route('appointment.edit',$appointment->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%; margin-bottom:5px" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit-alt"></i></a> --}}
                                                    <form method="post" action="{{route('consult.destroy',[$appointment->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$appointment->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                                <div class="modal fade" id="appointmentID{{$appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">



                                                            <div class="modal-content" >
                                                                <div class="modal-header text-center">
                                                                    <h4 class="modal-title" style="float: none"><h3><strong>Free Consultation Message</strong></h3> <br></h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">

                                                                            <div class="row mt-0 text-center mb-3">
                                                                            <div class="col-md-12">
                                                                                <h5>Victim's Name:</h5>
                                                                                <h5>{{$appointment->name}}

                                                                                </h5>

                                                                            </div>
                                                                            </div>
                                                                            <div class="row" style="margin-bottom: 2rem">
                                                                            <div class="col-md-12">
                                                                                <h5>Message:</h5>
                                                                                <h6>{!! html_entity_decode($appointment->message) !!}</h6>

                                                                            </div>
                                                                            </div>


                                                                            <div class="row" style="margin-bottom: 2rem">
                                                                                <div class="col-md-6" style="margin-bottom: 1rem">
                                                                                <h5>Mobile No:</h5>
                                                                                <h6>{{ $appointment->phone }}</h6>

                                                                                </div>


                                                                            </div>



                                                                            <div class="row" style="margin-bottom: 2rem">

                                                                                <div class="col-md-6">
                                                                                    <h5>Status:</h5>
                                                                                    <h5>
                                                                                        @if($appointment->status=='active')
                                                                                            <span class="badge rounded-pill bg-success" style="font-size: large">Done</span>
                                                                                        @else
                                                                                            <span class="badge rounded-pill bg-danger" style="font-size: large">Pending</span>
                                                                                        @endif
                                                                                    </h5>
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
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No Messages found!!!</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$appointments->links()}}</span>
                                </div>
                            </div>

                    </div>

                </div>
            </div>

        </div>



@endsection









  @section('scripts')

    <script>
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();

      $.ajax({
          url:"{{route('consult.status')}}",
          type:"POST",
          data:{
              _token:'{{csrf_token()}}',
              mode:mode,
              id:id,
          },
          success:function (response) {

              if (response.status) {
                  alert(response.msg);
              }
              else{
                  alert('Please Try Again!');
              }
          }

      })

     })
    </script>

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
        $('#is_parent').change(function(){
            var is_checked=$('#is_parent').prop('checked');
            // alert(is_checked);
            if(is_checked){
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val('');
            }
            else{
            $('#parent_cat_div').removeClass('d-none');
            }
        })
    </script>

    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
