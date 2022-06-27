@extends('mainpage')
@section('title','Collections')
@section('content')
<?php
$PaidAmount = 0;
foreach ($collections as $value) {
    $PaidAmount += $value->payment;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <div class="card-body">
                        <button type="button" style="float: left;margin-top: -20px;border-radius: 10px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-info" onclick="printDi('printarea')" style="border-radius: 10px;float: right"><i class="fa fa-print"></i> Print</button>
                        <div id="printarea">
                            <center>
                                <h4>Collection Information For <b><?= $getmembers->memberidno ?> <?= $getmembers->memberrank ?> <?= $getmembers->membername ?></b></h4><br>
                                <h4><i class="fa fa-money-bill-alt"></i> Total Paid: <b><?= $PaidAmount ?> BDT</b></h4>
                            </center>
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center;color: #000">S/N</th>
                                            <th style="text-align: center;color: #000">Date</th>
                                            <th style="text-align: center;color: #000">Invoice ID</th>
                                            <th style="text-align: center;color: #000">Total Amount</th>
                                            <th style="text-align: center;color: #000">Discount</th>
                                            <th style="text-align: center;color: #000">Net Total</th>
                                            <th style="text-align: center;color: #000">Paid Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php
                                        $i = 1;
                                        foreach ($collections as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $i ?></td>
                                                <td style="text-align: center;"><?= date('d/m/Y', strtotime($value->invodate)) ?></td>
                                                <td style="text-align: center;"><?= $value->saleinvoice ?></td>
                                                <td style="text-align: center;"><?= $value->gtotal ?> BDT</td>
                                                <td style="text-align: center;"><?= $value->discount ?> BDT</td>
                                                <td style="text-align: center;"><?= $value->nettotal ?> BDT</td>
                                                <td style="text-align: center;"><?= $value->payment ?> BDT</td>
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