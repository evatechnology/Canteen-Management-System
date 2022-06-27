@extends('mainpage')
@section('title','Activities')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-gift"></i> All Product Activities</h3><br>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date & Time</th>
                                    <th style="text-align: center">Product</th>
                                    <th style="text-align: center">Size</th>
                                    <th style="text-align: center">Category</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Old</th>
                                    <th style="text-align: center">Change</th>
                                    <th style="text-align: center">Stock</th>
                                    <th style="text-align: center">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getproactivities as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= date('d-M-Y', strtotime($value->proactdate)) ?>,&nbsp;<?= $value->proacttime ?></td>
                                        <td style="text-align: center"><?= $value->proname ?></td>
                                        <td style="text-align: center"><?= $value->prosize ?></td>
                                        <td style="text-align: center"><?= $value->procate ?></td>
                                        <td style="text-align: center"><?= $value->procate ?></td>
                                        <?php if ($value->prostatus == "Upsale") { ?>
                                            <td style="text-align: center"><?= $value->prodataone ?> Tk.</td>
                                            <td style="text-align: center"><?= $value->prodatatwo ?> Tk.</td>
                                            <td style="text-align: center"><?= $value->prodatathree ?> Tk.</td>
                                        <?php } elseif ($value->prostatus == "Delete") { ?>
                                            <td style="text-align: center"><?= $value->prodataone ?> Qty</td>
                                            <td style="text-align: center">0</td>
                                            <td style="text-align: center">0</td>
                                        <?php } else { ?>
                                            <td style="text-align: center"><?= $value->prodataone ?> Qty</td>
                                            <td style="text-align: center"><?= $value->prodatatwo ?> Qty</td>
                                            <td style="text-align: center"><?= $value->prodatathree ?> Qty</td>
                                        <?php } ?>
                                        <td style="text-align: center"><?= $value->proremarks ?></td>
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
        $('#allreports').addClass('active');
        $('.proactivities').addClass('active');
    });
</script>
@endsection