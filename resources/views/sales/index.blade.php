@extends('mainpage')
@section('title','Sales')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-gift"></i> All Sales</h3><br>
                    <h3 style="float: right;margin-top: -45px;">Total Amount: <b><?= $nettotal ?> BDT</b> &nbsp;&nbsp;Total Sale: <b><?= $paidamount ?> BDT</b>&nbsp;&nbsp;Due: <b><?= $dueamount ?> BDT</b></h3>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
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
                                    <th style="text-align: center">Action</th>
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
                                        <td style="text-align: center">     
                                            <button class="btn waves-effect waves-light btn-info" onclick="window.location.href = '{{URL::to('saleinvoice/'.$value->id.'/invoice')}}'" style="border-radius: 10px;text-align: center" title="Invoice"><i class="fa fa-file"></i></button>
                                            <button class="btn waves-effect waves-light btn-primary" onclick="window.location.href = '{{URL::to('saleinvoice/'.$value->id.'/edit')}}'" style="border-radius: 10px;text-align: center" title="Products"><i class="fa fa-gift"></i></button>
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
    $('#managesalepro').addClass('active');
    $('.managesales').addClass('active');
    });
</script>
@endsection