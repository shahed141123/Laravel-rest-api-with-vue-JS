@extends('backend.master')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Coupon</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('coupon.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>Coupon List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="row">
         <div class="col-md-12">
            @include('backend.partials.notifications')
         </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
           <div class="card">
              <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Coupon Form</h3>


            </div>

        <form method="post" action="{{route('coupon.store')}}">
            @csrf
            <div class="card-body">


                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Coupon Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputCode" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
                    <input id="inputCode" type="text" name="code" placeholder="Enter code"  value="{{old('code')}}" class="form-control">
                    @error('code')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                        <label for="inputType">Coupon Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="fixed" id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault11">
                                Fixed
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="percent" id="flexRadioDefault22" checked>
                            <label class="form-check-label" for="flexRadioDefault22">
                                Percentage
                            </label>
                        </div>
                        @error('type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                </div>

             <div class="form-group">
                  <label for="value" class="col-form-label">Coupon Value <span class="text-danger">*</span></label>
                  <input id="value" type="number" name="value" placeholder="Enter value"  value="{{old('value')}}" class="form-control">
                  @error('value')
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
