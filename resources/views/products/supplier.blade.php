@extends('mainpage')
@section('title','Suppliers')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-users"></i> Supplier List</h3><br>
                    <h3 style="float: right;margin-top: -45px;">Total Amount: <b><?= $nettotal ?> BDT</b> &nbsp;&nbsp;Total Paid: <b><?= $paidamount ?> BDT</b>&nbsp;&nbsp;Due: <b><?= $dueamount ?> BDT</b></h3>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date & Time</th>
                                    <th style="text-align: center">Suppliers Name</th>
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
                                        <td style="text-align: center"><?= date('d-M-Y', strtotime($value->proindate)) ?></td>
                                        <td style="text-align: center"><?= $value->suppname ?></td>
                                        <td style="text-align: center"><?= $value->total_qty ?></td>
                                        <td style="text-align: center"><?= $value->total_paid + $value->total_due ?> BDT</td>
                                        <td style="text-align: center"><?= $value->total_paid ?> BDT</td>
                                        <td style="text-align: center"><?= $value->total_due ?> BDT</td>
                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-primary" onclick="window.location.href ='{{URL::to('supplierproducts/'.$value->supplier)}}'" style="border-radius: 10px;text-align: center" title="View"><i class="fa fa-gift"></i></button>
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
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#storeproduct').addClass('active');
        $('.getsupplier').addClass('active');
    });
</script>
@endsection