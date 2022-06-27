@extends('mainpage')
@section('title','Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-gift"></i> Manage Products</h3><br>
                    <center><h2><b>Total Products: {{$olprodqty}}</b>,&nbsp;<b>Total Sales: {{$saleproqty}}, </b>&nbsp;<b>Rest Products: {{$stock}}</b></h2></center>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered setdatatable">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Supplier</th>
                                    <th style="text-align: center">Barcode</th>
                                    <th style="text-align: center">Product</th>
                                    <th style="text-align: center">Size</th>
                                    <th style="text-align: center">Category</th>
                                    <th style="text-align: center">Old</th>
                                    <th style="text-align: center">Sale</th>
                                    <th style="text-align: center">Stock</th>
                                    <th style="text-align: center">Price</th>
                                    <th style="text-align: center">Sale</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getproductstore as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= $value->suppname ?></td>
                                        <td style="text-align: center"><?= $value->barcode ?></td>
                                        <td style="text-align: center"><?= $value->product ?></td>
                                        <td style="text-align: center"><?= $value->prosize ?></td>
                                        <td style="text-align: center"><?= $value->catname ?></td>
                                        <td style="text-align: center"><?= $value->olprodqty ?></td>
                                        <td style="text-align: center"><?= $value->saleproqty ?></td>
                                        <td style="text-align: center"><?= $value->qunatity ?></td>
                                        <td style="text-align: center"><?= $value->price ?></td>
                                        <td style="text-align: center"><?= $value->sale ?></td>
                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-info" onclick="window.location.href ='{{URL::to('editproduct/'.$value->id.'/'.$value->prostoreid)}}'" style="border-radius: 10px;text-align: center" title="Update"><i class="fa fa-edit"></i></button>
                                            <!--<button class="btn waves-effect waves-light btn-danger deleteProduct" id="<?= $value->id ?>" value="<?= $value->prostoreid ?>" style="border-radius: 10px;text-align: center" title="Delete"><i class="fa fa-trash"></i></button>-->
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
<script>
    $(document).ready(function () {
        $(document).on('click', '.deleteProduct', function () {
            var id = $(this).attr('id');
            var prostoreid = $(this).val();
            Swal.fire({
                title: 'Are you sure ?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: "No"
            }).then((result) => {
                if (result.value) {
                    Swal(window.location.href = '{{URL::to("deleteproduct")}}' + '/' + id + '/' + prostoreid);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#storeproduct').addClass('active');
        $('.managepro').addClass('active');
    });
</script>
@endsection