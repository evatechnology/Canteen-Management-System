@extends('mainpage')
@section('title','Add Products')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Store Products By Device</h3>
    </div>
    <div class="col-md-7 col-12 align-self-center d-none d-md-block">
        <div class="d-flex mt-2 justify-content-end">
            <div class="d-flex mr-3 ml-2">
                <div class="chart-text mr-2">
                    <h6 class="mb-0">
                        <button type="button" style="" class="btn btn-dark btn-rounded" onclick="window.location.href ='{{URL::to('storeproducts/add')}}'" ><i class="fa fa-arrow-left"></i> Back</button>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h3>Add New Products (<b>Total Quantities = <?= $suplyqty ?></b>)</h3></center><br>
                    <form action="{{route('saveproinfo')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Storing Date</b></label><br>
                                <div class="form-group">
                                    <input type="hidden" name="protype" value="<?= $protype ?>">
                                    <input type="hidden" name="stokpayment" value="<?= $posaccounts->payment ?>">
                                    <input type="hidden" name="suplyqty" value="<?= $suplyqty ?>">
                                    <input type="text" name="entrydate" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= $prodate ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Supplier</b></label><br>
                                <div class="form-group">
                                    <input type="hidden" name="supplier" value="<?= $getsuppliers->supid ?>">
                                    <input type="text" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= $getsuppliers->suppname ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Category</b></label><br>
                                <div class="form-group">
                                    <input type="text" name="category" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= $category ?>" readonly="">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="codescan" class="form-control resetcodescan" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Please keep me always blink" autofocus="">
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">S/N</th>
                                        <th style="text-align: center;">Barcode</th>
                                        <th style="text-align: center;">Product</th>
                                        <th style="text-align: center;">Size</th>
                                        <th style="text-align: center;">Quantity</th>
                                        <th style="text-align: center;">Buying</th>
                                        <th style="text-align: center;">Sale</th>
                                        <th style="text-align: center;">Sub Total</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;" id="items"></tbody>
                                <tfoot style="display: none" id="showSalebox">
                                    <tr>
                                        <td></td>
                                        <td><input type="hidden" class="gettotalqty" name="totalqty" id="qtvalue"></td>                                       
                                        <td></td>                                       
                                        <td></td>                                       
                                        <td colspan="2"><center><b>Grand Total</b></center></td>                                       
                                <td colspan="2"><input class="form-control getgrandtotal" name="totalamount" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="number" id="grandtotal" readonly></td>                                       
                                <td></td>                                       
                                </tr>
                                <tr>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td colspan="2"><center><b>Discount(BDT)</b></center></td>                                       
                                <td colspan="2"><input class="form-control getDiscount" name="prodiscount" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="number" placeholder="Enter Amount" required=""></td>                                       
                                <td></td>  
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td colspan="2"><center><b>Net Total</b></center></td>                                       
                                <td colspan="2"><input class="form-control getnettotal" name="nettotal" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="number" id="setnettotal" readonly=""></td>                                       
                                <td></td>                                       
                                </tr>
                                <tr>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td colspan="2"><center><b>Payment</b></center></td>                                       
                                <td colspan="2"><input class="form-control setpayment" name="paidamount" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="number" placeholder="Enter" required=""></td>                                       
                                <td></td>                                       
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td colspan="2"><center><b>Due Amount</b></center></td>                                       
                                <td colspan="2"><input class="form-control" name="dueamount" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="number" id="dueamount" readonly=""></td>                                       
                                <td></td>                                       
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2"><center><b>Payment Method</b></center></td>                                       
                                <td colspan="2">
                                    <select id="getPaymethod" style="border:1px solid #1e88e5;padding: 5px;border-radius: 10px;" class="form-control" name="paymethod" required>
                                        <option value="">Select</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank</option>
                                        <option value="bKash">bKash</option>
                                        <option value="rocket">Rocket</option>
                                        <option value="nagad">Nagad</option>
                                        <option value="due">Due</option>
                                    </select>
                                </td>                                       
                                <td></td>                                       
                                </tr>
                                <tr style="display: none;" id="showAcnumber">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                       
                                    <td colspan="2"><center><b>AC Box</b></center></td>                                       
                                <td colspan="2">
                                    <input class="form-control" name="acnumber" style="border-radius: 10px;text-align: center;border:1px solid #1e88e5;" type="text" placeholder="Enter Info">
                                </td>                                       
                                <td></td>                                       
                                </tr>
                                </tfoot>
                            </table>
                        </div><br>
                        <div style="text-align: center;display: none" id="showsubmitButton">
                            <button type="submit" class="btn btn-info" style="border-radius: 10px;" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/')}}public/scan/jquery-code-scanner.js"></script>
