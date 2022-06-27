<?php

use Illuminate\Support\Facades\DB;

$catproduct = DB::table('catproducts')->orderBy('product', 'asc')->where('category', $storeproduct->catname)->get();
$supplier = DB::table('suppliers')->where('supid', $prostoreinfo->supplier)->first();
?>
@extends('mainpage')
@section('title','Change Product')
@section('content')
<div class="container-fluid" onload="getCategory()">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <button type="button" class="btn btn-dark" onclick="window.location.href = '{{URL::to("storeproducts/manage")}}'" style="border-radius: 10px;float: right"><i class="fa fa-hand-point-left"></i> Back</button>
                    <center><h2>Update Product Details</h2></center><br>
                    <div class="row">
                        <div class="col-md-9">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="table_header">
                                        <th style="text-align: center">S/N</th>
                                        <th style="text-align: center">Barcode</th>
                                        <th style="text-align: center">Product</th>
                                        <th style="text-align: center">Size</th>
                                        <th style="text-align: center">Category</th>
                                        <th style="text-align: center">Stock Quantity</th>
                                        <th style="text-align: center">Sale Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center">#</td>
                                        <td style="text-align: center"><?= $storeproduct->barcode ?></td>
                                        <td style="text-align: center"><?= $storeproduct->product ?></td>
                                        <td style="text-align: center"><?= $storeproduct->prosize ?></td>
                                        <td style="text-align: center"><?= $storeproduct->catname ?></td>
                                        <td style="text-align: center"><?= $storeproduct->qunatity ?></td>
                                        <td style="text-align: center"><?= $storeproduct->sale ?> BDT</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <label><b>Product Change Status</b></label>
                            <div class="form-group">
                                <select id="productChangeStatus" name="prostatus" class="form-control" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                    <option value="">Select Status</option>
                                    <option value="add">Update Products</option>
                                    <option value="reduce">Return Products</option>
                                    <option value="remove">Delete Products</option>
                                    <!--<option value="return">Return Products</option>-->
                                    <option value="waste">Waste Products</option>
                                    <option value="sale">Update Sale Prices</option>
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div style="display:none" id="showeditprobox">
                        <form method="POST" action="{{route('addproquantities')}}">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="proinfoid" value="{{$prostoreinfo->proinfoid}}">
                                <input type="hidden" name="productid" value="{{$storeproduct->id}}">
                                <input type="hidden" name="prostatus" id="setvalue">
                                <input type="hidden" name="oldproname" value="{{$storeproduct->product}}">
                                <input type="hidden" name="oldprocatename" value="{{$storeproduct->category}}">
                                <input type="hidden" name="productsize" value="{{$storeproduct->prosize}}">
                                <input type="hidden" name="oldprice" value="{{$storeproduct->price}}">

                                <input type="hidden" name="oldsupplier" id="oldtotalqty" value="{{$prostoreinfo->supplier}}">
                                <input type="hidden" name="oldtotalqty" id="oldtotalqty" value="{{$prostoreinfo->totalqty}}">
                                <input type="hidden" name="oldtotalamount" id="oldtotalamount" value="{{$prostoreinfo->totalamount}}">
                                <input type="hidden" name="oldprodiscount" id="oldprodiscount" value="{{$prostoreinfo->prodiscount}}">
                                <input type="hidden" name="oldnettotal" id="oldnettotal" value="{{$prostoreinfo->nettotal}}">
                                <input type="hidden" name="oldpaidamount" id="oldpaidamount" value="{{$prostoreinfo->paidamount}}">
                                <input type="hidden" name="olddueamount" id="oldpaidamount" value="{{$prostoreinfo->dueamount}}">

                                <div class="col-md-3">
                                    <label><b>New Quantities<span style="color: red">*</span></b></label>
                                    <div class="form-group">
                                        <input type="hidden" name="totalquantity" id="totalquantity">
                                        <input type="number" oninput="numberOnly(this.id)" id="newquantity" name="newqty" class="form-control getQunatity" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Quantity" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Buy Price (Old Price =<?=$storeproduct->price?> BDT)<span style="color: red">*</span></b></label>
                                    <div class="form-group">
                                        <input type="number" name="buyprice" oninput="numberOnlyTwo(this.id)" id="perproprice" class="form-control getperProprice" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Price" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Total Price</b></label>
                                    <div class="form-group">
                                        <input type="number" name="totalprice" id="totalBuyingPrice" class="form-control gettotalBuyingPrice" style="border-radius:10px;border:1px solid #1e88e5;" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Supplier Name <span style="color: red">*</span></b></label>
                                    <div class="form-group">
                                        <select name="supplier" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">
                                            <option value="{{$supplier->supid}}">{{$supplier->suppname}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label><b>Discount <span style="color: red">*</span></b></label>
                                    <div class="form-group">
                                        <input type="number" name="newdiscount" oninput="numberOnlyFive(this.id)" id="getDiscount" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Dicount" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Net Total Amount</b></label>
                                    <div class="form-group">
                                        <input type="number" name="nettotal"  id="setgrosstotal" class="form-control getgrosstotal" style="border-radius:10px;border:1px solid #1e88e5;" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Paid Amount <span style="color: red">*</span></b></label>
                                    <div class="form-group">
                                        <input type="text" name="paidamount" id="gettotalpaid"  oninput="numberOnlySix(this.id)" class="form-control setPaidbox" style="display: none;border-radius:10px;border:1px solid #1e88e5;text-align: center" placeholder="Enter Paid Amount" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><b>Due Amount</b></label>
                                    <div class="form-group">
                                        <input type="number" name="dueamount" id="settotaldue" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-align: center" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label><b>Payment Method</b></label>
                                    <div class="form-group">
                                        <select id="getPaymethod" style="border:1px solid #1e88e5;padding: 5px;border-radius: 10px;" class="form-control" name="paymethod" required>
                                            <option value="">Select Method</option>
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                            <option value="bKash">bKash</option>
                                            <option value="rocket">Rocket</option>
                                            <option value="nagad">Nagad</option>
                                            <option value="due">Due</option>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display: none" id="AccountNumberBox">
                                    <label><b>Account Box</b></label>
                                    <div class="form-group">
                                        <input class="form-control" name="acnumber" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="text" placeholder="Enter Account Info">
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center">
                                <button type="button" class="btn btn-dark" style="border-radius: 10px;margin-right: 20px" onclick="window.location.href ='{{URL::to('/storeproducts/manage')}}'"><i class="fa fa-hand-point-left"></i> Back</button>
                                <button type="submit" class="btn btn-info" style="border-radius: 10px;display: none" id="showSubmitButton" onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Update</button>
                            </div> 
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="showModalBox" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">Reduce Product Quantities</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('reduceproqtities')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Reduce Quantities</label><br>
                            <div class="form-group">
                                <input type="hidden" name="proinfoid" value="{{$prostoreinfo->proinfoid}}">
                                <input type="hidden" name="productid" value="{{$storeproduct->id}}">
                                <input type="hidden" name="oldqunatity" value="{{$storeproduct->qunatity}}">
                                <input type="hidden" name="oldprice" value="{{$storeproduct->price}}">
                                <input type="hidden" name="productname" value="{{$storeproduct->product}}">
                                <input type="hidden" name="productcat" value="{{$storeproduct->category}}">
                                <input type="hidden" name="productsize" value="{{$storeproduct->prosize}}">

                                <input type="hidden" name="oldtotalqty" id="oldtotalqty" value="{{$prostoreinfo->totalqty}}">
                                <input type="hidden" name="oldtotalamount" id="oldtotalamount" value="{{$prostoreinfo->totalamount}}">
                                <input type="hidden" name="oldprodiscount" id="oldprodiscount" value="{{$prostoreinfo->prodiscount}}">
                                <input type="hidden" name="oldnettotal" id="oldnettotal" value="{{$prostoreinfo->nettotal}}">
                                <input type="hidden" name="oldpaidamount" id="oldpaidamount" value="{{$prostoreinfo->paidamount}}">
                                <input type="hidden" name="olddueamount" id="olddueamount" value="{{$prostoreinfo->dueamount}}">
                                <input type="number" name="reduceqty" oninput="numberOnlyFour(this.id)" id="reduceqty" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter....." required=""> 
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Update</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="saleModalBox" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">Update Sale Price</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('updatesaleprice')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Old Sale Price</label><br>
                            <div class="form-group">
                                <input type="hidden" name="proinfoid" value="{{$prostoreinfo->proinfoid}}">
                                <input type="hidden" name="productid" value="{{$storeproduct->id}}">
                                <input type="hidden" name="productname" value="{{$storeproduct->product}}">
                                <input type="hidden" name="productcat" value="{{$storeproduct->category}}">
                                <input type="hidden" name="productsize" value="{{$storeproduct->prosize}}">
                                <input type="number" name="oldprosale" id="upsaleprice" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="{{$storeproduct->sale}}" readonly=""> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>New Sale Price</label><br>
                            <div class="form-group">
                                <input type="number" name="upsaleprice" oninput="numberOnlyFive(this.id)" id="upsaleprice" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Sale Price....." required=""> 
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Update</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="wasteModalBox" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">Update Waste Products</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('updatewastepro')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Stock Products</label><br>
                            <div class="form-group">
                                <input type="hidden" name="proinfoid" value="{{$prostoreinfo->proinfoid}}">
                                <input type="hidden" name="productid" value="{{$storeproduct->id}}">
                                <input type="hidden" name="productname" value="{{$storeproduct->product}}">
                                <input type="hidden" name="productcat" value="{{$storeproduct->category}}">
                                <input type="hidden" name="productsize" value="{{$storeproduct->prosize}}">
                                <input type="hidden" name="oldtotalqty" value="{{$prostoreinfo->totalqty}}">
                                <input type="number" name="stockqty" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="{{$storeproduct->qunatity}}" readonly=""> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Waste Products</label><br>
                            <div class="form-group">
                                <input type="number" name="wastepros" oninput="numberOnlyFive(this.id)" id="wastepros" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Quantities....." required=""> 
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Update</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
    $(document).on('change', '#productChangeStatus', function () {
    var value = $(this).val();
    if (value === "add") {
    $("#showeditprobox").show();
    } else if (value === "reduce") {
    $("#showeditprobox").hide();
    $("#showModalBox").modal('show');
    } else if (value === "remove") {
    $("#showeditprobox").hide();
    var id = '<?= $storeproduct->id ?>';
    var prostoreid = '<?= $prostoreinfo->proinfoid ?>';
    Swal.fire({
    title: 'Are you sure ?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: "No"
    }).then((result) => {
    if (result.value) {
    Swal(window.location.href = '{{URL::to("deleteproduct")}}' + '/' + id + '/' + prostoreid);
    }
    });
    } else if (value === "waste") {
    $("#showeditprobox").hide();
    $("#wasteModalBox").modal('show');
    } else if (value === "sale") {
    $("#showeditprobox").hide();
    $("#saleModalBox").modal('show');
    } else {
    $("#showeditprobox").hide();
    }
    $("#setvalue").val(value);
    });
    });</script>
