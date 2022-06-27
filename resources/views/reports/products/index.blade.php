@extends('mainpage')
@section('title','Products')
@section('content')
<?php
$totalqunatity = 0;
foreach ($getproductstore as $value) {
    $totalqunatity += $value->olprodqty;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <button type="button" style="float: right;margin-top: -40px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
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
                    <center><h2><b>Total Products: {{$totalqunatity}}</b><b>Total Products: {{$totalqunatity}}</b></h2></center>
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