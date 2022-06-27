@extends('mainpage')
@section('title','Sale Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <button type="button" style="float: right;border-radius: 10px;" class="btn btn-dark" onclick="window.history.back()" ><i class="fa fa-arrow-left"></i> Back</button>
                    <h3 class="text-themecolor mb-0"><i class="fa fa-gift"></i> Manage Sale Products</h3><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center;font-weight: bold;color: #fff">S/N</th>
                                    <th style="text-align: center;font-weight: bold;color: #fff">Name</th>
                                    <th style="text-align: center;font-weight: bold;color: #fff">Size</th>
                                    <th style="text-align: center;font-weight: bold;color: #fff">Price</th>
                                    <th style="text-align: center;font-weight: bold;color: #fff">Quantity</th>
                                    <th style="text-align: center;font-weight: bold;color: #fff">Total</th>
                                    <th style="text-align: center;font-weight: bold;color: #fff">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($saleproboxs as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i ?></td>
                                        <td style="text-align: center;"><?= $value->saleproname ?></td>
                                        <td style="text-align: center;"><?= $value->saleprosize ?></td>
                                        <td style="text-align: center;"><?= $value->saleprice ?> BDT</td>
                                        <td style="text-align: center;"><?= $value->salequantity ?></td>
                                        <td style="text-align: center;"><?= $value->salesubtotal ?> BDT</td>
                                        <td style="text-align: center;">
                                            <button class="btn waves-effect waves-light btn-warning manageProduct" id="{{$value->saleboxid}}" value="return" style="border-radius: 10px;text-align: center" title="Return"><i class="fa fa-reply"></i> Return</button>
                                            <!--<button class="btn waves-effect waves-light btn-info manageProduct" id="{{$value->saleboxid}}" value="change" style="border-radius: 10px;text-align: center" title="Change"><i class="fa fa-cubes"></i> Change</button>-->
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
<div class="modal fade" id="showeditprobox" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">Return Sale Products</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('returnsale')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Return Quantities <span style="color: red">*</span></b></label><br>
                            <div class="form-group">
                                <input type="hidden" name="saleinvoid" value="{{$saleproinvoice->id}}">
                                <input type="hidden" name="tosaleqty" value="{{$saleproinvoice->tosaleqty}}">
                                <input type="hidden" name="gtotal" value="{{$saleproinvoice->gtotal}}">
                                <input type="hidden" name="nettotal" value="{{$saleproinvoice->nettotal}}">
                                <input type="hidden" name="payment" value="{{$saleproinvoice->payment}}">
                                <input type="hidden" name="received" value="<?= $posaccounts->received ?>">
                                <input type="hidden" name="saleboxid" id="saleboxid">
                                <input type="hidden" name="saleprice" id="saleprice">
                                <input type="hidden" name="saleproid" id="saleproid">
                                <input type="hidden" name="proqunatity" id="proqunatity">
                                <input type="hidden" name="saleproname" id="saleproname">
                                <input type="hidden" name="saleprosize" id="saleprosize">
                                <input type="hidden" name="getmember" id="member">
                                <input type="number" class="form-control" name="salequantity" style="border-radius:10px;border:1px solid #1e88e5;" id="salequantity" readonly=""> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Return Quantities <span style="color: red">*</span></b></label><br>
                            <div class="form-group">
                                <input type="number" name="reqty" oninput="numberOnly(this.id)" id="qty" class="form-control getreturnqty" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Quantities" required=""> 
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer" id="hideSavebtn">
                        <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Return</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on("click", ".manageProduct", function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            if (value === "return") {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("sale_single_information_byid")}}',
                    data: {id: id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#saleboxid').val(data.saleboxid);
                        $('#saleproid').val(data.saleproid);
                        $('#proqunatity').val(data.qunatity);
                        $('#saleproname').val(data.saleproname);
                        $('#saleprosize').val(data.saleprosize);
                        $('#salequantity').val(data.salequantity);
                        $('#saleprice').val(data.saleprice);
                        $('#member').val(data.member);
                        $('#showeditprobox').modal('show');
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
            } else {
                $("#showeditprobox").show();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.getreturnqty').keyup(function () {
            var value = $(this).val();
            if (value > '0') {
                $("#hideSavebtn").show();
            } else {
                $("#hideSavebtn").hide();
            }
        });
    });
</script>
@if(Session::get('role')==6)
<script>
    $(document).ready(function () {
        $('#todaysales').addClass('active');
    });
</script>
@else
<script>
    $(document).ready(function () {
        $('#managesalepro').addClass('active');
        $('.managesales').addClass('active');
    });
</script>
@endif
@endsection