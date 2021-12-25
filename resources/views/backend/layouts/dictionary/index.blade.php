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
                            <li class="breadcrumb-item active" aria-current="page">Dictionary Section</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                         <h6 class="mb-0 pt-3 px-3 text-uppercase text-center">Add Words To Dictionary</h6>
                        <hr/>

                            <form action="{{ route('dictionary.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h5 class="card-title text-left mr-2" style="float: left"> <b>Size Attributes : </b> </h5>
                                        <div id="dictionary" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}' title="Add More words field" data-toggle="tooltip">
                                            <div class="row"style="margin-bottom: 20px;">
                                                <div class="col-md-12"><button type="button" id="btnAdd-1" class="btn btn-primary"><i class="bx bx-plus-circle"></i></button></div>
                                            </div>
                                            <div class="row group form-group">



                                                <div class="col-md-4">
                                                    <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                                                        <input id="inputTitle" type="text" name="title[]" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                                                        @error('title')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Description</label>
                                                        <textarea class="form-control" rows="4" name="description[]">{{old('description')}}</textarea>
                                                        @error('description')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                </div>

                                                <div class="col-md-1" style="margin-top: 50px;">
                                                    <button type="button" class="btn btn-danger btnRemove"><i class="bx bx-trash-alt"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row group" style="float: none">
                                            <div class="button">
                                                <button type="submit" class="btn btn-info btn-sm text-left" > Submit</button>
                                            </div>
                                        </div>
                                </div>
                            </form>

                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-10">
                        <h6 class="mb-0 pt-3 px-3 text-uppercase">Word List (Total Words : {{\App\Models\Dictionary::count()}})</h6>
                        <hr/>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Word</th>
                                                <th>Description</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @if(count($laws)>0)
                                            @foreach($laws as $law)

                                                <tr>

                                                    <td>{{$law->title}}</td>
                                                    <td>
                                                       {{$law->description}}
                                                    </td>

                                                    <td>
                                                        <a href="{{route('dictionary.edit',$law->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="bx bx-edit"></i></a>
                                                        <form method="post" action="{{route('dictionary.destroy',[$law->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$law->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="bx bx-trash"></i></button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @else
                                            <td colspan="6"><h6 class="text-center">No Word found!!! Please create Words</h6></td>
                                            @endif
                                        </tbody>

                                    </table>
                                    <span style="float:right" >{{$laws->links()}}</span>
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
        $('#dictionary').multifield();
    </script>
@endsection
