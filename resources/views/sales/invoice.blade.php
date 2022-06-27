@extends('mainpage')
@section('title','Sale Invoice')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <button type="button" style="float: left" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <button type="button" class="btn btn-info" onclick="printDi('printarea')" style="border-radius: 10px;float: right"><i class="fa fa-print"></i> Print</button>
                    <div id="printarea">
                        <div class="">
                            <center><h3><span style="text-transform: uppercase;font-size: 25px;">INVOICE</span></h3></center>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table" style="background: none">
                                        <tr style="border-top:none">
                                            <td style="border-top:none">
                                                <table style="background: none">
                                                    <h5 style="text-transform: uppercase">Member Details</h5>
                                                    <tr>
                                                        <td><span>ID No:</span></td>
                                                        <td>&nbsp;{{$saleproinvoice->memberidno}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Rank:</span></td>
                                                        <td>&nbsp;{{$saleproinvoice->memberrank}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Name:</span></td>
                                                        <td>&nbsp;{{$saleproinvoice->membername}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="max-width: 265px;border-top:none;margin-left: 100px">
                                                <table style="background: none">
                                                    <h5 style="text-transform: uppercase;margin-left: 10px;">Invoice Details</h5>
                                                    <tr>
                                                        <td>Invoice ID :&nbsp;</td>
                                                        <td>&nbsp;{{$saleproinvoice->saleinvoice}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Invoice Date :&nbsp;</td>
                                                        <td>&nbsp;{{date('d/m/Y',strtotime($saleproinvoice->invodate))}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr style="background:#F5F5F5;font-weight:bold;text-transform: uppercase">
                                                <th style="text-align: center;font-weight: bold;color:">S/N</th>
                                                <th style="text-align: center;font-weight: bold;color:">Name</th>
                                                <th style="text-align: center;font-weight: bold;color:">Price</th>
                                                <th style="text-align: center;font-weight: bold;color:">Quantity</th>
                                                <th style="text-align: center;font-weight: bold;color:">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            <?php
                                            $i = 1;
                                            foreach ($saleproboxs as $value) {
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i ?></td>
                                                    <td style="text-align: center;"><?= $value->saleproname ?></td>
                                                    <td style="text-align: center;"><?= $value->saleprice ?> BDT</td>
                                                    <td style="text-align: center;"><?= $value->salequantity ?></td>
                                                    <td style="text-align: center;"><?= $value->salesubtotal ?> BDT</td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <td style="border-top:none">
                                                <table style="background: none">
                                                    <tr>
                                                        <td style="width:350px;"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="max-width: 180px;border-top:none">
                                                <table class="table" style="background: none">
                                                    <tr>
                                                        <td><b>Grand Total</b></td>
                                                        <td>&nbsp;<b>{{$saleproinvoice->gtotal}}</b> BDT</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Discount</b></td>
                                                        <td>&nbsp;<b>{{$saleproinvoice->discount}}</b> BDT</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Net Total</b></td>
                                                        <td>&nbsp;<b>{{$saleproinvoice->nettotal}}</b> BDT</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Paid</b></td>
                                                        <td>&nbsp;<b>{{$saleproinvoice->payment}}</b> BDT</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Due</b></td>
                                                        <td>&nbsp;<b>{{$saleproinvoice->dueamount}}</b> BDT</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table><br><br>
                                    <center>
                                        <span style="position: relative;bottom: 70px;right:100px;font-weight: bold">
                                            In Words : 
                                            {{$saleproinvoice->inwords}} Taka<br><br>
                                        </span>
                                    </center>
                                </div>
                            </div>
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
        $('#todaysales').addClass('active');
    });
</script>
@endsection