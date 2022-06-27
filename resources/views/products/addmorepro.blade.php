<?php
$resresult = explode('00', @$getproduct->procodeno);
if (empty($getproduct->procodeno)) {
    $getresresult = date('ynj') . '001';
} else {
    $num_text = $resresult[0] . '00';
    $numberadd = $resresult[1];
    $number_res = $numberadd + 1;
    $getresresult = $num_text . $number_res;
}
?>
@extends('mainpage')
@section('title','Add Products')
@section('content')
<div class="container-fluid" onload="getCategory()">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h2>Add New Products (<b>Total Entries <?= $getallproduct ?> of <?= $suplyqty ?></b>)</h2></center>
                    @php
                    $generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();
                    @endphp
                    <div class="row">
                        <div class="col-md-4">
                            <label><b>Supplier</b></label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= $getsuppliers->suppname ?>" readonly="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label><b>Category</b></label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= $category ?>" readonly="">
                            </div>
                        </div>
                    </div><br>
                    <!----------Product Sale---------->
                    <div class="row">
                        <div class="col-md-6" id="addProductBoxhide">
                            <!--<form method="post" action="{{route('savestoreproduct')}}" enctype="multipart/form-data">-->
                            <form method="post" id="save_form_data" action="javascript:void(0)" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Product ID</b></label><br>
                                        <div class="form-group">
                                            <input type="hidden" name="supplier" value="<?= $getsuppliers->supid ?>">
                                            <input type="hidden" name="category" value="<?= $category ?>">
                                            <input type="text" name="procode" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;"  value="<?= $getresresult ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Product Barcode</b></label><br>
                                        <div class="form-group">
                                            <img id="getImage" src="data:image/jpg;base64,{{ base64_encode($generatorJPG->getBarcode($getresresult, $generatorJPG::TYPE_CODE_128,2, 50)) }}"><br>
                                            <input type="hidden" name="image" class="image-tag">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Product</b></label><br>
                                        <div class="form-group">
                                            <select name="proname" onchange="getProbrand()" class="form-control multipleselect" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                                <option value="">Select Product</option>
                                                @foreach($getcatproducts as $value)
                                                <option value="{{$value->catproid}}">{{$value->product}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Product Quantity</b></label><br>
                                        <div class="form-group">
                                            <input type="text" name="proqty" oninput="quantityNumber(this.id);" id="getproqty" maxlength="3" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Quantity" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Buying price</b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="progetprice" id="getprogetprice" class="form-control form_control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Buying price" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Extra Cost</b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="proextracost" id="proextracost" class="form-control form_control" style="border-radius:10px;border:1px solid #1e88e5;" value="0" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Total Cost</b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="totalcost" id="grossTotal" class="form-control form_control" style="border-radius:10px;border:1px solid #1e88e5;" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Sale Price</b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="prosaleprice" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="0" required="">
                                        </div>
                                    </div>
                                </div><br>
                                <div style="text-align: center">
                                    <button type="submit" class="btn btn-info" style="border-radius: 10px;" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                                </div>  
                            </form>
                        </div>
                        @if($getallproduct == $suplyqty)
                        <div class="col-md-6">
                            <center><h2>Supplier Accounts</h2></center><br>
                            <form method="post" action="{{route('saveproinfo')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <label><b>Total Buying Price</b></label><br>
                                        <div class="form-group">
                                            <input type="hidden" name="stockpayment" value="<?= $posaccounts->payment ?>">
                                            <input type="hidden" name="entrydate" value="<?= $prodate ?>">
                                            <input type="hidden" name="supplier" value="<?= $getsuppliers->supid ?>">
                                            <input type="hidden" name="category" value="<?= $category ?>">
                                            <input type="hidden" name="suplyqty" value="<?= $suplyqty ?>">
                                            <input type="number" name="buyprice" id="setgrandtotal" class="form-control getgrandtotal" style="border-radius:10px;border:1px solid #1e88e5;" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <label><b>Paid Amount</b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="paidamount" id="gettotalpaid" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Paid Amount" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <label><b>Due Amount</b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="dueamount" id="settotaldue" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" readonly="">
                                        </div>
                                    </div>
                                </div><br>
                                <div style="text-align: center;display: none" id="showSubmitButton">
                                    <button type="submit" class="btn btn-info" style="border-radius: 10px;" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                                </div> 
                            </form>
                        </div>
                        @endif
                    </div>
                    <!----------Product Sale---------->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getProbrand() {
        var image = document.getElementById('getImage').innerHTML = '<img src="data:image/jpg;base64,<?= base64_encode($generatorJPG->getBarcode($getresresult, $generatorJPG::TYPE_CODE_128, 2, 50)) ?>';
        $(".image-tag").val(image);
    }
</script>
<script>
    function quantityNumber(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
    $(document).ready(function () {
        $(".form_control").keyup(function () {
            var getprogetprice = +$("#getprogetprice").val();
            var proextracost = +$("#proextracost").val();
            var grossTotal = getprogetprice + proextracost;
            $("#grossTotal").val(grossTotal);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#gettotalpaid").keyup(function () {
            var gettotalpaid = $(this).val();
            var totalbuyprice = +$('.getgrandtotal').val();
            var settotaldue = parseInt(totalbuyprice) - parseInt(gettotalpaid);
            $("#settotaldue").val(settotaldue);
            if (gettotalpaid === '0' || gettotalpaid === '') {
                $("#showSubmitButton").hide();
            } else {
                $("#showSubmitButton").show();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#save_form_data').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{route('savestoreproduct')}}",
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success: () => {
                    $('#save_form_data')[0].reset();
                    location.reload();
                },
                error: function () {
                    alert('Something is wrong !');
                }
            });
        });
    });
</script>
@if($getallproduct == $suplyqty)
<script type="text/javascript">
    window.addEventListener('load', function () {
        document.getElementById('addProductBoxhide').style.display = 'none';
        supplierAccounts();
    });
    function supplierAccounts() {
        $('#showSupplierAccounts').show();
        var id = '<?= $getsuppliers->supid ?>';
        $.ajax({
            url: "{{ URL::to('get_supplier_accounts') }}",
            method: 'GET',
            data: {id: id},
            dataType: 'json',
            success: function (data)
            {
                $('#setgrandtotal').val(data);
            }
        });
    }
</script>
@endif
<script>
    $(document).ready(function () {
        $('#storeproduct').addClass('active');
        $('.addpro').addClass('active');
    });
</script>
@endsection