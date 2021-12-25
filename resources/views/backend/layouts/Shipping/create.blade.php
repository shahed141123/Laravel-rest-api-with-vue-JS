@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Shipping Method</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('shipping.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>Shipping List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="card">
              <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Shipping Method Form</h3>


            </div>

        <form method="post" action="{{route('shipping.store')}}">
            @csrf
            <div class="card-body">


            <div class="form-group">
                <label for="inputTitle" class="col-form-label">Shipping Type <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="type" placeholder="Enter Shipping Type "  value="{{old('type')}}" class="form-control">
                @error('type')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputtime" class="col-form-label">Delivery Time <span class="text-danger">*</span></label>
                <input id="inputtime" type="text" name="delivery_time" placeholder="Enter Delivery Time "  value="{{old('delivery_time')}}" class="form-control">
                @error('delivery_time')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputcharge" class="col-form-label">Delivery Charge <span class="text-danger">*</span></label>
                <input id="inputcharge" type="text" name="delivery_charge" placeholder="Enter Delivery Charge "  value="{{old('delivery_charge')}}" class="form-control">
                @error('delivery_charge')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>






            <div class="form-group">
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





            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <button class="btn btn-success" type="submit">Submit</button>
      </div>
      </form>
    </section>
    <!-- /.content -->
</div>





  @endsection

  @section('scripts')


    <script>
     $('#lfm').filemanager('image');
    </script>
  @endsection
