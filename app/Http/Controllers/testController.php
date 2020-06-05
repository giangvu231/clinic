<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Template;
use App\History;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;
use Storage;
use File;
use App\MedicalBill;
use App\ProductStock;


class testController extends Controller
{
      public function test()
    {	
		$order = ProductStock::find(\DB::table('product_stocks')->max('id'));
		$order = $order->id;
		dd($order);
    }
}
