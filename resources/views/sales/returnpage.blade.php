@extends('mainpage')
@section('title','Return Sales')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-reply"></i>Return Sale Products</h3><br>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Product</th>
                                    <th style="text-align: center">Size</th>
                                    <th style="text-align: center">Total Sale</th>
                                    <th style="text-align: center">Return</th>
                                    <th style="text-align: center">Return From</th>
                                    <th style="text-align: center">Date & Time</th>
                                    <th style="text-align: center">Return By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($saleactivities as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= $value->proname ?></td>
                                        <td style="text-align: center"><?= $value->prosize ?></td>
                                        <td style="text-align: center"><?= $value->totalqty ?></td>
                                        <td style="text-align: center"><?= $value->returnqty ?></td>
                                        <td style="text-align: center;width: 20%"><?= $value->memberidno ?> <?= $value->memberrank ?> <?= $value->membername ?></td>
                                        <td style="text-align: center;width: 20%"><?= date('d-m-Y', strtotime($value->retdate)) ?>, <?= $value->rettime ?></td>
                                        <td style="text-align: center"><?= $value->name ?></td>
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
        $('.salereturn').addClass('active');
    });
</script>
@endsection