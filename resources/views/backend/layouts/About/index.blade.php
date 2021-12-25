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
                            <li class="breadcrumb-item active" aria-current="page">Home Page Link Section</li>

                        </ol>

                    </nav>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3"><a class="btn btn-outline-info px-5 radius-30 mb-3" href="{{route('about.create')}}">
                                <i class="bx bx-plus"></i> Add About</a></div>
            </div>

            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        @if ($about)
                    <thead>
                    <tr>
                        <th class="text-center">About Us</th>
                        <th colspan="2" class="text-left"><a href="{{route('about.edit',$about->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i>&nbsp;Edit</a> </th>
                    </tr>
                    </thead>
                        <tbody>

                            <tr>
                                <td><p>{!! $about->about !!}</p></td>

                            </tr>
                            @else
                                <h6 class="text-center">No About Article Found.</h6>
                            @endif
                        </tbody>

                    </table>

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
          url:"{{route('banner.status')}}",
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


@endsection
