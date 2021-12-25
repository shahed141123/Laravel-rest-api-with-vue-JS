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
                            <li class="breadcrumb-item active" aria-current="page">Banner Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Banner Table (Total Banners : {{\App\Models\Banner::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th>Condition</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @if(count($banners)>0)
                                            @foreach($banners as $banner)

                                                <tr>

                                                    <td>{{$banner->title}}</td>
                                                    <td>
                                                        @if($banner->photo)
                                                            <img src="{{$banner->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$banner->title}}">
                                                        @else
                                                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            <input type="checkbox" name="toggle" value="{{$banner->id}}" {{$banner->status=='active' ? 'checked' : ''}} >
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

                                                    <td class="text-center">
                                                        @if($banner->condition=='banner')
                                                            <span class="badge rounded-pill bg-success">Slider</span>
                                                        @elseif ($banner->condition=='promo')
                                                            <span class="badge rounded-pill bg-warning">Promo</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-info">Background</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i></a>
                                                        <form method="post" action="{{route('banner.destroy',[$banner->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$banner->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No Banner found!!! Please create banner</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$banners->links()}}</span>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-5">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Banner</h6>
                        <hr/>

                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="{{route('banner.store')}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                                            <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="thumbnail">Photo <span class="text-danger">*</span></label>
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

                                        <div class="mb-3">
                                            <label for="inputStatus">Condition</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" value="banner" id="flexRadioDefault11" checked>
                                                <label class="form-check-label" for="flexRadioDefault11">
                                                    Banner
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" value="promo" id="flexRadioDefault22" >
                                                <label class="form-check-label" for="flexRadioDefault22">
                                                    Promotional
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" value="bg" id="flexRadioDefault33">
                                                <label class="form-check-label" for="flexRadioDefault33">
                                                    Home Page Background
                                                </label>
                                            </div>
                                            {{-- <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" value="i3_big" id="flexRadioDefault44">
                                                <label class="form-check-label" for="flexRadioDefault44">
                                                    I3 Banner Big
                                                </label>
                                            </div> --}}
                                            {{-- <div class="form-check">
                                                <input class="form-check-input" type="radio" name="condition" value="i3" id="flexRadioDefault55">
                                                <label class="form-check-label" for="flexRadioDefault55">
                                                    I3 Banner Wide
                                                </label>
                                            </div> --}}
                                            @error('condition')
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

     <script>
        $('#lfm').filemanager('image');
    </script>

@endsection
@section('styles')
    <style>
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgb(230, 13, 13);
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: rgb(255, 255, 255);
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #00ec14;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #3b3d3f;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
    </style>
@endsection
