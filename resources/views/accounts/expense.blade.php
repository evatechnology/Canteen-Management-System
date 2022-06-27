@extends('mainpage')
@section('title','Expense')
@section('content')
<div class="container-fluid">
    <div class="row" style="display: none" id="showSupplierBox">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h2>Add New Expense</h2></center>
                    <form method="post" action="{{route('dailyexpenses')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Expense Date</b></label><br>
                                <div class="form-group">
                                    <input type="text" name="expdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" value="<?= date('d-m-Y') ?>" required=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Expense By</b></label><br>
                                <div class="form-group">
                                    <input type="text" name="expby" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform: capitalize" placeholder="Enter Expense By Name" required=""> 
                                </div>
                            </div>
                        </div><br>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">S/N</th>
                                    <th style="text-align: center;">Expense Name</th>
                                    <th style="text-align: center;">Expense Amount</th>
                                    <th style="text-align: center;">Expense Remarks</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;" id="moreItems">
                                <tr>
                                    <td class="serial_no">1</td>
                                    <td><input type="text" name="exptype[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Expense Name" required=""></td>                                      
                                    <td><input type="number" name="expamount[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Amount" required=""></td>                                      
                                    <td style="width: 35%;"><textarea rows="3" name="expremarks[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">N/A</textarea></td>                                      
                                    <td><button  class="btn btn-info" type="button" id="addMore" style="border-radius:10px;"><i class="fa fa-plus"></i></button></td>                                       
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: center;">
                            <button type="button" class="btn btn-wide btn-o btn-danger" id="closeBox" style="border-radius:10px"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-wide btn-o btn-info" style="border-radius:10px" onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle-o"></i> Save</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-money-bill-alt"></i> All Expenses</h3><br>
                    <button type="button" style="float: right;position: relative;bottom: 30px;" class="btn btn-info btn-rounded" id="addNewSuppliers"><i class="fa fa-plus"></i> Add New Expense</button>
                    <div class="table-responsive">
                        <center><h2><b>Total Expense: <?= $expensesamount ?> BDT</b></h2></center>
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Type</th>
                                    <th style="text-align: center">Amount</th>
                                    <th style="text-align: center">Remarks</th>
                                    <th style="text-align: center">By</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getexpenses as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= date('d-m-Y', strtotime($value->expdate)) ?></td>
                                        <td style="text-align: center"><?= $value->exptype ?></td>
                                        <td style="text-align: center"><?= $value->expamount ?></td>
                                        <td style="text-align: center"><?= $value->expremarks ?></td>
                                        <td style="text-align: center"><?= $value->expby ?></td>
                                        <td style="text-align: center">      
                                            <!--<button class="btn waves-effect waves-light btn-primary manageExpense" id="<?= $value->id ?>" value="edit" style="border-radius: 10px;text-align: center" title="Edit"><i class="fa fa-edit"></i></button>-->
                                            <button class="btn waves-effect waves-light btn-danger manageExpense" id="<?= $value->id ?>" value="delete" style="border-radius: 10px;text-align: center" title="Delete"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title" id="exampleModalLabel1">Update Expense Data</h4><br>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('updatemember')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label><b>Expense Amount</b></label>
                            <div class="form-group">
                                <input type="hidden" name="expid" id="setsetid"> 
                                <input type="text" name="expamount" id="setexpamount" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-align:center" required=""> 
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Update</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', 'select[name="expby"]', function () {
            var value = $(this).val();
            if (value === "NotFound") {
                $('#hddenBox_1').hide();
                $('#showBox_1').show();
                $('#setvalue_1').val(value);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#addNewSuppliers', function () {
            $("#showSupplierBox").fadeIn();
        });
        $(document).on('click', '#closeBox', function () {
            $("#showSupplierBox").fadeOut();
        });
    });</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addMore").click(function () {
            var n = ($('#moreItems tr').length - 0) + 1;
            var tr = '<tr>' +
                    '<td class="serial_no">' + n + '</td>' +
                    '<td style="width:30%;"><input type="text" name="exptype[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Expense Name" required=""></td>' +
                    '<td><input type="number" name="expamount[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Amount" required=""></td>' +
                    '<td style="width: 35%;"><textarea rows="3" name="expremarks[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">N/A</textarea></td>' +
                    '<td><button  class="btn-danger remCF" style="border-radius:10px;">Delete</button></td>' +
                    '</tr>';
            $("#moreItems").append(tr);
        });
        $(document).delegate('button.remCF', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#moreItems tr').each(function (index) {
                $(this).find('.serial_no').html(index + 1);
            });
            return true;
        });
    });</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.manageExpense', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            if (value === "edit") {
                var currow = $(this).closest("tr");
                var col3 = currow.find('td:eq(3)').html();
                $('#setsetid').val(id);
                $('#setexpamount').val(col3);
                $('#updateModal').modal('show');
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        Swal(window.location.href = '{{URL::to("deleteexpensedata")}}' + '/' + id);
                    }
                });
            }
        });
    });</script>
<script>
    $(document).ready(function () {
        $('#posaccounts').addClass('active');
        $('.posexpense').addClass('active');
    });
</script>
@endsection