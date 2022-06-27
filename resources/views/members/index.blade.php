@extends('mainpage')
@section('title','Members')
@section('content')
<div class="container-fluid">
    <div class="row" style="display: none" id="showSupplierBox">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h2>Add New Member</h2></center>
                    <form method="post" action="{{route('savemembers')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>ID No</b></label><br>
                                <div class="form-group">
                                    <input type="text" name="memberidno" id="getMemberid" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform: uppercase" placeholder="Enter ID No" required=""> 
                                    <span style="color: red;position: relative;top: 10px;left: 5px;" id="setAlert"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Rank</b></label><br>
                                <div class="form-group">
                                    <select name="memberrank" style="width:100%;border:1px solid #1e88e5;border-radius: 10px;" class="form-control multipleselect" required="">
                                        <option value="">Select Rank</option>
                                        <?php
                                        foreach ($getmemrank as $value) {
                                            ?>
                                            <option value="<?= $value->shortname ?>"><?= $value->rankname ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Name</b></label><br>
                                <div class="form-group">
                                    <input type="text" name="membername" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform: capitalize" placeholder="Enter Name" required="">     
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Contact</b></label><br>
                                <div class="form-group">
                                    <input type="text" name="memberphone" oninput="numberOnlyTwo(this.id)" id="1" maxlength="11" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" placeholder="Enter Phone Number" required="">                                
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info" id="showSavebtn" style="display:none;border-radius: 10px;margin-top: 20px;" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" onclick="memberPage()" class="btn btn-dark" style="border-radius: 10px;margin-top: 20px;"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-users"></i> Manage Members</h3><br>
                    <button type="button" style="float: right;position: relative;bottom: 30px;" class="btn btn-info btn-rounded" id="addMembers"><i class="fa fa-plus"></i> Add New Member</button>
                    <br><br>
                    <form action="{{route('searchmember')}}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Member ID</b></label>
                                <div class="form-group">
                                    <input type="hidden" name="memno" id="setcustomeridno">
                                    <select id="memberidno" class="form-control searchmember" style="width:100%;border:1px solid #1e88e5;border-radius: 10px;"></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Member Name</b></label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Contact Number</b></label>
                                <div class="form-group">
                                    <input type="number" name="contact" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">
                                </div>
                            </div>
                        </div>
                        <center>
                        <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top: 20px"><i class="fa fa-search"></i> Search</button>
                        </center>
                    </form>
                    <div class="table-responsive">
                        <div class="pull-left">
                            {!! $getmembers->links() !!}
                        </div>
                        <center><h2><b>Total Member :: {{$totalmembers}} <i class="fa fa-users"></i></b></h2></center>
                        <table data-page-length='100' class="table table-striped table-bordered allTable">
                            <span style="float: right;margin-top: -5px;margin-right:20px;">Search 100 Records/Page</span><br>
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">ID No</th>
                                    <th style="text-align: center">Rank</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Contact</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getmembers as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center">{{ ($getmembers->currentpage()-1) * $getmembers->perpage()+ $i}}</td>
                                        <td style="text-align: center"><?= $value->memberidno ?></td>
                                        <td style="text-align: center"><?= $value->memberrank ?></td>
                                        <td style="text-align: center"><?= $value->membername ?></td>
                                        <td style="text-align: center"><?= $value->memberphone ?></td>
                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-info mangeMembers" id="<?= $value->memid ?>" value="edit" style="border-radius: 10px;text-align: center" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button class="btn waves-effect waves-light btn-danger mangeMembers" id="<?= $value->memid ?>" value="delete" style="border-radius: 10px;text-align: center" title="Delete"><i class="fa fa-trash"></i></button>
                                            <button class="btn waves-effect waves-light btn-primary" onclick="window.location.href ='{{URL::to('membersales/'.$value->memberidno)}}'" style="border-radius: 10px;text-align: center" title="Sales"><i class="fa fa-shopping-bag"></i></button>
                                            <button class="btn waves-effect waves-light btn-success" onclick="window.location.href ='{{URL::to('memcollection/'.$value->memberidno)}}'" style="border-radius: 10px;text-align: center" title="Collections"><i class="fa fa-money-bill-alt"></i></button>
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
                <h4 class="modal-title" id="exampleModalLabel1">Update Member Data</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('updatemember')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Member ID</label><br>
                            <div class="form-group">
                                <input type="hidden" name="memberid" id="memberid">
                                <input type="text" name="memberidno" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="setmemberidno" readonly=""> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Rank</label><br>
                            <div class="form-group">
                                <select name="memberrank" style="width:100%;border:1px solid #1e88e5;border-radius: 10px;" class="form-control" id="memberrank" required="">
                                    <option value="">Select Rank</option>
                                    <?php
                                    foreach ($getmemrank as $value) {
                                        ?>
                                        <option value="<?= $value->shortname ?>"><?= $value->rankname ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Member Name</label><br>
                            <div class="form-group">
                                <input type="text" name="membername" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="membername" required=""> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Member Phone</label><br>
                            <div class="form-group">
                                <input type="text" name="memberphone" oninput="numberOnly(this.id)" class="form-control" maxlength="11" style="border-radius:10px;border:1px solid #1e88e5;" id="memberphone" required=""> 
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
<script>
    $(document).ready(function () {
        $(document).on('click', '#addMembers', function () {
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
        $(document).on('blur', '#getMemberid', function () {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("check_duplicate_member")}}',
                    data: {value: value},
                    async: false,
                    dataType: 'text',
                    success: function (data) {
                        if (data === "Yes") {
                            $('#setAlert').html('This ID Already Exist !');
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
                            id: item.memid
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
            var id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to("getmemberinformationbyid")}}',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    $("#setcustomeridno").val(data.customeridno);
                },
                error: function () {
                    alert('Result not found');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.mangeMembers', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            if (value === "edit") {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("gete_member_info")}}',
                    data: {id: id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#memberid').val(data.memid);
                        $('#setmemberidno').val(data.memberidno);
                        $('#memberrank').val(data.memberrank);
                        $('#membername').val(data.membername);
                        $('#memberphone').val(data.memberphone);
                        $('#memberemi').val(data.memberemi);
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
                        Swal(window.location.href = '{{URL::to("deletememberdata")}}' + '/' + id);
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#members').addClass('active');
        $('.managemam').addClass('active');
    });
</script>
@endsection