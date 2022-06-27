@extends('mainpage')
@section('title','Expense')
@section('content')
<?php
$expensesamount = 0;
foreach ($expensesdata as $value) {
    $expensesamount += $value->expamount;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <button type="button" style="border-radius: 10px;float: left" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <button type="button" class="btn btn-info" onclick="printDi('printarea')" style="border-radius: 10px;float: right"><i class="fa fa-print"></i> Print</button>
                    <div id="printarea">
                        <center><h2><b>Total Expenses: <?= $expensesamount ?> BDT</b></h2></center>
                        <table data-page-length='100' class="table table-striped table-bordered">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date & Time</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Amount</th>
                                    <th style="text-align: center">Remarks</th>
                                    <th style="text-align: center">By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($expensesdata as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= date('d-m-Y', strtotime($value->expdate)) ?>,&nbsp;<?= $value->exptime ?></td>
                                        <td style="text-align: center"><?= $value->exptype ?></td>
                                        <td style="text-align: center"><?= $value->expamount ?></td>
                                        <td style="text-align: center"><?= $value->expremarks ?></td>
                                        <td style="text-align: center"><?= $value->expby ?></td>
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
        $('#allreports').addClass('active');
        $('.expensesrepo').addClass('active');
    });
</script>
@endsection