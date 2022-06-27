@extends('mainpage')
@section('title','Dashboard')
@section('content')
<div class="row page-titles header_bootom">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Working Remarks of this POS system</h3>
    </div>
</div>
<div class="container-fluid" style="font-family: Montserrat">
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body card_body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="table_header">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Module</th>
                                                <th style="text-align: center">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center">1</td>
                                                <td style="text-align: center;width: 20%">Dashboard</td>
                                                <td style="text-align: justify">
                                                    <b>
                                                        This part will be done when we have all the data summary.
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">2</td>
                                                <td style="text-align: center;width: 20%">Suppliers</td>
                                                <td style="text-align:justify">
                                                    <b>
                                                        This part is starting of this system where we have to keep(like add,edit,delete) all the supplier list to entry products.
                                                        This module has only one sub module (Manage Supplier). In future, if client demands more, then will be included.. 
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">3</td>
                                                <td style="text-align: center;width: 20%">Store Products</td>
                                                <td style="text-align:justify">
                                                    <b>
                                                        This module for storing all the products from suppliers then will sale from this table data.
                                                        This module has only 3 sub modules like Add Products, Manage Product as well as supplier products
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">4</td>
                                                <td style="text-align: center;width: 20%">Sale Products</td>
                                                <td style="text-align:justify">
                                                    <b>
                                                        This module has 2 sub modules like "Sale & Manage". The Sale sub module will be included <span>"Barcode Scanner Device"</span> and fetch data from databse
                                                        to sale. But now it has only manually works by input product code. While putting the single product code then will click
                                                        out of the box for showing product. "Mange" module will work on view invoice, edit sale and delete sales information.
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">5</td>
                                                <td style="text-align: center;width: 20%">Accounts</td>
                                                <td style="text-align:justify">
                                                    <b>
                                                        This module works are pending and it will have so many sub modules like Supplier Money, Product Sales, daily Expenditures...etc
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">6</td>
                                                <td style="text-align: center;width: 20%">Members</td>
                                                <td style="text-align:justify">
                                                    <b>
                                                        This module has only 1 sub module where members will be created, edited as well as deleted...
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">7</td>
                                                <td style="text-align: center;width: 20%">Reports</td>
                                                <td style="text-align:justify">
                                                    <b>
                                                       This module works are pending and will be date wise, month wise, customer wise reports will be exported Excel or PDF......
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center">8</td>
                                                <td style="text-align: center;width: 20%">Administration</td>
                                                <td style="text-align:justify">
                                                    <b>
                                                       This module will be played the key role of user access and preset data of the system. Here has 2 sub modules like "Preset Data" & "Manage User Access".
                                                    </b>
                                                </td>
                                            </tr>
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
</div>
<script>
    $(document).ready(function () {
        $('#dashboard').addClass('active');
    });
</script>
@endsection