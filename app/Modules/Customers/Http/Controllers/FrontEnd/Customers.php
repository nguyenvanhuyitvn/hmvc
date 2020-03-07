<?php
    namespace Modules\Customers\Http\Controllers\FrontEnd;
    use App\Http\Controllers\Controller;
    class Customers extends Controller{
        public function index(){
            return view('Customers::frontend.index');
        }
    }
?>
