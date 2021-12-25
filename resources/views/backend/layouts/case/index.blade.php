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
                            <li class="breadcrumb-item active" aria-current="page">Case Summary Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Case Summary Resource Table (Total Resources : {{\App\Models\CaseSummary::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Case Name</th>
                                                <th>Case Year</th>
                                                <th>Topic</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($cases)>0)
                                            @foreach($cases as $case)

                                                <tr>

                                                    <td>{{$case->title}}</td>
                                                    <td>{{$case->year}}</td>
                                                    <td>{{$case->topic}}</td>
                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" name="toggle" value="{{$case->id}}" {{$case->status=='active' ? 'checked' : ''}} >
                                                            <span class="slider round"></span>
                                                        </label>

                                                    </td>



                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="Show Case Resource Detail" data-bs-toggle="modal" data-bs-target="#caseID{{$case->id}}"><i class="bx bx-bullseye"></i></a>
                                                        <a href="{{route('case_summary.edit',$case->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i></a>
                                                        <form method="post" action="{{route('case_summary.destroy',[$case->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$case->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>



        <div class="modal fade" id="caseID{{$case->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">



                    <div class="modal-content" >
                        <div class="modal-header text-center">
                            <h4 class="modal-title" style="float: none"><h3><strong> Case Summary Resource Details</strong></h3> <br></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row mt-0 text-center mb-3">
                                        <div class="col-md-12">
                                            <h5>Case Name:</h5>
                                            <h5>{{$case->title}}

                                            </h5>

                                        </div>
                                    </div>

                                    <div class="row mt-0 text-center mb-3">
                                        <div class="col-md-12">
                                            <h5>Case year:</h5>
                                            <h5>
                                                {{$case->year}}
                                            </h5>

                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 2rem">
                                        <div class="col-md-12">
                                            <h5>Case Topic:</h5>
                                            <h6>{!! html_entity_decode($case->topic) !!}</h6>

                                        </div>
                                    </div>
                                    <div class="row " style="margin-bottom: 2rem">
                                        <div class="col-md-12">
                                            <h5>Fact:</h5>
                                            <h6>{!! html_entity_decode($case->fact) !!}</h6>

                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 2rem">
                                        <div class="col-md-12" style="margin-bottom: 1rem">
                                        <h5>Judgement:</h5>
                                        <h5>{{ $case->judgement }}</h5>

                                        </div>


                                    </div>



                                    <div class="row" style="margin-bottom: 2rem">

                                        <div class="col-md-6">
                                            <h5>Status:</h5>
                                            <h5>
                                                @if($case->status=='active')
                                                    <span class="badge rounded-pill bg-success" style="font-size: large">{{$case->status}}</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger" style="font-size: large">{{$case->status}}</span>
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
                                            <td colspan="6"><h6 class="text-center">No Resource found!!! Please create Resource</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$cases->links()}}</span>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-5">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Case Summary</h6>
                        <hr/>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('case_summary.store')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Case Name <span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputYear" class="col-form-label">Case Year <span class="text-danger">*</span></label>
                                            <input id="inputYear" type="text" name="year" placeholder="Enter Year"  value="{{old('year')}}" class="form-control">
                                            @error('year')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputTopic" class="col-form-label">Topic <span class="text-danger">*</span></label>
                                            <textarea name="topic" id="inputTopic" cols="30" rows="3" class="form-control"></textarea>
                                            @error('topic')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>



                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="mb-3">
                                                 <label>Fact</label>
                                                <textarea class="form-control" rows="10" name="fact">{{old('fact')}}</textarea>
                                                @error('fact')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>

                                       <div class="row">
                                            <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="mb-3">
                                                <label>Judgement <span class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="5" name="judgement">{{old('judgement')}}</textarea>
                                                @error('judgement')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputStatus">Status<span class="text-danger">*</span></label>
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
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();
      $.ajax({
          url:"{{route('case_summary.status')}}",
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
