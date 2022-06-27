@extends('mainpage')
@section('title','Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body card_body">
                    <h3 class="text-themecolor mb-0"><i class="fa fa-gift"></i> Supplier Products List</h3><br>
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-striped table-bordered">
                            <thead>
                                <tr class="table_header">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Barcode</th>
                                    <th style="text-align: center">Product</th>
                                    <th style="text-align: center">Size</th>
                                    <th style="text-align: center">Quantity</th>
                                    <th style="text-align: center">Stock Price</th>
                                    <th style="text-align: center">Sale Price</th>
                                    <!--<th style="text-align: center">Action</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($storeproducts as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= $value->barcode ?></td>
                                        <td style="text-align: center"><?= $value->product ?></td>
                                        <td style="text-align: center"><?= $value->prosize ?></td>
                                        <td style="text-align: center"><?= $value->qunatity ?></td>
                                        <td style="text-align: center"><?= $value->price ?></td>
                                        <td style="text-align: center"><?= $value->sale ?></td>
<!--                                        <td style="text-align: center">      
                                            <button class="btn waves-effect waves-light btn-info" onclick="window.location.href ='{{URL::to('editproduct/'.$value->id)}}'" style="border-radius: 10px;text-align: center" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button class="btn waves-effect waves-light btn-danger deleteProduct" id="<?= $value->id ?>" value="<?= $value->proinfoid ?>" style="border-radius: 10px;text-align: center" title="Delete"><i class="fa fa-trash"></i></button>
                                        </td>-->
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
            var value = $(this).val();
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
                    Swal(window.location.href = '{{URL::to("deleteproduct")}}' + '/' + id + '/' + value);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#storeproduct').addClass('active');
        $('.getsupplier').addClass('active');
    });
</script>
@endsection