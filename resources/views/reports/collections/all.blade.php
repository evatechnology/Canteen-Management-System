@extends('mainpage')
@section('title','Sale Products')
@section('content')
<?php
$salequantity = 0;
foreach ($saleproducts as $value) {
    $salequantity += $value->salequantity;
}
$totalamounts = 0;
foreach ($saleproinvoices as $value) {
    $totalamounts += $value->payment;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-money-bill-alt"></i> Sale Product Reports</h3><br>
                    <button type="button" style="float: right;margin-top: -40px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true"
                               class="nav-link active">
                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Sale Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#DueCollection" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Sale Amounts</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile">
                            <center><h2><b>Total Sale Quantities: {{$salequantity}}</b></h2></center>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center;font-weight: bold;color: #fff">S/N</th>
                                            <th style="text-align: center;font-weight: bold;color: #fff">Date & Time</th>
                                            <th style="text-align: center;font-weight: bold;color: #fff">Member</th>
                                            <th style="text-align: center;font-weight: bold;color: #fff">Product</th>
                                            <th style="text-align: center;font-weight: bold;color: #fff">Size</th>
                                            <th style="text-align: center;font-weight: bold;color: #fff">Price</th>
                                            <th style="text-align: center;font-weight: bold;color: #fff">Quantity</th>
                                            <th style="text-align: center;font-weight: bold;color: #fff">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($saleproducts as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $i ?></td>
                                                <td style="text-align: center"><?= date('d-m-Y', strtotime($value->saledate)) ?><br><?= $value->saletime ?></td>
                                                <td style="text-align: center;width: 20%"><?= $value->memberidno ?> <?= $value->memberrank ?> <?= $value->membername ?></td>
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
                        <div class="tab-pane" id="DueCollection">
                            <center><h2><b>Total Amounts: {{$totalamounts}} BDT</b></h2></center>
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Time</th>
                                            <th style="text-align: center">Member</th>
                                            <th style="text-align: center">Invoice No</th>
                                            <th style="text-align: center">Quantity</th>
                                            <th style="text-align: center">Total</th>
                                            <th style="text-align: center">Paid</th>
                                            <th style="text-align: center">Due</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($saleproinvoices as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center"><?= $i ?></td>
                                                <td style="text-align: center"><?= $value->entrytime ?></td>
                                                <td style="text-align: center;width: 20%"><?= $value->memberidno ?> <?= $value->memberrank ?> <?= $value->membername ?></td>
                                                <td style="text-align: center"><?= $value->saleinvoice ?></td>
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
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#salesrepo').addClass('active');
    });
</script>
@endsection