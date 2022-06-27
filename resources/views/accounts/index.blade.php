@extends('mainpage')
@section('title','Collections')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-money-bill-alt"></i> Sale Collections</h3><br>
                    <h3 style="float: right;margin-top: -45px;">Total Amount: <b><?= $nettotal ?> BDT</b> &nbsp;&nbsp;Total Paid: <b><?= $paidamount ?> BDT</b>&nbsp;&nbsp;Due: <b><?= $dueamount ?> BDT</b></h3>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date & Time</th>
                                    <th style="text-align: center">Invoice</th>
                                    <th style="text-align: center">Member</th>
                                    <th style="text-align: center">Total Amount</th>
                                    <th style="text-align: center">Paid Amount</th>
                                    <th style="text-align: center">Due Amount</th>
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
                                        <td style="text-align: center"><?= date('d-m-Y', strtotime($value->invodate)) ?>, <?= $value->entrytime ?></td>
                                        <td style="text-align: center"><?= $value->saleinvoice ?></td>
                                        <td style="text-align: center;width: 20%"><?= $value->memberidno ?> <?= $value->memberrank ?> <?= $value->membername ?></td>
                                        <td style="text-align: center"><?= $value->nettotal ?> BDT</td>
                                        <td style="text-align: center"><?= $value->payment ?> BDT</td>
                                        <td style="text-align: center"><?= $value->dueamount ?> BDT</td>
                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-info payDue" id="<?= $value->id ?>" style="border-radius: 10px;text-align: center" title="Pay"><i class="fa fa-money-bill-alt"></i></button>
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
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">Pay Due Amount</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('paydueinvoice')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Total Amount</label><br>
                            <div class="form-group">
                                <input type="hidden" name="received" value="<?= $posaccounts->received ?>"> 
                                <input type="hidden" name="dataid" id="setid"> 
                                <input type="hidden" name="saleinvoice" id="setsaleinvoice"> 
                                <input type="hidden" name="memberidno" id="setmember"> 
                                <input type="number" name="totalamount" id="setnettotal" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" readonly=""> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Total Paid</label><br>
                            <div class="form-group">
                                <input type="number" name="paidamount" id="setpayment" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" readonly=""> 
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Due Amount</label><br>
                            <div class="form-group">
                                <input type="number" name="olddueamount" id="olddueamount" class="form-control olddueamount" style="border-radius:10px;border:1px solid #1e88e5;" readonly=""> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Due Pay <span style="color: red">*</span></b></label><br>
                            <div class="form-group">
                                <input type="number" name="duepay" oninput="numberOnly(this.id)" class="form-control paymentdue" maxlength="11" style="border-radius:10px;border:1px solid #1e88e5;text-align: center" placeholder="Enter Due Pament" required=""> 
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer" id="hideSubmitBox">
                        <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Pay</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/')}}public/js/select2.min.js"></script>
<script>
</script>
<script type="text/javascript">
    $('.searchmember').select2({
        placeholder: 'Select Customer',
        ajax: {
            url: '{{URL::to("ajaxcustomersearch")}}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.memberidno,
                            id: item.memberidno
                        };
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('change', '#memberidno', function () {
            var data = $(this).val();
            $("#setcustomeridno").val(data);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.payDue', function () {
            var id = $(this).attr('id');
            $.ajax({
                type: 'GET',
                url: '{{URL::to("dueinvoiceinfo")}}',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    $('#setid').val(data.id);
                    $('#setnettotal').val(data.nettotal);
                    $('#setpayment').val(data.payment);
                    $('#olddueamount').val(data.dueamount);
                    $('#setsaleinvoice').val(data.saleinvoice);
                    $('#setmember').val(data.memberidno);
                    $('#updateModal').modal('show');
                },
                error: function () {
                    alert('Something is wrong !');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
//        $('.paymentdue').keyup(function () {
//            var value = $(this).val();
//            var due = $(".olddueamount").val();
//            if (value > due) {
//                $("#hideSubmitBox").hide();
//            } else {
//                $("#hideSubmitBox").show();
//            }
//        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#posaccounts').addClass('active');
        $('.possale').addClass('active');
    });
</script>
@endsection