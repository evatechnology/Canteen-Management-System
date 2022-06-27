@extends('mainpage')
@section('title','Products')
@section('content')
<div class="row page-titles header_bootom">
    <div class="col-md-8 col-12 align-self-center">
        <h4><i class="fa fa-gift"></i> Supplier Products Information For <b><?= $getsuppliers->suppname ?></b></h4>
    </div>
    <div class="col-md-4 col-12 align-self-center d-none d-md-block">
        <div class="d-flex mt-2 justify-content-end">
            <div class="d-flex ml-2">
                <button type="button" style="float: right" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex active" data-bs-toggle="tab" href="#home2" role="tab">
                                <span><i class="ti-gift"></i></span>&nbsp;&nbsp;<span class="d-none d-md-block ms-2"> Daily Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex" data-bs-toggle="tab" href="#messages2" role="tab">
                                <span><i class="ti-bar-chart"></i></span>&nbsp;&nbsp;<span class="d-none d-md-block ms-2"> Reports</span>
                            </a>
                        </li>
                    </ul><br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home2" role="tabpanel">
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Date & Time</th>
                                            <th style="text-align: center">Total Products</th>
                                            <th style="text-align: center">Total Amount</th>
                                            <th style="text-align: center">Total Paid</th>
                                            <th style="text-align: center">Total Due</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($prosuppliers as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center"><?= $i ?></td>
                                                <td style="text-align: center"><?= date('d-M-Y', strtotime($value->proindate)) ?>, <?= $value->prointime ?></td>
                                                <td style="text-align: center"><?= $value->total_qty ?></td>
                                                <td style="text-align: center"><?= $value->total_paid + $value->total_due ?> BDT</td>
                                                <td style="text-align: center"><?= $value->total_paid ?> BDT</td>
                                                <td style="text-align: center"><?= $value->total_due ?> BDT</td>
                                                <td style="text-align: center">      
                                                    <button class="btn waves-effect waves-light btn-primary supllierproducts" style="border-radius: 10px;text-align: center" title="View"><i class="fa fa-gift"></i></button>
                                                </td>
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
                            <form action="#" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>From Date</b></label><br>
                                        <div class="form-group">
                                            <input type="text" name="fdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= date('d-m-Y') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>To Date</b></label><br>
                                        <div class="form-group">
                                            <input type="text" name="tdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= date('d-m-Y') ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top:20px;"><i class="fa fa-search"></i> Search</button>
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
<script>
    $(document).ready(function () {
        $('#Suppliers').addClass('active');
    });
</script>
@endsection