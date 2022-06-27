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
                    <h4><i class="fa fa-gift"></i> Sale Information For <b><?= $getmembers->memberidno ?> <?= $getmembers->memberrank ?> <?= $getmembers->membername ?></b></h4>
                    <button type="button" style="float: right;margin-top: -40px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex active" data-bs-toggle="tab" href="#home2" role="tab">
                                <span><i class="ti-shopping-cart"></i></span>&nbsp;&nbsp;<span class="d-none d-md-block ms-2"> Monthly Sales of <b><?= date('F-Y') ?></b></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex" data-bs-toggle="tab" href="#messages2" role="tab">
                                <span><i class="ti-bar-chart"></i></span>&nbsp;&nbsp;<span class="d-none d-md-block ms-2">Report</span>
                            </a>
                        </li>
                    </ul><br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home2" role="tabpanel">
                            <div class="table-responsive">
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
                        <div class="tab-pane p-3" id="messages2" role="tabpanel">
                            <form action="{{route('memberprosales')}}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>From Date</b></label><br>
                                        <div class="form-group">
                                            <input type="text" name="fdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Select From Date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><b>To Date</b></label><br>
                                        <div class="form-group">
                                            <input type="text" name="tdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Select To Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Month Wise </b></label><br>
                                        <div class="form-group">
                                            <select class="form-control" style="width: 50%;border-radius:10px;border:1px solid #1e88e5;float:left" name="month">
                                                <option value="">Month</option>
                                                <?php
                                                $i = 1;
                                                foreach ($monthname as $value) {
                                                    ?>
                                                    <option value="<?= $value->month ?>"><?= $value->month ?></option>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </select>
                                            <select class="form-control" style="width: 50%;border-radius:10px;border:1px solid #1e88e5;float: right" name="year">
                                                <option value="">Year</option>
                                                <?php for ($i = date('Y'); $i >= 2021; $i--) { ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="hidden" name="member" value="<?= $getmembers->memberidno ?>">

                                        </div>
                                    </div>
                                </div><br>
                                <center>
                                    <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top:20px;"><i class="fa fa-search"></i> Search</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#members').addClass('active');
        $('.managemam').addClass('active');
    });
</script>
@endsection