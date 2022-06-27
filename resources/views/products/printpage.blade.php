@extends('mainpage')
@section('title','Print')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <button type="button" class="btn btn-dark" onclick="window.location.href = '{{URL::to("storeproducts/print")}}'" style="border-radius: 10px;float: left"><i class="fa fa-hand-point-left"></i> Back</button>
                    <button type="button" class="btn btn-info" onclick="printDi('printarea')" style="border-radius: 10px;float: right"><i class="fa fa-print"></i> Print</button>
                    <div id="printarea">
                        <center><h2>Category: <?= ucwords($categoryname) ?></h2></center><br>
                        <div class="row">
                            <?php
                            foreach ($getproductstore as $value) {
                                if ($value->filebarcode != "N/A") {
                                    ?>
                                    <div class="col-lg-3 col-md-3 mb-3">
                                        <span><b><?= $value->product ?></b></span><br>
                                        <img src="{{URL::to('/public/barcode/'.$value->filebarcode)}}" alt="user" class="img-fluid"><br>
                                        <span><b>#<?= $value->barcode ?></b></span><br>
                                        <span><b>Tk.<?= $value->sale ?></b></span><br>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDi(printarea) {
        var printContents = document.getElementById(printarea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<script>
    $(document).ready(function () {
        $('#storeproduct').addClass('active');
        $('.barcodeprint').addClass('active');
    });
</script>
@endsection