@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Coupon</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('coupon.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>Coupon List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
             <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Coupon Edit Form</h3>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('coupon.update',$coupon->id)}}">
                @csrf
                @method('PATCH')



                 <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Coupon Title <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$coupon->title}}" class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


             <div class="form-group">
                    <label for="inputCode" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
                    <input id="inputCode" type="text" name="code" placeholder="Enter code"  value="{{$coupon->code}}" class="form-control">
                    @error('code')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                        <label for="inputType">Coupon Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="fixed" id="flexRadioDefault11" {{(($coupon->type=='fixed') ? 'checked' : '')}}>
                            <label class="form-check-label" for="flexRadioDefault11">
                                Fixed
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="percent" id="flexRadioDefault22" {{(($coupon->type=='percent') ? 'checked' : '')}}>
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
                  <input id="value" type="number" name="value" placeholder="Enter value"  value="{{$coupon->value}}" class="form-control">
                  @error('value')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
            </div>




              <div class="form-group">
                <label for="inputStatus">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($coupon->status=='active') ? 'checked' : '')}}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Active
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($coupon->status=='inactive') ? 'checked' : '')}}>
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

