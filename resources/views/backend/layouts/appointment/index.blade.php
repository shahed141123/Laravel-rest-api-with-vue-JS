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
                            <li class="breadcrumb-item active" aria-current="page">Appointment Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-10">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Appointments Table (Total Appointments Pending: {{\App\Models\Appointment::where('status','inactive')->count()}})</h6>
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
                                                        {{-- <a href="{{route('appointment.edit',$appointment->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%; margin-bottom:5px" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit-alt"></i></a> --}}
                                                    <form method="post" action="{{route('appointment.destroy',[$appointment->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$appointment->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No appointments found!!! Please create appointment</h6></td>
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
          url:"{{route('appointment.status')}}",
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
