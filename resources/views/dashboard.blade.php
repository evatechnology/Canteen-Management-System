@extends('mainpage')
@section('title','Dashboard')
@section('content')
<div class="container-fluid" style="font-family: Montserrat">
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body card_body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:#1E90FF;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="ti-gift"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $olprodqty ?></h3>
                                            <a href="{{URL::to('storeproducts/manage')}}" class="text-muted mb-0" style="color: #fff !important;">Total Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:#50af00;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="ti-shopping-cart-full"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $salequantity ?></h3>
                                            <a href="{{URL::to('saleproducts/sale')}}" class="text-muted mb-0" style="color: #fff !important;">Total Sales</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:royalblue;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="ti-gift"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $olprodqty - $salequantity ?></h3>
                                            <a href="{{URL::to('storeproducts/manage')}}" class="text-muted mb-0" style="color: #fff !important;">Rest Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Session::get('role')==1 or Session::get('role')==2)
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:#1E90FF;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="fa fa-money-bill-alt"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $stockamount ?></h3>
                                            <a href="{{URL::to('storeproducts/supplier')}}" class="text-muted mb-0" style="color: #fff !important;">Total Amount</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:#50af00;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="fa fa-money-bill-alt"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $saleamount ?></h3>
                                            <a href="{{URL::to('saleproducts/manage')}}" class="text-muted mb-0" style="color: #fff !important;">Sales Amount</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:orange;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="fa fa-money-bill-alt"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $saledueamount ?></h3>
                                            <a href="{{URL::to('saleproducts/manage')}}" class="text-muted mb-0" style="color: #fff !important;">Sale Dues</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:red;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="fa fa-money-bill-alt"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $expenses ?></h3>
                                            <a href="{{URL::to('accounts/expense')}}" class="text-muted mb-0" style="color: #fff !important;">Total Expenses</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:#50af00;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="fa fa-money-bill-alt"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $collections ?></h3>
                                            <a href="{{URL::to('accounts/sale')}}" class="text-muted mb-0" style="color: #fff !important;">Total Collection</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body" style="background:orange;border-radius: 50px">
                                    <div class="d-flex flex-row">
                                        <div
                                            class="round round-lg text-white d-inline-block text-center rounded-circle">
                                            <i class="fa fa-money-bill-alt"></i>
                                        </div>
                                        <div class="ml-2 align-self-center">
                                            <h3 class="mb-0 font-weight-light" style="color: #fff !important;"><?= $saledueamount ?></h3>
                                            <a href="{{URL::to('accounts/sale')}}" class="text-muted mb-0" style="color: #fff !important;">Due Collection</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#dashboard').addClass('active');
    });
</script>
@endsection