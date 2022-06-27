@extends('mainpage')
@section('title','Print')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <center><h2>Select Product Category For Barcode Print</h2></center><br>
                            <div class="form-group">
                                <select name="category" id="getCategory" class="form-control" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                    <option value="">Select Category</option>
                                    <option value="all">All</option>
                                    @foreach($getcatproducts as $value)
                                    <option value="{{$value->catname}}">{{$value->catname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('change', '#getCategory', function () {
            var category = $(this).val();
            window.location.href = '{{URL::to("productsbarcodeprint?value=")}}' + category;
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#storeproduct').addClass('active');
        $('.barcodeprint').addClass('active');
    });
</script>
@endsection