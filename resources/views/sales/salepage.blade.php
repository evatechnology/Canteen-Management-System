@extends('mainpage')
@section('title','Sale Products')
@section('content')

<?php
$salequantity = 0;
$salesubtotal = 0;
foreach ($saleproboxs as $value) {
    $salequantity += $value->salequantity;
    $salesubtotal += $value->salesubtotal;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-gift"></i> Month (<b><?= date('F-Y')?></b>) Wise Sale Products</h3><br>
                    <h3 style="float: right;margin-top: -45px;"><b>Total Quantities: <?= $salequantity ?></b> &nbsp;&nbsp;<b>Total Prices: <?= $salesubtotal ?></b></h3>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date & Time</th>
                                    <th style="text-align: center">Members</th>
                                    <th style="text-align: center">Product</th>
                                    <th style="text-align: center">Size</th>
                                    <th style="text-align: center">Price</th>
                                    <th style="text-align: center">Quantity</th>
                                    <th style="text-align: center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($saleproboxs as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= date('d-m-Y', strtotime($value->saledate)) ?><br><?= $value->saletime ?></td>
                                        <td style="text-align: center;width: 20%"><?= $value->memberidno ?> <?= $value->memberrank ?> <?= $value->membername ?></td>
                                        <td style="text-align: center"><?= $value->saleproname ?></td>
                                        <td style="text-align: center"><?= $value->saleprosize ?></td>
                                        <td style="text-align: center"><?= $value->saleprice ?> BDT</td>
                                        <td style="text-align: center"><?= $value->salequantity ?></td>
                                        <td style="text-align: center"><?= $value->salesubtotal ?> BDT</td>
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
<script>
    $(document).ready(function () {
        $('#managesalepro').addClass('active');
        $('.viewsales').addClass('active');
    });
</script>
@endsection