<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\ProductStock;
use App\MedicalBill;
use App\Supplies;
use DB;
use Auth;

   
class ProductAddMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMore()
    {
        return view("addMore");
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function addMore1()
    {
        return view("addMore1");
    }
    public function addMorePost1(Request $request, $accession_number)
    {
        $user = DB::table('users')->where('id','=',Auth::id())->first();
        $ket_luan             = $request->input('ket_luan');
        $dieu_tri             = $request->input('dieu_tri');
        $de_nghi             = $request->input('de_nghi');   
        $data = array(
            'ket_luan'            => $ket_luan,
            'de_nghi'            => $de_nghi,
            'dieu_tri' => $dieu_tri,
            'study_status' => '3',
            'is_edited' => '1', 
            'schedule_time' => date('Y-m-d H:i:s'), 
            'radiologist_bacsidoc' => $user->hoten, 
            'radiologist_id' => $user->chung_thu_so
        );
        DB::table("medical_bills")->where('accession_number', $accession_number)->update($data);
    
        return back();
    }
    public function destroy($id)
    {       
        $product_stocks = ProductStock::findOrfail($id);
        $posts_id = $product_stocks->posts_id;
        $ma_thuoc = $product_stocks->supplies_id;         
        $so_lo = $product_stocks->so_lo;       
        $medical_bill_id = $product_stocks->medical_bill_id;        
        $lo_max = DB::table('supplies')->where('ma_thuoc', $ma_thuoc)->max('so_lo');      
        for ($i=$so_lo; $i <= $lo_max ; $i++) {
            $so_luong_chi_tiet = DB::table('posts')->where('ProductStocks_id',$posts_id)->where('so_lo',$i)->sum('so_luong_chi_tiet');
            $so_luong_old = DB::table('supplies')->where('ma_thuoc',$ma_thuoc)->where('so_lo',$i)->sum('con_lai');
            DB::table('supplies')->where('ma_thuoc',$ma_thuoc)->where('so_lo',$i )->update(['con_lai' => $so_luong_old+$so_luong_chi_tiet]);
        }
        DB::table('posts')->where('ProductStocks_id',$posts_id)->delete();
        DB::table('supplies')->where('con_lai', '0')->update(['trang_thai' => '0']);
        $product_stocks->delete();    
        return back();
    }

    public function addMorePost(Request $request, $accession_number)
    {   
        $name  = $request->input('name');
        $supplies_id  = $request->input('supplies_id');
        $so_lo  = $request->input('so_lo');
        $qty  = $request->input('qty');
        $don_vi  = $request->input('don_vi'); 
        $lieu_dung  = $request->input('lieu_dung');
        DB::table("product_stocks")->insert([
            'name'            => $name,
            'qty'             => $qty,
            'don_vi'          => $don_vi,
            'lieu_dung'       => $lieu_dung,
            'supplies_id'     => $supplies_id,
            'medical_bill_id' => $accession_number,
            'posts_id' => $accession_number.$supplies_id,
        ]);
        $lo_max = DB::table('supplies')->where('ma_thuoc', $supplies_id)->max('so_lo');
        $lo_min = DB::table('supplies')->where('ma_thuoc', $supplies_id)->min('so_lo');
        for ($i = $lo_min; $i <= $lo_max ; $i++) {
            $con_lai = DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', $i)->sum('con_lai');
            $a = DB::table('supplies')->where('so_lo','<=', $i)->where('ma_thuoc',$supplies_id)->sum('con_lai');
            if ($qty > $a) {
                $gb_i_1 = DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', $i)->sum('gia_ban');
                $gn_i_1 = DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', $i)->sum('gia_nhap');
                $he_so = $gb_i_1 -$gn_i_1;
                if ($con_lai != 0) {
                    DB::table("posts")->insert([
                        'so_lo'           => $i,
                        'so_luong_chi_tiet'        => $con_lai,
                        'gia_thanh'       => $gb_i_1,
                        'tien_lai'       => $he_so*$con_lai,
                        'thanh_toan'       => $gb_i_1*$con_lai,
                        'ProductStocks_id'=> $accession_number.$supplies_id,  
                        'created_at' => date('Y-m-d H:i:s'),  
                    ]);      
                }
                  
            }else{
                $con_lai_first = DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', $i)->sum('con_lai');
                $gb_i = DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', $i)->sum('gia_ban');
                $gn_i = DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', $i)->sum('gia_nhap');
                $he_so2 = $gb_i - $gn_i;
                $con_lai1 = $a - $qty;
                $con_lai2 = $con_lai_first - $con_lai1;
                DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', $i)->update(['con_lai' => $con_lai1]);
                DB::table('supplies')->where('ma_thuoc', $supplies_id)->where('so_lo', '<', $i)->update(['con_lai' => '0','trang_thai' => '0']);
                if ($con_lai_first != 0) {
                    DB::table("posts")->insert([                    
                        'so_lo'           => $i,
                        'so_luong_chi_tiet'        => $con_lai2,
                        'gia_thanh'       => $gb_i,
                        'tien_lai'       => $he_so2*$con_lai2,
                        'thanh_toan'       => $gb_i*$con_lai2,
                        'ProductStocks_id'=> $accession_number.$supplies_id,
                        'created_at' => date('Y-m-d H:i:s'), 
                    ]);   
                }      
               
                break;
            }            
        }
        
        
        DB::table('supplies')->where('con_lai', '0')->update(['trang_thai' => '0']);
        return back()->with('success', 'Thêm đơn thuốc thành công.');
    }

}