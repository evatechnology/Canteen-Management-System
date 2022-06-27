@extends('mainpage')
@section('title','Profile')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">User Profile</h3>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"> <img src="{{URL::to($userdetails->photo)}}" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-2">{{$userdetails->name}}</h4>
                        <h6 class="card-subtitle"></h6>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true" style="color: #000;font-weight: bold">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: #000;font-weight: bold">Access</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Name</strong>
                                    <br>
                                    <p class="text-muted">{{$userdetails->name}}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">{{$userdetails->contact}}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{$userdetails->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Role</strong>
                                    <br>
                                    <p class="text-muted">{{$userdetails->rolename}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Username</strong>
                                    <br>
                                    <p class="text-muted">{{$userdetails->username}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Password</strong>
                                    <br>
                                    <p class="text-muted">{{$userdetails->dispassword}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <center>
                    <button type="button" id="manageuserAccess" value="{{$userdetails->id}}" class="btn btn-info btn-rounded"><i class="fa fa-edit"></i> Edit Profile</button>
                </center>
            </div>
        </div>
    </div>
</div>
<div id="updateModal" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Update User & Access Information</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('upuserinfo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active changeinformation" id="Photo" data-toggle="pill" href="#userPhoto" role="tab" aria-controls="pills-timeline" aria-selected="true" style="color: #000;font-weight: bold">Photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link changeinformation" id="Profile" data-toggle="pill" href="#userProfile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: #000;font-weight: bold">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link changeinformation" id="Access" data-toggle="pill" href="#userAccess" role="tab" aria-controls="pills-setting" aria-selected="false" style="color: #000;font-weight: bold">Access</a>
                        </li>
                    </ul>
                    <!-- Tabs -->
                    <div class="tab-content" id="pills-tabContent">
                        <input type="hidden" name="userid" id="setid">
                        <input type="hidden" name="uprofile" value="profile">
                        <input type="hidden" name="upstatus" id="upstatus" value="Photo">
                        <div class="tab-pane fade show active" id="userPhoto" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span id="setphoto"></span><br><br>
                                        <input type="file" name="photo" onchange="readURL(this);" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;">
                                    </div><br>
                                    <div style="text-align: center;">
                                        <button type="button" class="btn btn-danger text-white font-weight-medium" data-bs-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                                        <button type="submit" class="btn btn-info" id="showPhotobtn" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;display: none"><i class="fa fa-check-circle"></i> Update</button>
                                    </div> 
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="userProfile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Full Name</label>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;text-transform: capitalize" id="setname" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Email Address</label>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" id="setemail" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Contact</label>
                                    <div class="form-group">
                                        <input type="number" name="contact" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" id="setcontact" required="">
                                    </div>
                                </div>
                            </div><br>
                            <div style="text-align: center">
                                <button type="button" class="btn btn-danger text-white font-weight-medium" data-bs-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                            </div>   
                        </div>
                        <div class="tab-pane fade" id="userAccess" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>User Role</label>
                                    <input type="hidden" name="role" id="setroleid">
                                    <input type="text" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" id="setrole" readonly="">
                                </div>
                                <div class="col-md-4">
                                    <label>Username</label>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" id="setusername" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                    <div class="form-group">
                                        <input type="text" name="password" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" id="setspassword" required="">
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
        $(document).on('click', '#manageuserAccess', function () {
            var id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to("geteuserinfo")}}',
                data: {id: id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    $('#setid').val(data.id);
                    $('#setname').val(data.name);
                    $('#setemail').val(data.email);
                    $('#setcontact').val(data.contact);
                    $('#setphoto').html("<img src={{ URL::to('/') }}/" + data.photo + " style='height:100px;border-radius:10px;border-radius: 15px;border:5px solid #00635a' id='blah'/>");
                    $('#setroleid').val(data.role);
                    $('#setrole').val(data.rolename);
                    $('#setusername').val(data.username);
                    $('#setspassword').val(data.dispassword);
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
@endsection