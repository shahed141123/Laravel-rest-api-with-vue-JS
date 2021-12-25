@extends('backend.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Users</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('user.create')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-plus"></i> Add User</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Total Users : {{\App\Models\User::count()}}</h3>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
                 @if(count($users)>0)
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>S.N.</th>
                  <th>Photo</th>
                  <th>Full Name</th>
                  <th>National ID No</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        @if($user->photo)
                            <img src="{{$user->photo}}" class="img-fluid" style="border-radius:50% ; max-width:80px" alt="{{$user->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                        @endif
                    </td>
                    <td>{{$user->name}}</td>

                    <td>{{$user->id_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                         @if($user->role=='admin')
                              <span class="badge badge-success">{{$user->role}}</span>

                            @elseif($user->role=='vendor')
                              <span class="badge badge-warning">{{$user->role}}</span>
                          @else
                              <span class="badge badge-primary">{{$user->role}}</span>
                          @endif
                    </td>
                    <td>
                        <input type="checkbox"  data-toggle="toggle" name="toggle" value="{{$user->id}}" {{$user->status=='active' ? 'checked' : ''}} data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                        @if($user->status=='active')
                            <span class="badge badge-success">{{$user->status}}</span>
                        @else
                            <span class="badge badge-danger">{{$user->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm float-left mr-1 mb-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="post" action="{{route('user.destroy',[$user->id])}}">
                      @csrf
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$user->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
          </tbody>

                </table>

                  @else
                    <h6 class="text-center">No users found!!! Please create user</h6>
                  @endif
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



</div>



</div>



@endsection









  @section('scripts')



    <script>
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();
      $.ajax({
          url:"{{route('user.status')}}",
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
