@extends('mainpage')
@section('title','Alter Sales')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center>
                        <h2>Product Sales (Search By Manual Product Code)</h2><br>
                    </center><br>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <select class="livesearch form-control p-3" id="addMore" name="livesearch" style="width: 100%"></select>
                        </div>
                        <div class="col-md-3"></div>
                    </div><br>
                    <div class="table-responsive">
                        <form action="{{route('saleproducts')}}" method="post">
                            @csrf
                            <input type="hidden" name="redirect" value="alter">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">S/N</th>
                                        <th style="text-align: center;">Product</th>
                                        <th style="text-align: center;">Size</th>
                                        <th style="text-align: center;">Stock Qty</th>
                                        <th style="text-align: center;">Sale Price</th>
                                        <th style="text-align: center;">Sale Qty</th>
                                        <th style="text-align: center;">Total</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;" id="items"></tbody>
                                <tfoot style="display: none" id="showSalebox">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                       
                                        <td></td>                                       
                                        <td>
                                            <input type="hidden" name="received" value="<?= $posaccounts->received ?>">
                                            <input type="hidden" name="allstockqty" id="setgstockqty">                                     
                                            <input type="hidden" name="tosaleqty" id="totalsaleqty">
                                            <input type="hidden" name="amountwords" id="amountwords">
                                        </td>                                       
                                        <td><center><b>Sub Total(BDT)</b></center></td>                                       
                                <td><input class="form_control getsubtotal" name="gtotal" type="number" id="grandtotal" style="width: 100%;border: 1px solid #1e88e5;padding: 6px;text-align: center;border-radius: 10px;" readonly></td>  
                                <td></td> 
                                </tr>                                     
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td><center><b>Discount(BDT)</b></center></td>                                       
                                <td><input type="text" class="get_discount" oninput="discountNumber(this.id);" id="discountdata" name="discount" style="width: 100%;border: 1px solid #1e88e5;padding: 6px;text-align: center;border-radius: 10px;" value="0"></td>  
                                <td></td> 
                                </tr>                                     
                                <tr>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td><center><b>Net Total(BDT)</b></center></td>                                       
                                <td><input type="number" class="form_control getnetTotal" name="nettotal" id="setnetTotal" style="width: 100%;border: 1px solid #1e88e5;padding: 6px;text-align: center;border-radius: 10px;" readonly=""></td>  
                                <td></td> 
                                </tr>     
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td><center><b>Payment(BDT)</b></center></td>                                       
                                <td><input type="text" class="getPayment" oninput="paymentNumber(this.id);" id="paymentData" name="payment" style="width: 100%;border: 1px solid #1e88e5;padding: 6px;text-align: center;border-radius: 10px;" placeholder="Enter Paymnet" required=""></td>  
                                <td></td> 
                                </tr>  
                                <tr>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td><center><b>Due Amount(BDT)</b></center></td>                                       
                                <td><input type="number" class="dueamount" name="dueamount" id="setDueamount" style="width: 100%;border: 1px solid #1e88e5;padding: 6px;text-align: center;border-radius: 10px;" readonly=""></td>  
                                <td></td> 
                                </tr> 
                                <tr>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td><center><b>Member ID</b></center></td>                                       
                                <td>
                                    <input type="hidden" name="memberidno" id="setcustomeridno">
                                    <select id="memberidno" class="form-control searchmember" style="width:100%;border:1px solid #1e88e5;border-radius: 10px;" required=""></select>
                                </td>  
                                <td></td> 
                                </tr>  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td></td>                                       
                                    <td><center>
                                    <button type="submit" id="saveButtonHide" class="btn" style="border-radius: 10px;background: #1e88e5;color: #fff" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                                </center></td>                                       
                                <td></td> 
                                </tr>  
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/')}}public/js/select2.min.js"></script>
<script>
</script>
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Enter Product Barcode',
        ajax: {
            url: '{{URL::to("ajaxsearch")}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.barcode,
                            id: item.id
                        };
                    })
                };
            },
            cache: true
        }
    });
