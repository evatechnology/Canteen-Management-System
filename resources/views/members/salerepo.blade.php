@extends('mainpage')
@section('title','Sales')
@section('content')
<?php
$TotalQuantities = 0;
$TotalAmount = 0;
$Discount = 0;
$NetTotal = 0;
$PaidAmount = 0;
$DueAmount = 0;
foreach ($saleproinvoices as $value) {
    $TotalQuantities += $value->tosaleqty;
    $TotalAmount += $value->gtotal;
    $Discount += $value->discount;
    $NetTotal += $value->nettotal;
    $PaidAmount += $value->payment;
    $DueAmount += $value->dueamount;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <div class="table-responsive">
                        <button type="button" style="border-radius: 10px;float: left" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-info" onclick="printDi('printarea')" style="border-radius: 10px;float: right"><i class="fa fa-print"></i> Print</button>
                        <div id="printarea"><br>
                            <center><h4><i class="fa fa-gift"></i> Sale Information For <b><?= $getmembers->memberidno ?> <?= $getmembers->memberrank ?> <?= $getmembers->membername ?></b></h4></center>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="table_header">
                                        <th style="text-align: center">Total Quantities</th>
                                        <th style="text-align: center">Total Amount</th>
                                        <th style="text-align: center">Discount</th>
                                        <th style="text-align: center">Net Total</th>
                                        <th style="text-align: center">Paid Amount</th>
                                        <th style="text-align: center">Due Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center"><?= $TotalQuantities ?></td>
                                        <td style="text-align: center"><?= $TotalAmount ?> BDT</td>
                                        <td style="text-align: center"><?= $Discount ?> BDT</td>
                                        <td style="text-align: center"><?= $NetTotal ?> BDT</td>
                                        <td style="text-align: center"><?= $PaidAmount ?> BDT</td>
                                        <td style="text-align: center"><?= $DueAmount ?> BDT</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table data-page-length='100' class="table table-striped table-bordered">
                                <thead>
                                    <tr class="table_header">
                                        <th style="text-align: center;font-weight: bold;color:">S/N</th>
                                        <th style="text-align: center;font-weight: bold;color:">Date</th>
                                        <th style="text-align: center;font-weight: bold;color:">Product</th>
                                        <th style="text-align: center;font-weight: bold;color:">Size</th>
                                        <th style="text-align: center;font-weight: bold;color:">Price</th>
                                        <th style="text-align: center;font-weight: bold;color:">Quantity</th>
                                        <th style="text-align: center;font-weight: bold;color:">Total</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php
                                    $i = 1;
                                    foreach ($saleproboxs as $value) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $i ?></td>
                                            <td style="text-align: center;"><?= date('d/m/Y', strtotime($value->saledate ))?></td>
                                            <td style="text-align: center;"><?= $value->saleproname ?></td>
                                            <td style="text-align: center;"><?= $value->saleprosize ?></td>
                                            <td style="text-align: center;"><?= $value->saleprice ?> BDT</td>
                                            <td style="text-align: center;"><?= $value->salequantity ?></td>
                                            <td style="text-align: center;"><?= $value->salesubtotal ?> BDT</td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDi(printarea) {
        var printContents = document.getElementById(printarea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<script>
    $(document).ready(function () {
        $('#members').addClass('active');
        $('.managemam').addClass('active');
    });
</script>
@endsection