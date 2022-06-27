@extends('mainpage')
@section('title','Sale Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-gift"></i> Today's Sale Products</h3><br>
                    <button type="button" style="float: right;position: relative;bottom:50px;" class="btn btn-dark btn-rounded" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Product</th>
                                    <th style="text-align: center">Size</th>
                                    <th style="text-align: center">Price</th>
                                    <th style="text-align: center">Quantity</th>
                                    <th style="text-align: center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $salequantity = 0;
                                $salesubtotal = 0;
                                foreach ($saleproboxs as $value) {
                                    $salequantity += $value->salequantity;
                                    $salesubtotal += $value->salesubtotal;
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= date('d-m-Y', strtotime($value->saledate)) ?></td>
                                        <td style="text-align: center"><?= $value->saleproname ?></td>
                                        <td style="text-align: center"><?= $value->saleprosize ?></td>
                                        <td style="text-align: center"><?= $value->saleprice ?> BDT</td>
                                        <td style="text-align: center"><?= $value->salequantity ?></td>
                                        <td style="text-align: center"><?= $value->salesubtotal ?> BDT</td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="text-align: center"></td>
                                     <td style="text-align: center"></td>
                                    <td style="text-align: center"></td>
                                    <td style="text-align: center"><b>Total Quantity</b></td>
                                    <td style="text-align: center"><b><?= $salequantity ?></b></td>
                                    <td style="text-align: center"><b>Sub Total</b></td>
                                    <td style="text-align: center"><b><?= $salesubtotal ?> BDT</b></td>
                                </tr>
                            </tfoot>
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