@extends('backend.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipping Methods</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('shipping.create')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-plus"></i> Add Shipping Method</a>

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
                <h3 class="card-title text-center" style="float: none">Total Shipping Methods : {{\App\Models\Shipping::count()}}</h3>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
                 @if(count($shippings)>0)
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Shipping Method</th>
                    <th>Delivery Time</th>
                    <th>Delivery Charge</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach($shippings as $shipping)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$shipping->type}}</td>
                    <td>{{$shipping->delivery_time}}</td>
                    <td>{{$shipping->delivery_charge}}</td>
                    <td>
                        <input type="checkbox"  data-toggle="toggle" name="toggle" value="{{$shipping->id}}" {{$shipping->status=='active' ? 'checked' : ''}} data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                        @if($shipping->status=='active')
                            <span class="badge badge-success">{{$shipping->status}}</span>
                        @else
                            <span class="badge badge-danger">{{$shipping->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('shipping.edit',$shipping->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="post" action="{{route('shipping.destroy',[$shipping->id])}}">
                          @csrf
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$shipping->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
          </tbody>

                </table>
                <span style="float:right" >{{$shippings->links()}}</span>
        @else
          <h6 class="text-center">No Shippings found!!! Please create Shipping</h6>
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
          url:"{{route('shipping.status')}}",
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
