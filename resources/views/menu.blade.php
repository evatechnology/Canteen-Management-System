<ul id="sidebarnav">
    @if(Session::get('role')!=6)
    <li class="sidebar-item"> 
        <a class="sidebar-link waves-effect waves-dark" id="dashboard" href="{{URL::to('/')}}" aria-expanded="false">
            <i class="mdi mdi-gauge"></i>
            <span class="hide-menu"> Dashboard</span>
        </a>
    </li>
    @endif
    @if(Session::get('role')==1)
    <li class="sidebar-item"> 
        <a class="sidebar-link waves-effect waves-dark" id="Suppliers" href="{{URL::to('/suppliers')}}" aria-expanded="false">
            <i class="fa fa-users"></i>
            <span class="hide-menu"> Suppliers</span>
        </a>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="storeproduct" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-boxes"></i> <span class="hide-menu"> Stores</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/add')}}" class="sidebar-link addpro">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Add Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/manage')}}" class="sidebar-link managepro">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Manage Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/supplier')}}" class="sidebar-link getsupplier">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Product Suppliers</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/print')}}" class="sidebar-link barcodeprint">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Barcodes Print</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="managesalepro" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-shopping-cart"></i> <span class="hide-menu"> Sales</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
                <a href="{{URL::to('/saleproducts/sale')}}" class="sidebar-link viewsales">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Sale Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/saleproducts/manage')}}" class="sidebar-link managesales">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Manage Sales</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/saleproducts/return')}}" class="sidebar-link salereturn">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Sales Return</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="posaccounts" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-money-bill-alt"></i> <span class="hide-menu"> Accounts</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
                <a href="{{URL::to('/accounts/sale')}}" class="sidebar-link possale">
                    <i class="fa fa-money-bill-alt"></i> <span class="hide-menu"> Collections</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/accounts/due')}}" class="sidebar-link ducollection">
                    <i class="fa fa-money-bill-alt"></i> <span class="hide-menu"> Due Collections</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/accounts/expense')}}" class="sidebar-link posexpense">
                    <i class="fa fa-gg"></i> <span class="hide-menu"> Expenditures</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link waves-effect waves-dark" id="members" href="{{URL::to('/members')}}" aria-expanded="false">
            <i class="fa fa-users"></i>
            <span class="hide-menu"> Members</span>
        </a>
    </li>
    @endif
    @if(Session::get('role')==5)
    <li class="sidebar-item"> 
        <a class="sidebar-link waves-effect waves-dark" id="Suppliers" href="{{URL::to('/suppliers')}}" aria-expanded="false">
            <i class="fa fa-users"></i>
            <span class="hide-menu"> Suppliers</span>
        </a>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="storeproduct" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-boxes"></i> <span class="hide-menu"> Stores</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/add')}}" class="sidebar-link addpro">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Add Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/manage')}}" class="sidebar-link managepro">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Manage Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/supplier')}}" class="sidebar-link getsupplier">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Product Suppliers</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('storeproducts/print')}}" class="sidebar-link barcodeprint">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Barcode Print</span>
                </a>
            </li>
        </ul>
    </li>
    @endif
    @if(Session::get('role')==2)
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="managesalepro" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-shopping-cart"></i> <span class="hide-menu"> Sales</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
                <a href="{{URL::to('/saleproducts/sale')}}" class="sidebar-link viewsales">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Sale Products</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/saleproducts/manage')}}" class="sidebar-link managesales">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Manage Sales</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/saleproducts/return')}}" class="sidebar-link salereturn">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Sales Return</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="posaccounts" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-money-bill-alt"></i> <span class="hide-menu"> Accounts</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
                <a href="{{URL::to('/accounts/sale')}}" class="sidebar-link possale">
                    <i class="fa fa-money-bill-alt"></i> <span class="hide-menu"> Collections</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/accounts/due')}}" class="sidebar-link ducollection">
                    <i class="fa fa-money-bill-alt"></i> <span class="hide-menu"> Due Collections</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/accounts/expense')}}" class="sidebar-link posexpense">
                    <i class="fa fa-gg"></i> <span class="hide-menu"> Expenditures</span>
                </a>
            </li>
        </ul>
    </li>
    @endif
    @if(Session::get('role')!=6 or Session::get('role')==1)
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="allreports" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-chart-line"></i> <span class="hide-menu"> Reports</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(Session::get('role')!=2)
            <li class="sidebar-item">
                <a href="{{URL::to('/reports/products')}}" class="sidebar-link productsrepo">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Products</span>
                </a>
            </li>
            @endif
            @if(Session::get('role')==1 or Session::get('role')==2)
            <li class="sidebar-item">
                <a href="{{URL::to('/reports/sales')}}" class="sidebar-link salesrepo">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Sales</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/reports/collections')}}" class="sidebar-link collectionrepo">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Collections</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{URL::to('/reports/expenses')}}" class="sidebar-link expensesrepo">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Expenses</span>
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if(Session::get('role')==1 or Session::get('role')==5)
    <li class="sidebar-item"> 
        <a class="sidebar-link has-arrow waves-effect waves-dark" id="administration" href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-user-secret"></i> <span class="hide-menu">Settings</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
                <a href="{{URL::to('/administration/presetdata')}}" class="sidebar-link presetdata">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Preset Data</span>
                </a>
            </li>
            @if(Session::get('role')==1)
            <li class="sidebar-item">
                <a href="{{URL::to('/administration/users')}}" class="sidebar-link users">
                    <i class="mdi mdi-vector-triangle"></i> <span class="hide-menu"> Manage Users</span>
                </a>
            </li>
            @endif
        </ul>
    </li>
    @endif
    @if(Session::get('role')==6)
    <li class="sidebar-item"> 
        <a class="sidebar-link waves-effect waves-dark" id="productsales" href="{{URL::to('/salespanel/sale')}}" aria-expanded="false">
            <i class="mdi mdi-shopping"></i>
            <span class="hide-menu"> Sales</span>
        </a>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link waves-effect waves-dark" id="altersales" href="{{URL::to('/salespanel/alter')}}" aria-expanded="false">
            <i class="fa fa-shopping-cart"></i>
            <span class="hide-menu"> Alternative Sales</span>
        </a>
    </li>
    <li class="sidebar-item"> 
        <a class="sidebar-link waves-effect waves-dark" id="todaysales" href="{{URL::to('/salespanel/today')}}" aria-expanded="false">
            <i class="fa fa-shopping-basket"></i>
            <span class="hide-menu"> Today's Sales</span>
        </a>
    </li>
    @endif
</ul>