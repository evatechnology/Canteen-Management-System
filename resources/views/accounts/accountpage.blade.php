@extends('mainpage')
@section('title','Collections')
@section('content')
<?php
$totalQty = 0;
$totalAmount = 0;
$totalPaid = 0;
$totalDue = 0;

foreach ($saleproinvoices as $value) {
    $totalQty += $value->tosaleqty;
    $totalAmount += $value->nettotal;
    $totalPaid += $value->payment;
    $totalDue += $value->dueamount;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <center><h3><b><span>Total Sales: <?= $totalQty ?></span></b>&nbsp;&nbsp;<b><span>Total Amount: <?= $totalAmount ?> BDT</span></b> &nbsp;&nbsp;<b>Total Paid: <?= $totalPaid ?> BDT</b>&nbsp;&nbsp;<b>Total Due: <?= $totalDue ?> BDT</b></h3></center>
                    <button type="button" style="float: right;margin-top: -40px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <br>
                    <table data-page-length='100' class="table table-striped table-bordered">
                        <thead>
                            <tr class="table_header">
                                <th style="text-align: center">S/N</th>
                                <th style="text-align: center">Date & Time</th>
                                <th style="text-align: center">Invoice ID</th>
                                <th style="text-align: center">Member ID</th>
                                <th style="text-align: center">Total Sale</th>
                                <th style="text-align: center">Total Amount</th>
                                <th style="text-align: center">Paid Amount</th>
                                <th style="text-align: center">Due Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($saleproinvoices as $value) {
                                ?>
                                <tr>
                                    <td style="text-align: center"><?= $i ?></td>
                                    <td style="text-align: center"><?= date('d-m-Y', strtotime($value->invodate)) ?>, <?= $value->entrytime ?></td>
                                    <td style="text-align: center"><?= $value->saleinvoice ?></td>
                                    <td style="text-align: center"><?= $value->memberidno ?></td>
                                    <td style="text-align: center"><?= $value->tosaleqty ?></td>
                                    <td style="text-align: center"><?= $value->nettotal ?> BDT</td>
                                    <td style="text-align: center"><?= $value->payment ?> BDT</td>
                                    <td style="text-align: center"><?= $value->dueamount ?> BDT</td>
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
<script>
    $(document).ready(function () {
        $('#posaccounts').addClass('active');
        $('.possale').addClass('active');
    });
</script>
@endsection