@extends('mainpage')
@section('title','User Data')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card_body">
                <div class="card-body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-money-bill-alt"></i> Manage Users</h3><br>
                    <button type="button" style="float: right;position: relative;bottom: 30px;" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact"><i class="fa fa-plus"></i> Add New User</button>
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true"
                               class="nav-link active">
                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Active Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#DueCollection" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Inactive Users</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile">
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Photo</th>
                                            <th style="text-align: center">Name</th>
                                            <th style="text-align: center">Username</th>
                                            <th style="text-align: center">Role</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($activeusers as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center"><?= $i ?></td>
                                                <td style="text-align: center"><img src="{{URL::to($value->photo)}}" style="height:50px;width:50px;"></td>
                                                <td style="text-align: center"><?= $value->name ?></td>
        
                                                <td style="text-align: center"><?= $value->username ?></td>
                                                <td style="text-align: center"><?= $value->rolename ?></td>
                                                <td style="text-align: center">    
                                                    <button class="btn btn-o btn-success manageuserAccess" style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="0"  title="Inactive"><i class="fa fa-lock"></i></button>
                                                    <button class="btn btn-o btn-info manageuserAccess"  style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="edit"  title="Edit"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-o btn-danger manageuserAccess"  style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="remove"  title="Remove"><i class="fa fa-times"></i></button>
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
                        <div class="tab-pane" id="DueCollection">
                            <div class="table-responsive">
                                <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                                    <thead>
                                        <tr class="table_header">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Photo</th>
                                            <th style="text-align: center">Name</th>
                                            <th style="text-align: center">Username</th>
                                            <th style="text-align: center">Role</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($inactiveusers as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center"><?= $i ?></td>
                                                <td style="text-align: center"><img src="{{URL::to($value->photo)}}" style="height:50px;width:50px;"></td>
                                                <td style="text-align: center"><?= $value->name ?></td>
                                                <td style="text-align: center"><?= $value->username ?></td>
                                                <td style="text-align: center"><?= $value->rolename ?></td>
                                                <td style="text-align: center">    
                                                    <button class="btn btn-o btn-danger manageuserAccess" style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="1"  title="Active"><i class="fa fa-lock-open"></i></button>
                                                    <button class="btn btn-o btn-danger manageuserAccess"  style="border-radius:10px" style="text-align: center" id="<?= $value->id ?>" value="delete"  title="Delete"><i class="fa fa-trash"></i></button>
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
    </div>
</div>
<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Add New User & Access Information</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{route('save_newuser_details')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform: capitalize" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Last Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="lname" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform: capitalize" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email Address <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Contact <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="number" name="contact" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Photo <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="file" name="photo" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>User Role <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select name="role" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">
                                    <option value=""></option>
                                    @foreach($getroles as $value)
                                    <option value="{{$value->roleid}}">{{$value->rolename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="username" id="getUsername" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                                <span style="color: red;position: relative;left: 5px;top: 10px;" id="setwarning"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Password <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="password" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                            </div>
                        </div>
                    </div><br>
                    <div style="text-align: center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true" style="border-radius: 10px;margin-right:10px"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Save</button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">Update User & Access Information</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('update_user_details')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active changeinformation" id="Photo" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true" style="color: #000;font-weight: bold">Photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link changeinformation" id="Profile" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: #000;font-weight: bold">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link changeinformation" id="Access" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false" style="color: #000;font-weight: bold">Access</a>
                        </li>
                    </ul>
                    <!-- Tabs -->
                    <div class="tab-content" id="pills-tabContent">
                        <input type="hidden" name="userid" id="setid">
                        <input type="hidden" name="upstatus" id="upstatus" value="Photo">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span id="setphoto"></span><br><br>
                                        <input type="file" name="photo" onchange="readURL(this);" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">
                                    </div><br>
                                    <div style="text-align: center;">
                                        <button type="button" class="btn btn-danger text-white font-weight-medium" data-bs-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                                        <button type="submit" class="btn btn-info" id="showPhotobtn" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;display: none"><i class="fa fa-check-circle"></i> Update</button>
                                    </div> 
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Full Name</label>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;text-transform: capitalize" id="setname" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Email Address</label>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="setemail" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Contact</label>
                                    <div class="form-group">
                                        <input type="number" name="contact" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="setcontact" required="">
                                    </div>
                                </div>
                            </div><br>
                            <div style="text-align: center">
                                <button type="button" class="btn btn-danger text-white font-weight-medium" data-bs-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                            </div>   
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>User Role</label>
                                    <div class="form-group">
                                        <select name="role" class="form-control" id="setrole" style="border-radius:10px;border:1px solid #1e88e5;">
                                            <option value="">Select Role</option>
                                            @foreach($getroles as $value)
                                            <option value="{{$value->roleid}}">{{$value->rolename}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Username</label>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="setusername" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                    <div class="form-group">
                                        <input type="text" name="password" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="setspassword" required="">
                                    </div>
                                </div>
                            </div><br>
                            <div style="text-align: center">
                                <button type="button" class="btn btn-danger text-white font-weight-medium" data-bs-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                            </div> 
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('blur', '#getUsername', function () {
            var value = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to("check_duplicate_user")}}',
                data: {value: value},
                dataType: 'text',
                success: function (data) {
                    $('#setwarning').html(data);
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
        $(document).on('click', '.manageuserAccess', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            if (value === "edit") {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("gete_user_info")}}',
                    data: {id: id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#setid').val(data.id);
                        $('#setname').val(data.name);
                        $('#setemail').val(data.email);
                        $('#setcontact').val(data.contact);
                        $('#setphoto').html("<img src={{ URL::to('/') }}/" + data.photo + " style='height:100px;border-radius:10px;border-radius: 15px;border:5px solid #00635a' id='blah'/>");
                        $('#setrole').val(data.role);
                        $('#setusername').val(data.username);
                        $('#setspassword').val(data.dispassword);
                        $('#updateModal').modal('show');
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
            }
            else if (value === "remove") {
                Swal.fire({
                    title: 'Are You Sure ?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value) {
                        Swal(window.location.href = '{{URL::to("remove_delete_useraccess")}}' + '/' + id +'/'+ value);
                    }
                });
            } 
            else if (value === "delete") {
                Swal.fire({
                    title: 'Are You Sure ?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value) {
                        Swal(window.location.href = '{{URL::to("remove_delete_useraccess")}}' + '/' + id +'/'+ value);
                    }
                });
            } 
            else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value) {
                        Swal(window.location.href = '{{URL::to("update_useraccess")}}' + '/' + id + '/' + value);
                    }
                });
            }
        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            document.getElementById('showPhotobtn').style.display = 'block';
        } else {
            document.getElementById('showPhotobtn').style.display = 'none';
        }
    }
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.changeinformation', function () {
            var value = $(this).attr('id');
            $('#upstatus').val(value);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#administration').addClass('active');
        $('.users').addClass('active');
    });
</script>
@endsection