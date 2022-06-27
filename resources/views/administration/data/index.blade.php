@extends('mainpage')
@section('title','Preset Data')
@section('content')
<div class="container-fluid">
    <div class="row" style="display: none" id="showSupplierBox">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <center><h2> Add New Preset Data</h2></center>
                    <div id="hideFrombox">
                        <form method="post" action="{{route('savepresetdata')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Data Type</label>
                                    <div class="form-group">
                                        <select id="getDatatype" name="datatype" class="form-control" style="border: solid black 1px;height: 43px;" required="">
                                            <option value="">Select Type</option>
                                            <option value="product">Product</option>
                                            <option value="category">Category</option>
                                            <option value="brand">Brand</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-md-8">
                                    <label>Data Name</label>
                                    <div class="form-group">
                                        <select id="tags" multiple="multiple" name="dataname[]" class="form-control" style="width: 100%;border: solid black 1px;" required="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-wide btn-o btn-info" style="border-radius:10px" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                            </div>   
                        </form>
                    </div>
                    <div style="display: none" id="showFrombox">
                        <form method="post" action="{{route('saveprodata')}}">
                            @csrf
                            <div class="row">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">S/N</th>
                                            <th style="text-align: center;">Category</th>
                                            <th style="text-align: center;">Brand</th>
                                            <th style="text-align: center;">Product</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody style="text-align: center;" id="moreItems">
                                        <tr>
                                            <td class="serial_no">1</td>
                                            <td style="width:30%;">
                                                <select name="category[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" required="">
                                                    <option value="">Select Type</option>
                                                    <?php foreach ($getcategorys as $value) { ?>
                                                        <option value="<?= $value->singledata ?>"><?= $value->singledata ?></option>
                                                    <?php } ?>                                                    
                                                </select>
                                            </td>                                      
                                            <td style="width:30%;">
                                                <select name="brand[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" required="">
                                                    <option value="">Select Type</option>
                                                    <?php foreach ($getbrands as $value) { ?>
                                                        <option value="<?= $value->singledata ?>"><?= $value->singledata ?></option>
                                                    <?php } ?>     
                                                    <option value="Null">Null</option>
                                                </select>
                                            </td>                                      
                                            <td style="width:30%;"><input type="text" name="product[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required=""></td>                                      
                                            <td><button  class="btn btn-info" type="button" id="addMore" style="border-radius:10px;"><i class="fa fa-plus"></i></button></td>                                       
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div style="text-align: center;">
                                <button type="button" class="btn btn-wide btn-o btn-primary" style="border-radius:10px;margin-right:10px;" onclick="relodePage()"><i class="fa fa-reply"></i> Reload</button>
                                <button type="submit" class="btn btn-wide btn-o btn-info" style="border-radius:10px" onclick="return confirm('Are you sure ?')"><i class="fa fa-save"></i> Save</button>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-cubes"></i> Manage Single Preset data</h3><br>
                    <button type="button" style="float: right;position: relative;bottom: 30px;" class="btn btn-info btn-rounded" id="addNewSuppliers"><i class="fa fa-plus"></i> Add New Data</button>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Data Name</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center">1</td>
                                    <td style="text-align: center;color:#000">Product</td>
                                    <td style="text-align: center">      
                                        <button class="btn waves-effect waves-light btn-info" onclick="window.location.href ='{{URL::to('viewpresetdata/product')}}'" style="border-radius: 10px;text-align: center"><i class="fa fa-eye"></i> View</button>
                                    </td>
                                </tr>
                                <?php
                                $i = 2;
                                foreach ($singledatas as $value) {
                                    if($value->status!="size"){
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center;color:#000"><?= ucwords($value->status) ?></td>
                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-info" onclick="window.location.href ='{{URL::to('viewpresetdata/'.$value->status)}}'" style="border-radius: 10px;text-align: center"><i class="fa fa-eye"></i> View</button>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    } 
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
<script>
    $(document).ready(function () {
        $(document).on('change', '#getDatatype', function () {
            var value = $(this).val();
            if (value === "product") {
                $("#hideFrombox").hide();
                $("#showFrombox").show();
            } else {
                $("#hideFrombox").show();
                $("#showFrombox").hide();
            }
        });
    });
    function relodePage() {
        location.reload();
    }
</script>
<script src="{{asset('/')}}public/js/select2.min.js"></script>
<script>
    $('#tags').select2({
        tags: true,
        data: [],
        tokenSeparators: [','],
        placeholder: " Add your tags here",
        selectOnClose: true,
        closeOnSelect: false
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
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addMore").click(function () {
            var n = ($('#moreItems tr').length - 0) + 1;
            var tr = '<tr>' +
                    '<td class="serial_no">' + n + '</td>' +
                    '<td style="width:30%;">' +
                    '<select name="category[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" required="">' +
                    '<option value="">Select Type</option>' +
<?php foreach ($getcategorys as $value) { ?>
                '<option value="<?= $value->singledata ?>"><?= $value->singledata ?></option>' +
<?php } ?>
            '</select>' +
                    '</td>' +
                    '<td style="width:30%;">' +
                    '<select name="brand[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" required=""' +
                    '<option value="">Select Type</option>' +
<?php foreach ($getbrands as $value) { ?>
                '<option value="<?= $value->singledata ?>"><?= $value->singledata ?></option>' +
<?php } ?>
            '</select>' +
                    '</td>' +
                    '<td style="width:30%;"><input type="text" name="product[]" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" required=""></td>' +
                    '<td><button  class="btn btn-danger remCF" type="button" style="border-radius:10px;"><i class="fa fa-trash"></i></button></td>' +
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
    });
</script>
<script>
    $(document).ready(function () {
        $('#administration').addClass('active');
        $('.presetdata').addClass('active');
    });
</script>
@endsection