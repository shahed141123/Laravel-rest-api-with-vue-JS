@extends('backend.master')
@section('content')
     
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('user.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>User List</a>
            
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
                <h3 class="card-title text-center" style="float: none">Add User Form</h3>
              
              
            </div>

        <form method="post" action="{{route('user.store')}}">
            @csrf
            <div class="card-body">
               
               
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Full Name <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="name" placeholder="Enter Full Name"  value="{{old('name')}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputusername" class="col-form-label">User Name <span class="text-danger">*</span></label>
                    <input id="inputusername" type="text" name="username" placeholder="Enter User Name"  value="{{old('username')}}" class="form-control">
                    @error('username')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputemail" class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input id="inputemail" type="email" name="email" placeholder="Enter email"  value="{{old('email')}}" class="form-control">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summernote">User Address</label>
                    <textarea id="summernote" name="address"> </textarea>
                     @error('address')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="inputTphone" class="col-form-label">Mobile No <span class="text-danger">*</span></label>
                    <input id="inputTphone" type="text" name="phone" placeholder="Enter Mobile No"  value="{{old('phone')}}" class="form-control">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputid_number" class="col-form-label">National ID No<span class="text-danger">*</span></label>
                    <input id="inputid_number" type="text" name="id_number" placeholder="Enter National ID No"  value="{{old('id_number')}}" class="form-control">
                    @error('id_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
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

                <div class="form-group">
                    <label for="inputpassword" class="col-form-label">Password<span class="text-danger">*</span></label>
                    <input id="inputpassword" type="password" name="password" placeholder="Enter Password"  value="{{old('password')}}" class="form-control">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              

                <div class="row mt-2 ml-1 mr-1">
                    <div class="col-md-6 mb-3">
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

                    <div class="col-md-6">
                        <div class="form-group">
                  <label for="inputStatus">Role</label>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" value="admin" id="flexRadioDefault11" checked>
                          <label class="form-check-label" for="flexRadioDefault11">
                              Admin
                          </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="vendor" id="flexRadioDefault22" >
                        <label class="form-check-label" for="flexRadioDefault22">
                            Vendor
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="customer" id="flexRadioDefault33" >
                        <label class="form-check-label" for="flexRadioDefault33">
                           Customer
                        </label>
                      </div>
                      @error('Role')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                  
                </div>
                    </div>

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