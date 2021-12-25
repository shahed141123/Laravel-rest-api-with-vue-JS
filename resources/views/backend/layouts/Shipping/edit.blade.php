@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Shipping</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('shipping.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>Shipping List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
             <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Shipping Edit Form</h3>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('shipping.update',$shipping->id)}}">
                @csrf
                @method('PATCH')


                 <div class="form-group">
                <label for="inputTitle" class="col-form-label">Shipping Type <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="type" placeholder="Enter Shipping Type "  value="{{$shipping->type}}" class="form-control">
                @error('type')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputtime" class="col-form-label">Delivery Time <span class="text-danger">*</span></label>
                <input id="inputtime" type="text" name="delivery_time" placeholder="Enter Delivery Time "  value="{{$shipping->delivery_time}}" class="form-control">
                @error('delivery_time')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputcharge" class="col-form-label">Delivery Charge <span class="text-danger">*</span></label>
                <input id="inputcharge" type="text" name="delivery_charge" placeholder="Enter Delivery Charge "  value="{{$shipping->delivery_charge}}" class="form-control">
                @error('delivery_charge')
                <span class="text-danger">{{$message}}</span>
                @enderror



              <div class="form-group">
                <label for="inputStatus">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($shipping->status=='active') ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Active
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($shipping->status=='inactive') ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Inactive
                    </label>
                </div>
                @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

            </div>

            </div>

        </div>
        <div class="form-group mb-3 text-center">
                <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
    </section>
</div>
@endsection