<script>
                                window.onload = function () {
                                    document.getElementById("codescan").focus();
                                };

</script>
<script>
    $('#codescan').codeScanner({
        onScan: function ($element, value) {
            $('#showSalebox').show();
            var res = value;
            var n = ($('#items tr').length - 0) + 1;
            var tr = '<tr>' +
                    '<td class="serial_no">' + n + '</td>' +
                    '<td><input type="text" name="barcode[]" value="' + res + '" style="border:1px solid #1e88e5;padding: 5px;text-align:center;border-radius: 10px;" readonly=""></td>' +
                    '<td style="width: 20%;">' +
                    '<select style="border:1px solid #1e88e5;padding: 5px;border-radius: 10px;" class="form-control" name="productid[]" required>' +
                    '<option value=""></option>' +
<?php
foreach ($getcatproducts as $value) {
    ?>
                '<option value="<?= $value->catproid ?>"><?= $value->product ?></option>' +
    <?php
}
?>
            '</select>' +
                    '</td>' +
                    '<td style="width:11%;">' +
                    '<select style="border:1px solid #1e88e5;padding: 5px;border-radius: 10px;" class="form-control" name="prosize[]" required>' +
                    '<option value=""></option>' +
<?php
foreach ($getsingledata as $value) {
    ?>
                '<option value="<?= $value->singledata ?>"><?= $value->singledata ?></option>' +
    <?php
}
?>
            '</select>' +
                    '</td>' +
                    '<td><input type="number" name="qunatity[]" class="qunatity" style="width:100%;border:1px solid #1e88e5;padding: 5px;text-align:center;border-radius: 10px;"required></td>' +
                    '<td><input type="number" name="price[]" class="price" style="width:100%;border:1px solid #1e88e5;padding: 5px;text-align:center;border-radius: 10px;"required></td>' +
                    '<td><input type="number" name="sale[]" style="width:100%;border:1px solid #1e88e5;padding: 5px;text-align:center;border-radius: 10px;"required></td>' +
                    '<td><input type="number" name="subtotal[]" class="result"  style="width:100%;border:1px solid #1e88e5;padding: 5px;text-align:center;border-radius: 10px;" readonly></td>' +
                    '<td><button  class="btn btn-danger remCF" style="border-radius:10px;"><i class="fa fa-trash"></i></button></td>' +
                    '</tr>';
            $("#items").append(tr);
            $(".resetcodescan").val('');
        }
    });
</script>
<script>
    $(document).ready(function () {
        $(document).delegate('button.remCF', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#items tr').each(function (index) {
                $(this).find('.serial_no').html(index + 1);
                grand_total();
            });
            return true;
        });
    });
</script>
<script>
    $('#items').delegate('.qunatity,.price', 'keyup', function () {
        var tr = $(this).parent().parent();
        var qty = tr.find('.qunatity').val();
        var price = tr.find('.price').val();
        var total = qty * price;
        var perproexp = 0;
        var totalprice = parseInt(perproexp) + parseInt(price);
        tr.find('.procost').val(totalprice);
        tr.find('.result').val(total);
        grand_total();
    });
    function grand_total() {
        var suplyqty = '<?= $suplyqty ?>';
        var qtvalue = 0;
        var tvalue = 0;
        $('.qunatity').each(function (i, e) {
            qtvalue += $(this).val() - 0;
        });
        $('.result').each(function (i, e) {
            tvalue += $(this).val() - 0;
        });
        $('#grandtotal').val(tvalue);
        $('#qtvalue').val(qtvalue);

        if (qtvalue <= suplyqty) {

        } else {
            alert("Quantities Should Be Less then Or Eqaul");
        }
    }
</script>
<script>
    $(document).ready(function () {
        $(".getDiscount").keyup(function () {
            var discount = $(this).val();
            var totalamount = +$(".getgrandtotal").val();
            var result = parseInt(totalamount) - parseInt(discount);
            $("#setnettotal").val(result);
        });
        $(".setpayment").keyup(function () {
            var payment = $(this).val();
            var nettotal = +$(".getnettotal").val();
            var result = parseInt(nettotal) - parseInt(payment);
            $("#dueamount").val(result);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#getPaymethod").change(function () {
            var value = $(this).val();
            if (value === "cash" || value === "due") {
                $("#showAcnumber").hide();
            } else {
                $("#showAcnumber").show();
            }
            $("#showsubmitButton").show();
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