</script>
<script type="text/javascript">
    $('.searchmember').select2({
        placeholder: 'Select Customer',
        ajax: {
            url: '{{URL::to("ajaxcustomersearch")}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.memberidno,
                            id: item.memid
                        };
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('change', '#memberidno', function () {
            var id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to("getmemberinformationbyid")}}',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    $("#setcustomeridno").val(data.customeridno);
                },
                error: function () {
                    alert('Result not found');
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '#addMore', function () {
            var id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to("get_product_information_byid")}}',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        $('#showSalebox').show();
                        var n = ($('#items tr').length - 0) + 1;
                        var tr = '<tr>' +
                                '<td class="serial_no">' + n + '</td>' +
                                '<td style="width: 35%;"><input type="hidden" name="barcode[]" value="' + data.barcode + '"><input type="hidden" name="productid[]" value="' + data.proid + '"><input type="text" class="form-control" name="proname[]" value="' + data.proname + '" style="border:1px solid #1e88e5;text-align: center;border-radius: 10px;" readonly=""></td>' +
                                '<td style="width:15%;"><input type="text" class="form-control" name="prosize[]" value="' + data.prosize + '" style="border:1px solid #1e88e5;text-align: center;border-radius: 10px;" readonly=""></td>' +
                                '<td style="width:15%;"><input type="text" class="form-control stockqty" name="stockqty[]" value="' + data.qunatity + '" style="border:1px solid #1e88e5;text-align: center;border-radius: 10px;" readonly=""></td>' +
                                '<td style="width:15%;"><input type="number" class="form-control price" name="price[]" value="' + data.prosale + '" style="border:1px solid #1e88e5;text-align: center;border-radius: 10px;" readonly=""></td>' +
                                '<td style="width:15%;"><input type="number" class="form-control qunatity" name="quantity[]" value="1" style="border:1px solid #1e88e5;text-align: center;border-radius: 10px;" required=""></td>' +
                                '<td style=""><input type="text" class="form-control result" name="subtotal[]" style="border:1px solid #1e88e5;text-align: center;border-radius: 10px;" readonly=""></td>' +
                                '<td><button class="btn-danger remCF"><i class="fa fa-trash"></i></button></td>' +
                                '</tr>';
                        if ($("tbody [value='" + data.barcode + "']").length < 1) {
                            $("#items").append(tr);
                            $('#addMore').val('');
                            $('.getPayment').val('');
                            $('.dueamount').val('');
                            var qty = +$('.qunatity').val();
                            var price = +$('.price').val();
                            var total = qty * price;
                            $('.result').val(total);
                            var tvalue = 0;
                            $('.result').each(function (i, e) {
                                tvalue += $(this).val() - 0;
                            });
                            $('#grandtotal').val(tvalue);
                            grand_total();
                        } else {
                            alert("You have already added this Product. You Can not add this again. Please update this Product Quantity!");
                        }
                        
                    }
                },
                error: function () {
                    alert('Product not found');
                }
            });
        });

        $('#items').delegate('.qunatity,.price', 'keyup', function () {
            var tr = $(this).parent().parent();
            var qty = tr.find('.qunatity').val();
            var price = tr.find('.price').val();
            var total = qty * price;
            tr.find('.result').val(total);

            var stockqty = +$('.stockqty').val();
            var gstockqty = 0;
            var qtyvalue = 0;
            $('.stockqty').each(function (i, e) {
                gstockqty += $(this).val() - 0;
            });
            $('.qunatity').each(function (i, e) {
                qtyvalue += $(this).val() - 0;
            });
            
//            if (qtyvalue > stockqty) {
//                alert("Quantities Should Be Less then Or Eqaul");
//            }
//            if (qtyvalue <= stockqty) {
//                alert('Pl');
//            } else {
//                alert("Quantities Should Be Less then Or Eqaul");
//            }
//
//            if (qtyvalue > gstockqty) {
//                $("#saveButtonHide").hide();
//            } else {
//                $("#saveButtonHide").show();
//            }

            $('#setgstockqty').val(gstockqty);
            grand_total();
        });
        function grand_total() {

            var qtvalue = 0;
            $('.qunatity').each(function (i, e) {
                qtvalue += $(this).val() - 0;
            });

            $('#totalsaleqty').val(qtvalue);
            var tvalue = 0;
            $('.result').each(function (i, e) {
                tvalue += $(this).val() - 0;
            });
            $('#grandtotal').val(tvalue);

            var getsubtotal = +$(".getsubtotal").val();
            var getdiscount = +$(".get_discount").val();
            var netTotal = parseInt(getsubtotal) - parseInt(getdiscount);
            $("#setnetTotal").val(netTotal);
        }
        jQuery(document).delegate('button.remCF', 'click', function (e) {
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
    $(document).ready(function () {
        $(document).on('keyup', '.get_discount', function () {
            var value = $(this).val();
            if (value) {
                var getsubtotal = +$(".getsubtotal").val();
                var netTotal = parseInt(getsubtotal) - parseInt(value);
                $("#setnetTotal").val(netTotal);
            } else {
                var getsubtotal = +$(".getsubtotal").val();
                var netTotal = parseInt(getsubtotal) - parseInt(0);
                $("#setnetTotal").val(netTotal);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('keyup', '.getPayment', function () {
            var value = $(this).val();
            if (value) {
                var gtotal = +$(".getnetTotal").val();
                var totaldue = parseInt(gtotal) - parseInt(value);
                $("#setDueamount").val(totaldue);
            } else {
                var gtotal = +$(".getnetTotal").val();
                var totaldue = parseInt(gtotal) - parseInt(0);
                $("#setDueamount").val(totaldue);
            }
        });
    });
</script>
<script>
    function discountNumber(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
    function paymentNumber(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
</script>
<script src="{{asset('/')}}public/num-to-words.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("blur", "#paymentData", function () {
            var inwords = $(".getnetTotal").val();
            var words = "";
            words = toWords(inwords);
            $("#amountwords").val(words);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.altersales').addClass('active');
    });
</script>
@endsection