@extends('mainpage')
@section('title','Collections')
@section('content')
<?php
$DueAmount = 0;
foreach ($getcollections as $value) {
    $DueAmount += $value->collection;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <div class="card-body">
                        <div id="printarea">
                            <center>
                                <h4><i class="fa fa-money-bill-alt"></i> Total Due Collections: <b><?= $DueAmount ?> BDT</b></h4>
                            </center>
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center;color: #fff">S/N</th>
                                            <th style="text-align: center;color: #fff">Date & Time</th>
                                            <th style="text-align: center;color: #fff">Invoice</th>
                                            <th style="text-align: center;color: #fff">Member</th>
                                            <th style="text-align: center;color: #fff">Total Amount</th>
                                            <th style="text-align: center;color: #fff">Last Due</th>
                                            <th style="text-align: center;color: #fff">Collections</th>
                                            <th style="text-align: center;color: #fff">Rest Due</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php
                                        $i = 1;
                                        foreach ($getcollections as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $i ?></td>
                                                <td style="text-align: center;"><?= date('d/m/Y', strtotime($value->colldate)) ?>, <?= $value->colltime ?></td>
                                                <td style="text-align: center;"><?= $value->invoiceno ?></td>
                                                <td style="text-align: center;width: 20%"><?= $value->memberidno ?> <?= $value->memberrank ?> <?= $value->membername ?></td>
                                                <td style="text-align: center;"><?= $value->totalamount ?> BDT</td>
                                                <td style="text-align: center;"><?= $value->lastpaiddue ?> BDT</td>
                                                <td style="text-align: center;"><?= $value->collection ?> BDT</td>
                                                <td style="text-align: center;"><?= $value->restdue ?> BDT</td>
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
<script>
    $(document).ready(function () {
        $('#posaccounts').addClass('active');
        $('.ducollection').addClass('active');
    });
</script>
@endsection