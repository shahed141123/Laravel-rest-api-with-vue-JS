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
                            <li class="breadcrumb-item active" aria-current="page">Lawyer Box Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Lawyer Box Table (Total Lawyer Boxes : {{\App\Models\ServiceBox::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Box Icon</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @if(count($boxes)>0)
                                            @foreach($boxes as $box)

                                                <tr>
                                                    <td><i class="{{$box->icon}}" style="font-size: xx-large"></i></td>
                                                    <td>{{$box->title}}</td>
                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" name="toggle" value="{{$box->id}}" {{$box->status=='active' ? 'checked' : ''}} >
                                                            <span class="slider round"></span>
                                                        </label>
                                                        {{-- <input type="checkbox"  data-toggle="toggle" name="toggle" value="{{$banner->id}}" {{$banner->status=='active' ? 'checked' : ''}} data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                                                         --}}
                                                        {{-- @if($banner->status=='active')
                                                            <span class="badge badge-success">{{$banner->status}}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{$banner->status}}</span>
                                                        @endif --}}
                                                    </td>

                                                    <td>
                                                        <a href="{{route('lawyer-box.edit',$box->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i></a>
                                                        <form method="post" action="{{route('lawyer-box.destroy',[$box->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$box->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No Lawyer box found!!! Please create Lawyer box</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$boxes->links()}}</span>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-5">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Lawyer box</h6>
                        <hr/>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('lawyer-box.store')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Lawyer box Title <span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                            <!-- textarea -->
                                            <div class="mb-3">
                                                <label>Lawyer box Summary</label>
                                                <textarea class="form-control" rows="5" placeholder="Enter Short Summary" name="summary"> </textarea>
                                                    @error('summary')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Icon Code<span class="text-danger">*</span>&nbsp;&nbsp;
                                                <a href="javascript:void(0);" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-icon"><span class="bx bx-help-circle" data-bs-toggle="tooltip" data-placement="top" title="Icon List"></span></a></label>
                                            <input id="inputTitle" type="text" name="icon" placeholder="Enter Icon"  value="{{old('icon')}}" class="form-control">
                                            @error('icon')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

@endsection


  @section('scripts')


    <script>
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();
      $.ajax({
          url:"{{route('box.status')}}",
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
