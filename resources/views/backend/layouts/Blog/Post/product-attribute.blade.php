@extends('backend.master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row" >
          <div class="col-sm-6">

            <h1>{{ ucfirst($product->title)}}</h1> <h4>/ Add Product Attributes</h4>

          </div>
          <div class="col-sm-6">
           <a href="{{route('product.index')}}" class="btn btn-outline-secondary float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-eye"></i> Product List</a>

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

            <div class="card" style="margin-bottom: 50px;">
              <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none"> Add Attributes</h3>
              </div>
              <!-- /.card-header -->
              {{-- attribute --}}
              <form action="{{ route('product.attribute',$product->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <h1 class="card-title text-left mr-2" style="float: left"> <b>Size Attributes : </b> </h1>
                        <div id="product_attribute" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}' title="Add More Attributes Field" data-toggle="tooltip">
                            <div class="row"style="margin-bottom: 20px;">
                                <div class="col-md-12"><button type="button" id="btnAdd-1" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button></div>
                            </div>
                            <div class="row group form-group">
                                <div class="col-md-2">
                                    <label for="selectSize">Size:<span class="text-danger">*</span></label><br>
                                    {{-- <input class="form-control" type="text" name="size" placeholder="Eg. S,L,M,XL"> --}}
                                    <select name="size[]" id="selectSize">
                                        <option selected >Default</option>
                                        <option value="S">Small(S)</option>
                                        <option value="M">Medium(M)</option>
                                        <option value="L">Large(L)</option>
                                        <option value="XL">Extra Large(XL)</option>
                                        <option value="XXL">Double XL (XXL)</option>
                                    </select>
                                    @error('size')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for=""> Original Price(Tk):</label>
                                    <input type="hidden" name="status" value="size">
                                    <input class="form-control" type="number" step="any" name="price[]" value="{{ $product->offer_price }}">
                                    @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for=""> Size based Price(Tk):</label>
                                    <input class="form-control" type="number" step="any" name="offer_price[]" value="{{ $product->offer_price }}">
                                        @error('offer_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    <p>(if u don't have size based price, original price will be applicable)</p>
                                </div>
                                <div class="col-md-3">
                                    <label for=""> Size based Product Quantity: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" step="any" name="stock[]" placeholder="Add Stock Amount">
                                        @error('stock')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>

                                <div class="col-md-1" style="margin-top: 50px;">
                                    <button type="button" class="btn btn-danger btnRemove"><i class="fas fa-trash-alt"></i></button>
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
              <form action="{{ route('product.attribute',$product->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <h1 class="card-title text-left mr-2" style="float: left"> <b>Color Attributes : </b> </h1>
                        <div id="product_attribute_color" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}' title="Add More Attributes Field" data-toggle="tooltip">
                            <div class="row"style="margin-bottom: 20px;">
                                <div class="col-md-12"><button type="button" id="btnAdd-1" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button></div>
                            </div>
                            <div class="row group form-group">
                                <div class="col-md-2">
                                    <label for="selectSize">Color:<span class="text-danger">*</span></label><br>
                                    <input type="hidden" name="status" value="color">
                                    <input class="form-control" type="text" name="color[]" placeholder="Eg. Red,Purple,Pink,Black">
                                    @error('color')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="thumbnail"> Color based Picture: <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="photo[]">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        @error('photo')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    <p>(if u don't have color based picture, original picture will be applicable)</p>
                                </div>
                                <div class="col-md-2">
                                    <label for=""> Original Price(Tk):</label>
                                    <input class="form-control" type="number" step="any" name="price[]" value="{{ $product->offer_price }}">
                                    @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for=""> Color based Price(Tk):</label>
                                    <input class="form-control" type="number" step="any" name="offer_price[]" value="{{ $product->offer_price }}">
                                        @error('offer_price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    <p>(if u don't have color based price, original price will be applicable)</p>
                                </div>
                                <div class="col-md-3">
                                    <label for=""> Color based Product Quantity:<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" step="any" name="stock[]" placeholder="Add Stock Amount">
                                    @error('stock')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-1" style="margin-top: 50px;">
                                    <button type="button" class="btn btn-danger btnRemove"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-sm" style="float: left"> Submit</button>
                        </div>
                </div>
              </form>
            </div>

            <div class="card mt-20">
              <div class="card-header bg-dark" >
                <h3 class="card-title text-center" style="float: none">Added Attributes List for The Product</h3>
              </div>
              <div class="card-body">
                    <div class="card-header bg-gray">
                        <h3 class="card-title text-center" style="float: none">Size Attributes List</h3>
                    </div>
                    @if (count($size_attributes)>0)
                        <table id="example" class="table table-bordered table-striped" style="margin-bottom: 50px;">
                            <thead>
                            <tr>
                                <th>Size</th>
                                <th>Product Sell in Per Quantity</th>
                                <th>Original Price</th>
                                <th>Size Based Price</th>
                                <th>Size Based Product Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($size_attributes as $data)
                                <tr>
                                    <td>{{ $data->size }}</td>
                                    <td>
                                            @if($product->qty_in=='Kg')
                                                <span class="text-success">Per Kilogram</span>
                                            @elseif($product->qty_in=='Ps')
                                                <span class="text-warning">Per Piece</span>
                                                @elseif($product->qty_in=='Pr')
                                                <span class="text-danger">Per Pair</span>
                                            @else
                                                <span class="text-primary">Per Litre</span>
                                            @endif
                                    </td>
                                    <td>Tk. {{ number_format($data->price,2) }}</td>
                                    <td>Tk. {{ number_format($data->offer_price,2) }}</td>
                                    <td>{{ $data->stock }}</td>
                                    <td>
                                        <form method="post" action="{{route('product_attribute.destroy',[$data->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$data->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i>
                                            </button>
                                    </form>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        @else
                            <h5 class="text-center">No Attributes found for this Product!!! Please create Attributes for this Product</h5>

                    @endif
                    <div class="card-header bg-gray">
                        <h3 class="card-title text-center" style="float: none">Color Attributes List</h3>
                    </div>
                    @if (count($color_attributes)>0)
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Color Based Product Image</th>
                                <th>Color</th>
                                <th>Original Price</th>
                                <th>Color Based Price</th>
                                <th>Color Based Product Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($color_attributes as $item)
                                @php
                                    $photo=explode(',', $product->photo);
                                    $photo1=explode(',', $item->photo);
                                @endphp
                                <tr>
                                    <td>
                                        @if($item->photo)

                                            <img src="{{$photo1[0]}}" class="img-fluid" style="max-width:80px" alt="{{$item->photo}}">
                                        @else
                                            <img src="{{$photo[0]}}" class="img-fluid" style="max-width:80px" alt="{{ $product->photo }}">
                                        @endif
                                    <td>
                                            {{ $item->color }}
                                    </td>
                                    <td>Tk. {{ number_format($item->price,2) }}</td>
                                    <td>Tk. {{ number_format($item->offer_price,2) }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <form method="post" action="{{route('product_attribute.destroy',[$item->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$item->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i>
                                            </button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @else
                        <h5>No Attributes found for this Product!!! Please create Attributes for this Product</h5>
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

@endsection


@section('styles')
    <style>
        .mb-20{
            margin-bottom: 20px;
        }
        .bg-gray{
            color: rgb(158, 158, 158);
        }
    </style>
@endsection






  @section('scripts')





    <script>
      $('input[name=toggle]').change(function() {
      var mode= $(this).prop('checked');
      var id=$(this).val();
      $.ajax({
          url:"{{route('product.status')}}",
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
$('#product_attribute').multifield();
</script>
<script>
$('#product_attribute_color').multifield();
</script>
@endsection
