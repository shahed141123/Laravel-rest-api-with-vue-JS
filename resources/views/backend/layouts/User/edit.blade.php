@extends('backend.master')
@section('content')

<div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
           <a href="{{route('user.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i>User List</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card">
             <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">User Edit Form</h3>
             </div>
            <div class="card-body">
            <form method="post" action="{{route('user.update',$user->id)}}">
                @csrf
                @method('PATCH')


                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Full Name <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="name" placeholder="Enter Full Name"  value="{{$user->name}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputusername" class="col-form-label">User Name <span class="text-danger">*</span></label>
                    <input id="inputusername" type="text" name="username" placeholder="Enter User Name"  value="{{$user->username}}" class="form-control">
                    @error('username')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password" class="col-form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" id="new_password" name="password" placeholder="Enter New Password" value="{{$user->password}}"   class="form-control">
                    @error('pasword')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputemail" class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input id="inputemail" type="email" name="email" placeholder="Enter email"  value="{{$user->email}}" class="form-control">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summernote">User Address</label>
                    <textarea id="summernote" name="address"> {{$user->address}}</textarea>
                     @error('address')
                     <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="inputTphone" class="col-form-label">Mobile No <span class="text-danger">*</span></label>
                    <input id="inputTphone" type="text" name="phone" placeholder="Enter Mobile No"  value="{{$user->phone}}" class="form-control">
                    @error('phone')
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
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;" > </div>
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>





                    <div class="row mt-2 ml-1 mr-1">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1" {{(($user->status=='active') ? 'checked' : '')}}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Active
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="inactive" id="flexRadioDefault2" {{(($user->status=='inactive') ? 'checked' : '')}}>
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
                                        <input class="form-check-input" type="radio" name="role"  value="admin" {{(($user->role=='admin') ? 'checked' : '')}} id="flexRadioDefault11" checked>
                                        <label class="form-check-label" for="flexRadioDefault11">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" value="vendor" {{(($user->role=='vendor') ? 'checked' : '')}} id="flexRadioDefault22" >
                                        <label class="form-check-label" for="flexRadioDefault22">
                                            Vendor
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" value="customer" {{(($user->role=='customer') ? 'checked' : '')}} id="flexRadioDefault33" >
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
        <div class="form-group mb-3 text-center">
                <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
    </section>
</div>
@endsection

 @section('scripts')

     <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
    <script>
     $('#lfm').filemanager('image');
    </script>

    <script>
  $('#is_parent').change(function(){
    var is_checked=$('#is_parent').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>
  @endsection

