@extends('mainpage')
@section('title','Add Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h2>Stock Products Entry Details </h2></center><br><br><br>
                    <div>
                        <form action="{{url('addproducts')}}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label><b>Supplier Name <span style="color: red">*</span></b></label><br>
                                    <div class="form-group">
                                        <select name="supplier" class="form-control multipleselect" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                            <option value="">Select Supplier</option>
                                            @foreach($getsuppliers as $value)
                                            <option value="{{$value->supid}}">{{$value->suppname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Product Category <span style="color: red">*</span></b></label><br>
                                    <div class="form-group">
                                        <select name="category" class="form-control multipleselect" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                            <option value="">Select Category</option>
                                            @foreach($getsingledata as $value)
                                            @if($value->status=="category")
                                            <option value="{{$value->singledata}}">{{$value->singledata}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Total Storing Products <span style="color: red">*</span></b></label><br>
                                    <div class="form-group">
                                        <input type="number" name="qty" oninput="numberOnly(this.id)" id="qty" class="form-control getQunatity" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Quantity" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Entry Fields Type <span style="color: red">*</span></b></label><br>
                                    <div class="form-group">
                                        <select name="type" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                                            <option value="">Select Type</option>
                                            <option value="device">Device</option>
                                            <option value="manual">Manual</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <center>
                                <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top:20px"><i class="fa fa-hand-point-right"></i> Next</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.getExtracost').keyup(function () {
            var value = $(this).val();
            var qty = $(".getQunatity").val();
//            var result = Math.round(parseInt(qty) / parseInt(value));
            var result = Math.round(parseInt(value) / parseInt(qty));
            $("#setperCost").val(result);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#storeproduct').addClass('active');
        $('.addpro').addClass('active');
    });
</script>
@endsection