<script>
    $(document).ready(function () {
    $(".getQunatity").keyup(function () {
    var qty = + $(this).val();
    var oldqty = '<?= $storeproduct->qunatity ?>';
    var totalqty = parseInt(oldqty) + parseInt(qty);
    $("#totalquantity").val(totalqty);
    });
    });</script>
<script>
    $(document).ready(function () {
    $(".getperProprice").keyup(function () {
    var value = + $(this).val();
    var newquantity = + $("#newquantity").val();
    var totalnewamount = (parseInt(newquantity) * parseInt(value));
    $("#totalBuyingPrice").val(totalnewamount);
    });
    });</script>
<script>
    $(document).ready(function () {
    $("#getDiscount").keyup(function () {
    var discount = $(this).val();
    var totalamount = + $(".gettotalBuyingPrice").val();
    var result = parseInt(totalamount) - parseInt(discount);
    $("#setgrosstotal").val(result);
    if (result > 0) {
    $(".setPaidbox").show();
    $("#showSubmitButton").show();
    } else {
    $(".setPaidbox").hide();
    $("#showSubmitButton").hide();
    }
    });
    $("#gettotalpaid").keyup(function () {
    var gettotalpaid = $(this).val();
    var totalbuyprice = + $('.getgrosstotal').val();
    var settotaldue = parseInt(totalbuyprice) - parseInt(gettotalpaid);
    $("#settotaldue").val(settotaldue);
    });
    $("#getPaymethod").change(function () {
    var value = $(this).val();
    if (value === "cash" || value === "due") {
    $("#AccountNumberBox").hide();
    } else {
    $("#AccountNumberBox").show();
    }
    });
    });</script>
<script>
    $(document).ready(function () {
    $('#storeproduct').addClass('active');
    $('.managepro').addClass('active');
    });
</script>
@endsection