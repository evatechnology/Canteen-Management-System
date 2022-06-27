@extends('mainpage')
@section('title','Collections')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-money-bill-alt"></i> Today's Collection</h3><br>
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true"
                               class="nav-link active">
                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">New Collection</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#DueCollection" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Due Collection</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Old Collection</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile">
                            <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                                <thead>
                                    <tr class="table_header">
                                        <th style="text-align: center">S/N</th>
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center">Invoice</th>
                                        <th style="text-align: center">Member</th>
                                        <th style="text-align: center">Total Amount</th>
                                        <th style="text-align: center">Paid Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($saleproinvoices as $value) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center"><?= $i ?></td>
                                            <td style="text-align: center"><?= date('d-m-Y', strtotime($value->invodate)) ?></td>
                                            <td style="text-align: center"><?= $value->saleinvoice ?></td>
                                            <td style="text-align: center;width: 20%"><?= $value->memberidno ?> <?= $value->memberrank ?> <?= $value->membername ?></td>
                                            <td style="text-align: center"><?= $value->nettotal ?> BDT</td>
                                            <td style="text-align: center"><?= $value->payment ?> BDT</td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="DueCollection">
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
                                    foreach ($dueinvoices as $value) {
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
                        <div class="tab-pane" id="settings">
                            <form action="{{route('collection')}}" method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>Collections Type <span style="color: red">*</span></b></label><br>
                                        <div class="form-group">
                                            <select class="form-control" name="type" style="border-radius:10px;border:1px solid #1e88e5;float:left" required="">
                                                <option value="">Select Type</option>
                                                <option value="paid">Paid</option>
                                                <option value="due">Due</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>From Date</b></label><br>
                                        <div class="form-group">
                                            <input type="text" name="fdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Select From Date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>To Date</b></label><br>
                                        <div class="form-group">
                                            <input type="text" name="tdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Select To Date">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>Members</b></label><br>
                                        <div class="form-group">
                                            <input type="hidden" name="member" id="setcustomeridno">
                                            <select id="memberidno" class="form-control searchmember" style="width:100%;border:1px solid #1e88e5;border-radius: 10px;"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top: 20px;"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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