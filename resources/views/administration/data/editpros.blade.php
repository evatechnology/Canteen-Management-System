@extends('mainpage')
@section('title','Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-cubes"></i> Manage Products</h3><br>
                    <button type="button" style="float: right;position: relative;bottom: 30px;" class="btn btn-dark btn-rounded" onclick="window.location.href ='{{URL::to('administration/presetdata')}}'" ><i class="fa fa-arrow-left"></i> Back</button>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Product</th>
                                    <th style="text-align: center">Category</th>
                                    <th style="text-align: center">Brand</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getcatproducts as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center;color:#000""><?= $value->product ?></td>
                                        <td style="text-align: center;color:#000""><?= $value->category ?></td>
                                        <td style="text-align: center;color:#000""><?= $value->brand ?></td>
                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-info manageData" id="<?= $value->catproid ?>" value="edit" style="border-radius: 10px;text-align: center"><i class="fa fa-edit"></i></button>
                                            <button class="btn waves-effect waves-light btn-danger manageData" id="<?= $value->catproid ?>" value="delete" style="border-radius: 10px;text-align: center"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title" id="exampleModalLabel1">Update Product Data</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('updatepresetdata')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Product</label><br>
                            <div class="form-group">
                                <input type="hidden" name="singledata_id" id="setproid">
                                <input type="hidden" name="status" value="product">
                                <input type="text" name="product" class="form-control" style="border-radius:10px;border:1px solid #1e88e5;" id="setproduct" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Category</label><br>
                            <div class="form-group">
                                <select name="category" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" id="setcategory" required="">
                                    <?php foreach ($getcategorys as $value) { ?>
                                        <option value="<?= $value->singledata ?>"><?= $value->singledata ?></option>
                                    <?php } ?>                                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Brand</label><br>
                            <div class="form-group">
                                <select name="brand" class="form-control" style="border-radius:10px;border:1px solid #1e88e5" id="setbrand" required="">
                                    <?php foreach ($getbrands as $value) { ?>
                                        <option value="<?= $value->singledata ?>"><?= $value->singledata ?></option>
                                    <?php } ?>     
                                    <option value="Null">Null</option>
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white font-weight-medium" data-bs-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn" style="background: #1e88e5;color: #fff"  onclick="return confirm('Are you sure ?')"><i class="fa fa-check-circle"></i> Update</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '.manageData', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            var status = '{{$datatype}}';
            if (value === "edit") {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("gete_presetdata_info")}}',
                    data: {id: id, value: status},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#setproid').val(data.catproid);
                        $('#setproduct').val(data.product);
                        $('#setcategory').val(data.category);
                        $('#setbrand').val(data.brand);
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
                        Swal(window.location.href = '{{URL::to("delete_presetdatas")}}' + '/' + id + '/' + status);
                    }
                });
            }
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