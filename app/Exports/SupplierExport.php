<?php

namespace App\Exports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

//class SupplierExport implements FromCollection {
//
//    /**
//     * @return \Illuminate\Support\Collection
//     */
//    public function collection() {
//        return Supplier::all();
//    }
//
//}
class SupplierExport implements FromView {

    public function __construct() {
        
    }

    public function view(): View {
        $result = Supplier::all();
        $data = [
            'suppliers' => $result
        ];
        return view('suppliers.report', $data);
    }

}
