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
                            <li class="breadcrumb-item active" aria-current="page">Contact Message Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Contact Messages Table (Total Messages: {{\App\Models\Contact::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($contacts)>0)
                                            @foreach($contacts as $contact)

                                                <tr>
                                                    <td>{{$contact->name}}</td>

                                                    <td>
                                                       {{$contact->email}}
                                                    </td>

                                                    <td>
                                                       {{$contact->subject}}
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="Show Message" data-bs-toggle="modal" data-bs-target="#contactID{{$contact->id}}"><i class="bx bx-bullseye"></i></a>
                                                        {{-- <a href="{{route('contact.edit',$contact->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%; margin-bottom:5px" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit-alt"></i></a> --}}
                                                    <form method="post" action="{{route('consult.destroy',[$contact->id])}}">
                                                        @csrf
                                                        @method('delete')
                                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$contact->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                                <div class="modal fade" id="contactID{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">



                                                            <div class="modal-content" >
                                                                <div class="modal-header text-center">
                                                                    <h4 class="modal-title" style="float: none"><h3><strong>Contact Message</strong></h3> <br></h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">

                                                                            <div class="row mt-0 text-center mb-3">
                                                                                <div class="col-md-12">
                                                                                    <h5>Sender's Name:</h5>
                                                                                    <h5>{{$contact->name}}

                                                                                    </h5>

                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="margin-bottom: 2rem">
                                                                                <div class="col-md-6" style="margin-bottom: 1rem">
                                                                                    <h5>Email Id:</h5>
                                                                                    <h6>{{ $contact->email }}</h6>

                                                                                </div>
                                                                                 <div class="col-md-6">
                                                                                    <h5>Message Subject:</h5>
                                                                                    <h5>
                                                                                       {{ $contact->subject}}
                                                                                    </h5>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row" style="margin-bottom: 2rem">
                                                                                <div class="col-md-12">
                                                                                    <h5>Message:</h5>
                                                                                    <textarea readonly class="form-control" rows="10">{{ $contact->message }}</textarea>
                                                                                    

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
                                    <span style="float:right" >{{$contacts->links()}}</span>
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

   
@endsection
