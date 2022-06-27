<?php
$resresult = explode('00', @$getproduct->barcode);
if (empty($getproduct->barcode)) {
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
                            <label><b>Entry Date</b></label><br>
                            <div class="form-group">
                                <input type="text" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= $prodate ?>" readonly="">
                            </div>
                        </div>
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
                        <div class="col-md-12" id="addProductBoxhide">
                            <!--<form method="post" action="{{route('storesingleproduct')}}" enctype="multipart/form-data">-->
                            <form method="post" id="save_form_data" action="javascript:void(0)" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>Product Code</b></label><br>
                                        <div class="form-group">
                                            <input type="hidden" name="protype" value="<?= $protype ?>">
                                            <input type="hidden" name="supplier" value="<?= $getsuppliers->supid ?>">
                                            <input type="hidden" name="suplyqty" value="<?= $suplyqty ?>">
                                            <input type="hidden" name="category" value="<?= $category ?>">
                                            <input type="hidden" name="stockqty" id="settotalqty" class="gettotalqty">
                                            <input type="text" name="barcode" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;"  value="<?= $getresresult ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Product Name <span style="color: red">*</span></b></label><br>
                                        <div class="form-group">
                                            <select name="productid" onchange="getProbrand()" class="form-control multipleselect" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                                <option value="">Select Product</option>
                                                @foreach($catproducts as $value)
                                                <option value="{{$value->catproid}}">{{$value->product}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Product Barcode</b></label><br>
                                        <div class="form-group">
                                            <img id="getImage" src="data:image/jpg;base64,{{ base64_encode($generatorJPG->getBarcode($getresresult, $generatorJPG::TYPE_CODE_128,2, 50)) }}"><br>
                                            <input type="hidden" name="image" class="image-tag">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>Product Size <span style="color: red">*</span></b></label><br>
                                        <div class="form-group">
                                            <select name="prosize" class="form-control" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                                <option value="">Select Size</option>
                                                @foreach($getsingledata as $value)
                                                <option value="{{$value->singledata}}">{{$value->singledata}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><b>Product Quantities <span style="color: red">*</span></b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="qunatity" oninput="productQuntity(this.id)" id="qunatity" class="form-control getqunatity" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Quantities" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><b>Buying Price <span style="color: red">*</span></b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="price" class="form-control" id="getBuyingPrice" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Buying Price" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><b>Sale Price</b></label><br>
                                        <div class="form-group">
                                            <input type="number" name="sale" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Sale price" required="">
                                        </div>
                                    </div>
                                </div><br>
                                <center>
                                    <button type="submit" id="hideSubButton" class="btn btn-info" style="border-radius: 10px;" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                                </center>
                            </form>
                        </div>
                        @if($getallproduct == $suplyqty)
                        <div class="col-md-12">
                            <center><h2>Supplier Accounts</h2></center><br>
                            <form method="post" action="{{route('updatesingleproduct')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Total Price & Discount</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="stockpayment" value="<?= $posaccounts->payment ?>">
                                        <input type="hidden" name="supplier" value="<?= $getsuppliers->supid ?>">
                                        <input type="hidden" name="category" value="<?= $category ?>">
                                        <input type="hidden" name="totalqty" value="<?= $suplyqty ?>">
                                        <input type="number" name="totalamount" id="setgrandtotal" class="form-control getgrandtotal" value="<?= $getallproprice * $getallproduct ?>" style="border-radius:10px;border:1px solid #1e88e5;text-align: center" readonly="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="prodiscount" class="form-control getDiscount" oninput="numberOnly(this.id)" id="getDiscount" style="border-radius:10px;border:1px solid #1e88e5;text-align: center" placeholder="Enter Discount" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Net Total & Paid Amount</label>
                                    <div class="col-sm-3">
                                        <input type="number" name="nettotal" id="setgrosstotal" class="form-control getgrosstotal" style="border-radius:10px;border:1px solid #1e88e5;text-align: center" readonly="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="paidamount" id="gettotalpaid"  oninput="numberOnlyTwo(this.id)" class="form-control setPaidbox" style="display: none;border-radius:10px;border:1px solid #1e88e5;text-align: center" placeholder="Enter Paid Amount" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Due Amount & Payment Method</label>
                                    <div class="col-sm-3">
                                        <input type="number" name="dueamount" id="settotaldue" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-align: center" readonly="">
                                    </div>
                                    <div class="col-sm-3">
                                        <select id="getPaymethod" style="display: none;border:1px solid #1e88e5;padding: 5px;border-radius: 10px;" class="form-control showpaymethod" name="paymethod" required>
                                            <option value="">Select Method</option>
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                            <option value="bKash">bKash</option>
                                            <option value="rocket">Rocket</option>
                                            <option value="nagad">Nagad</option>
                                            <option value="due">Due</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group row"  style="display: none" id="AccountNumberBox">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Account Box</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="acnumber" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="text" placeholder="Enter Account Info">
                                    </div>
                                </div><br>
                                <div style="text-align: center;display: none" class="showSubmitButton">
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
    function productQuntity(id) {
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
</script>
<script>
    $(document).ready(function () {
        $(".getqunatity").blur(function () {
            var qty = +$(this).val();
            var requirqty = '<?= $getallproduct ?>';
            var totalqty = parseInt(requirqty) + parseInt(qty);
            $("#settotalqty").val(totalqty);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".getDiscount").keyup(function () {
            var discount = $(this).val();
            var totalamount = +$(".getgrandtotal").val();
            var result = parseInt(totalamount) - parseInt(discount);
            $("#setgrosstotal").val(result);
            if (result > 0) {
                $(".setPaidbox").show();
                $(".showpaymethod").show();
            } else {
                $(".setPaidbox").hide();
                $(".showpaymethod").hide();
            }
        });

        $("#gettotalpaid").keyup(function () {
            var gettotalpaid = $(this).val();
            var totalbuyprice = +$('.getgrosstotal').val();
            var settotaldue = parseInt(totalbuyprice) - parseInt(gettotalpaid);
            $("#settotaldue").val(settotaldue);
        });
    });
</script>
<script>
    function numberOnly(id) {
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
    function numberOnlyTwo(id) {
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
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
                url: "{{route('storesingleproduct')}}",
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success: ($data) => {
                    alert($data);
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
        $('#showSupplierAccounts').show();
    });
</script>
@endif
<script>
    $(document).ready(function () {
        $("#getPaymethod").change(function () {
            var value = $(this).val();
            if (value === "cash" || value === "due") {
                $("#AccountNumberBox").hide();
                $(".showSubmitButton").show();
            } else {
                $("#AccountNumberBox").show();
                $(".showSubmitButton").show();
            }
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