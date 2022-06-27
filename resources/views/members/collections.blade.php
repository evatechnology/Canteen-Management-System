@extends('mainpage')
@section('title','Sales')
@section('content')
<?php
$PaidAmount = 0;
foreach ($collections as $value) {
    $PaidAmount += $value->payment;
}
$DueAmount = 0;
foreach ($duecollections as $value) {
    $DueAmount += $value->dueamount;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <div class="card-body">
                        <h4><i class="fa fa-money-bill-alt"></i> Collection Information For <b><?= $getmembers->memberidno ?> <?= $getmembers->memberrank ?> <?= $getmembers->membername ?></b></h4><br>
                        <button type="button" style="float: right;margin-top: -40px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="true"
                                   class="nav-link active">
                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Monthly Collection of <b><?= date('F-Y') ?></b></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#DueCollection" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block">Due Collection of <b><?= date('F-Y') ?></b></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                    <span class="d-none d-lg-block"> Reports</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="profile">
                                <center><h4><i class="fa fa-money-bill-alt"></i> Total Paid: <b><?= $PaidAmount ?> BDT</b></h4></center>
                                <div class="table-responsive">
                                    <table data-page-length='100' class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="table_header">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Date</th>
                                                <th style="text-align: center">Invoice ID</th>
                                                <th style="text-align: center">Total Amount</th>
                                                <th style="text-align: center">Discount</th>
                                                <th style="text-align: center">Net Total</th>
                                                <th style="text-align: center">Paid Amount</th>
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
                                                    <td style="text-align: center;"><?= $value->saleinvoice ?> BDT</td>
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
                            <div class="tab-pane" id="DueCollection">
                                <center><h4><i class="fa fa-money-bill-alt"></i> Total Due: <b><?= $DueAmount ?> BDT</b></h4></center>
                                <div class="table-responsive">
                                    <table data-page-length='100' class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="table_header">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Date</th>
                                                <th style="text-align: center">Invoice ID</th>
                                                <th style="text-align: center">Total Amount</th>
                                                <th style="text-align: center">Discount</th>
                                                <th style="text-align: center">Net Total</th>
                                                <th style="text-align: center">Paid Amount</th>
                                                <th style="text-align: center">Due Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            <?php
                                            $i = 1;
                                            foreach ($duecollections as $value) {
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i ?></td>
                                                    <td style="text-align: center;"><?= date('d/m/Y', strtotime($value->invodate)) ?></td>
                                                    <td style="text-align: center;"><?= $value->saleinvoice ?> BDT</td>
                                                    <td style="text-align: center;"><?= $value->gtotal ?> BDT</td>
                                                    <td style="text-align: center;"><?= $value->discount ?> BDT</td>
                                                    <td style="text-align: center;"><?= $value->nettotal ?> BDT</td>
                                                    <td style="text-align: center;"><?= $value->payment ?> BDT</td>
                                                    <td style="text-align: center;"><?= $value->dueamount ?> BDT</td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">
                                <form action="{{route('membercollection')}}" method="GET">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label><b>Collections Type <span style="color: red">*</span></b></label><br>
                                            <div class="form-group">
                                                <select class="form-control" name="type" style="border-radius:10px;border:1px solid #1e88e5;float:left" required="">
                                                    <option value="">Select Type</option>
                                                    <option value="paid">Paid</option>
                                                    <option value="due">Due</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>From Date</b></label><br>
                                            <div class="form-group">
                                                <input type="text" name="fdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Select From Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>To Date</b></label><br>
                                            <div class="form-group">
                                                <input type="text" name="tdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Select To Date">
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
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
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top:20px;margin-left: 50px"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </form>
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
        $('#members').addClass('active');
        $('.managemam').addClass('active');
    });
</script>
@endsection