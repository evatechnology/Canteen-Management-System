@extends('mainpage')
@section('title','Products')
@section('content')
<?php
$totalqunatity = 0;
foreach ($getproductstore as $value) {
    $totalqunatity += $value->olprodqty;
}
$totalcost = 0;
foreach ($getproductacinfo as $value) {
    $totalcost += $value->paidamount;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-money-bill-alt"></i> Product Entry Reports</h3><br>
                    <button type="button" style="float: right;margin-top: -40px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true"
                               class="nav-link active">
                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">All Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#DueCollection" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">All Products Cost</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile">
                            <center><h2><b>Total Products: {{$totalqunatity}}</b></h2></center>
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Supplier</th>
                                            <th style="text-align: center">Barcode</th>
                                            <th style="text-align: center">Product</th>
                                            <th style="text-align: center">Size</th>
                                            <th style="text-align: center">Category</th>
                                            <th style="text-align: center">Quantity</th>
                                            <th style="text-align: center">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($getproductstore as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center"><?= $i ?></td>
                                                <td style="text-align: center"><?= $value->suppname ?></td>
                                                <td style="text-align: center"><?= $value->barcode ?></td>
                                                <td style="text-align: center"><?= $value->product ?></td>
                                                <td style="text-align: center"><?= $value->prosize ?></td>
                                                <td style="text-align: center"><?= $value->catname ?></td>
                                                <td style="text-align: center"><?= $value->olprodqty ?></td>
                                                <td style="text-align: center"><?= $value->price ?></td>
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
                            <center><h2><b>Total Cost: {{$totalcost}} BDT</b></h2></center>
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Date & Time</th>
                                            <th style="text-align: center">Suppliers</th>
                                            <th style="text-align: center">Quantities</th>
                                            <th style="text-align: center">Amounts</th>
                                            <th style="text-align: center">Paid</th>
                                            <th style="text-align: center">Due</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($getproductacinfo as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center"><?= $i ?></td>
                                                <td style="text-align: center"><?= date('d-M-Y', strtotime($value->proindate)) ?>, <?= $value->prointime ?></td>
                                                <td style="text-align: center"><?= $value->suppname ?></td>
                                                <td style="text-align: center"><?= $value->totalqty ?></td>
                                                <td style="text-align: center"><?= $value->nettotal ?> BDT</td>
                                                <td style="text-align: center"><?= $value->paidamount ?> BDT</td>
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
        $('#allreports').addClass('active');
        $('.supplierrepo').addClass('active');
    });
</script>
@endsection