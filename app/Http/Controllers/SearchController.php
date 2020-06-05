<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
   	public function getSearch(Request $request)
    {
        return view('get.description.view');
    }   

    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
          $query = $request->get('query');
          $data = DB::table('supplies')->where('ten_thuoc', 'LIKE', "%{$query}%")->get();         
          $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
          foreach($data as $row){
            $output .= '<li><a>'.$row->ten_thuoc.'</a></li>';
          }
          $output .= '</ul>';
          echo $output;
       }
    }
}
 