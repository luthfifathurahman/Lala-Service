<?php


namespace App\Http\Controllers\Backend;

use Session;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
 
class DashboardController extends Controller {
	public function dashboard(Request $request) {
		$segment = \Request::segment(2);
        $userinfo = Session::get('userinfo');
        $access_control = Session::get('access_control');

		$total_barang = DB::table('barang')->where('active', 1)->selectRaw('count(*) as total_barang')->first();
		$total_supplier = DB::table('supplier')->where('active', 1)->selectRaw("count(*) as total_supplier")->first();
		$total_user = DB::table('users')->where('active', 1)->selectRaw("count(*) as total_user")->first();

		return view ('backend.dashboard', [
			'total_barang' => $total_barang,
			'total_supplier' => $total_supplier,			
			'total_user' => $total_user,
			'userinfo' => $userinfo]);
	}
}