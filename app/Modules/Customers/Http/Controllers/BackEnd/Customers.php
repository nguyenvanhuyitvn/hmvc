<?php
    namespace Modules\Customers\Http\Controllers\BackEnd;
    use App\Http\Controllers\Controller;
    class Customers extends Controller{
        public function index(){
            return view('Customers::backend.index');
        }
    }
?>
