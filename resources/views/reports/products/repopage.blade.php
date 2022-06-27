@extends('mainpage')
@section('title','Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h4><i class="fa fa-chart-bar"></i> Search <b><?= $values ?></b> Report</h4></center><br>
                    <form action="{{route('supplierrepo')}}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Supplier Name <span style="color: red">*</span></b></label>
                                <div class="form-group">
                                    <select name="supplier" class="form-control multipleselect" style="width:100%;border-radius:10px;border:1px solid #1e88e5;" required="">
                                        <option value="">Select Supplier</option>
                                        <option value="all">All</option>
                                        @foreach($getsuppliers as $value)
                                        <option value="{{$value->supplier}}">{{$value->suppname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>From Date</b></label>
                                <div class="form-group">
                                    <input type="text" name="fdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>To Date</b></label>
                                <div class="form-group">
                                    <input type="text" name="tdate" class="form-control allDate" style="border-radius:10px;border:1px solid #1e88e5;">
                                </div>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Month</b></label>
                                <div class="form-group">
                                    <select name="month" class="form-control"  style="border-radius:10px;border:1px solid #1e88e5;">
                                        <option value="">Select Month</option>
                                        @foreach($getmonths as $value)
                                        <option value="{{$value->month}}">{{$value->month}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label><b>Year</b></label>
                                <div class="form-group">
                                    <select name="year" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;">
                                        <option value="">Select Year</option>
                                        <?php for ($i = date('Y'); $i >= 2021; $i--) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info" style="border-radius: 10px;margin-top: 20px"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#allreports').addClass('active');
        $('.supplierrepo').addClass('active');
    });
</script>
@endsection