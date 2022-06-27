@extends('mainpage')
@section('title','Suppliers')
@section('content')
<div class="container-fluid">
    <div class="row" style="display: none" id="showSupplierBox">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h2>Add New Supplier</h2></center><br>
                    <form method="post" action="{{route('savesuppliers')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label><b>Supplier Name <span style="color: red">*</span></b></label><br>
                                <div class="form-group">
                                    <input type="text" name="suppname" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform:capitalize" placeholder="Enter Full Name" required=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label><b>Contact Number <span style="color: red">*</span></b></label><br>
                                <div class="form-group">
                                    <input type="text" name="suppmobile" oninput="numberOnly(this.id)" maxlength="11" id="getContactnumber" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Contact Number" required="">     
                                    <span style="color: red;position: relative;top: 10px;left: 5px;" id="setAlert"></span>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label><b>Email Address <span style="color: red">*</span></b></label><br>
                                <div class="form-group">
                                    <input type="email" name="suppemail" class="form-control" id="geteMailAddress" style="border-radius:10px;border:1px solid #1e88e5;" placeholder="Enter Email Address" required=""> 
                                    <span style="color: red;position: relative;top: 10px;left: 5px;" id="setAlertTwo"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label><b>Address <span style="color: red">*</span></b></label><br>
                                <div class="form-group">
                                    <textarea rows="3" name="suppaddress" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" placeholder="Enter Address" required=""></textarea>
                                </div>
                            </div>
                        </div><br>
                        <center>
                            <button type="button" onclick="memberPage()" class="btn btn-dark" style="border-radius: 10px;margin-top: 20px;"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-info" id="showSavebtn" style="display:none;border-radius: 10px;margin-top: 20px;" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <style>
                    .form-control-sm{
                        border: 1px solid #1e88e5;
                    }
                </style>
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-users"></i> Manage Suppliers</h3><br>
                    <button type="button" style="float: right;position: relative;bottom: 30px;" class="btn btn-primary btn-rounded" onclick="getSuppliers()"><i class="fa fa-file-excel"></i> Export in Excel</button>
                    <button type="button" style="float: right;position: relative;bottom: 30px;" class="btn btn-info btn-rounded" id="addNewSuppliers"><i class="fa fa-plus"></i> Add New Supplier</button>
                    <div class="table-responsive">
                        <div class="pull-left">
                            {!! $getsuppliers->links() !!}
                        </div>
                        <center><h2><b>Total Supplier :: {{$totalsuppliers}} <i class="fa fa-users"></i></b></h2></center>
                        <table data-page-length='100' class="table table-striped table-bordered allTable">
                            <span style="float: right;margin-top: -5px;margin-right:20px;">Search 100 Records/Page</span><br>
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Contact</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Address</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getsuppliers as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= $value->suppname ?></td>
                                        <td style="text-align: center"><?= $value->suppmobile ?></td>
                                        <td style="text-align: center"><?= $value->suppemail ?></td>
                                        <td style="text-align: center"><?= $value->suppaddress ?></td>
                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-info mangeData" id="<?= $value->supid ?>" value="edit" style="border-radius: 10px;text-align: center" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button class="btn waves-effect waves-light btn-danger mangeData" id="<?= $value->supid ?>" value="delete" style="border-radius: 10px;text-align: center" title="Delete"><i class="fa fa-trash"></i></button>
                                            <!--<button class="btn waves-effect waves-light btn-primary" onclick="window.location.href ='{{URL::to('suppliers/'.$value->supid )}}'" style="border-radius: 10px;text-align: center" title="Sales"><i class="fa fa-shopping-bag"></i></button>-->
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
                <h4 class="modal-title" id="exampleModalLabel1">Update Supplier Data</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('updatesuppliers')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Supplier Name</label><br>
                            <div class="form-group">
                                <input type="hidden" name="supid" id="supid">
                                <input type="text" name="suppname" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform:capitalize" id="suppname" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Contact Number</label><br>
                            <div class="form-group">
                                <input type="text" name="suppmobile" oninput="numberOnlyTwo(this.id)" maxlength="11" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="suppmobile" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Email Address</label><br>
                            <div class="form-group">
                                <input type="email" name="suppemail" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="suppemail" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Address</label><br>
                            <div class="form-group">
                                <textarea rows="3" name="suppaddress" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="suppaddress" required=""></textarea>                                  
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-weight-medium" data-bs-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff;border-radius: 10px"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Update</button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function getSuppliers() {
       window.location.href="{{URL::to('exportsuppliers')}}";
    }
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#addNewSuppliers', function () {
            $("#showSupplierBox").fadeIn();
        });
        $(document).on('click', '#closeBox', function () {
            $("#showSupplierBox").fadeOut();
        });
    });
    function memberPage() {
        document.getElementById('showSupplierBox').style.display = 'none';
    }
</script>
<script>
    function numberOnly(id) {
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
    function numberOnlyTwo(id) {
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
</script>
<script>
    $(document).ready(function () {
        $(document).on('blur', '#getContactnumber', function () {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("check_duplicate_supplier")}}',
                    data: {value: value, type: 'phone'},
                    async: false,
                    dataType: 'text',
                    success: function (data) {
                        if (data === "Yes") {
                            $('#setAlert').html('This Contact Already Exist !');
                            $('#showSavebtn').hide();
                        } else {
                            $('#setAlert').html(' ');
                            $('#showSavebtn').show();
                        }
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
            } else {
                $('#showSavebtn').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('blur', '#geteMailAddress', function () {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("check_duplicate_supplier")}}',
                    data: {value: value, type: 'email'},
                    async: false,
                    dataType: 'text',
                    success: function (data) {
                        if (data === "Yes") {
                            $('#setAlertTwo').html('This Email Already Exist !');
                            $('#showSavebtn').hide();
                        } else {
                            $('#setAlertTwo').html(' ');
                            $('#showSavebtn').show();
                        }
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
            } else {
                $('#showSavebtn').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.mangeData', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            if (value === "edit") {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("gete_supplier_info")}}',
                    data: {id: id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#supid').val(data.supid);
                        $('#suppname').val(data.suppname);
                        $('#suppmobile').val(data.suppmobile);
                        $('#suppemail').val(data.suppemail);
                        $('#suppaddress').val(data.suppaddress);
                        $('#updateModal').modal('show');
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
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
                        Swal(window.location.href = '{{URL::to("deletesupplierdata")}}' + '/' + id);
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#Suppliers').addClass('active');
    });
</script>
@endsection