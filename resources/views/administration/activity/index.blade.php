@extends('mainpage')
@section('title','Activities')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h2> Excel File Upload</h2></center>
                    <div id="hideFrombox">
                        <form action="{{route('uploadexcelfile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label>Excel File <span style="color: red">*</span></label>
                                    <div class="form-group">
                                        <input type="file" name="excelfile" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div><br>
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-wide btn-o btn-info" style="border-radius:10px" onclick="return confirm('Are you sure ?')"><i class="fa fa-upload"></i> Upload</button>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#administration').addClass('active');
        $('.exceldata').addClass('active');
    });
</script>
@endsection