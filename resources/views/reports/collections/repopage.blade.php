@extends('mainpage')
@section('title','Collections')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h4><i class="fa fa-chart-bar"></i> Search <b><?= $values ?></b> Report</h4></center><br>
                    <form action="{{route('collectionrepo')}}" method="get">
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
                                <label><b>From Date <span style="color: red">*</span></b></label>
                                <div class="form-group">
                                    <input type="text" name="fdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>To Date <span style="color: red">*</span></b></label>
                                <div class="form-group">
                                    <input type="text" name="tdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;" required="">
                                </div>
                            </div>
                        </div><br><br>
                        <center>
                            <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top: 20px"><i class="fa fa-search"></i> Search</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#allreports').addClass('active');
        $('.collectionrepo').addClass('active');
    });
</script>
@endsection