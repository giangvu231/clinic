<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplies;
use Validator; 
use Response;
use Carbon\Carbon;
use DB;
use Excel;
use App\Exports\SupExport;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $limit = $request->limit ? $request->limit : 100;
        $supplies = Supplies::latest();
        $nhom_thuoc = DB::table('supplies')->select('nhom_thuoc')->groupBy('nhom_thuoc')->get();

        //Nếu hạn sử dụng thuốc gần hết hạn trước 7 ngày
        if(isset($_GET["canh_bao"])){
            $dt = Carbon::now();
            $dt7 = $dt->addDays(7);
            $supplies = $supplies->whereDate('han_su_dung','<=', $dt7);
        }else if($request->nhom_thuoc) {
            $supplies = $supplies->where('nhom_thuoc','like','%'.$request->nhom_thuoc.'%');
        }

         //hiển thị tất cả
        if(isset($_GET["tat_ca"])){
            $supplies = Supplies::latest();
        }

        // $supplies = Supplies::get();
        if($request->id) {
            $supplies = $supplies->where('id','like','%'.$request->id.'%');
        }
        //tìm kiếm theo tên thuốc 
        if($request->ten_thuoc) {
            $supplies = $supplies->where('ten_thuoc','like','%'.$request->ten_thuoc.'%');
        }
        //sử lý tìm ra nhóm thuốc 
        $supplies = $supplies->paginate($limit); 
                 
        $supplies->map(function($supplies){
            // $supplies = $supplies->ma_thuoc;
            // dd($supplies); 
            $dadung = DB::table('product_stocks')->where('supplies_id', $supplies->ma_thuoc)->where('so_lo', $supplies->so_lo)->sum('qty');
            $tong_so = DB::table('supplies')->where('ma_thuoc', $supplies->ma_thuoc)->sum('so_luong');      

            $conlai = $tong_so - $dadung;     
            $supplies['conlai'] = $conlai;
            $supplies['dadung'] = $dadung;
            $supplies['tong_so'] = $tong_so; 
            //$max = $supplies->max('so_lo');
           // DB::table('supplies')->where('ma_thuoc','like','%'.$supplies->ma_thuoc.'%')->where('so_lo', $supplies->so_lo)->update(['trang_thai' => '0']);
            //DB::table('supplies')->where('ma_thuoc','like','%'.$supplies->ma_thuoc.'%')->where('so_lo', $max)->update(['trang_thai' => '1']);
            //update trạng thái cho những mã thuốc có số lượng nhỏ hơn hoặc bằng 0
            DB::table("supplies")->where('so_luong','<=',0)->update(['trang_thai' => '0']);

        });
        return view('admin.supplies.index', compact('supplies','nhom_thuoc'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplies.store');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $a = DB::table('supplies')->get();
        // $supID = count($a);
        // $supID += 1;
        // if(!empty($supID)) //nếu chưa có thì 
        // {
            $a = DB::table('supplies')->get();
            $supID = count($a);
            $supID += 1;
        // }else{            
        //  //tìm theo max id
        //     $supID = Supplies::find(\DB::table('supplies')->max('id'));
        //     $supID = $supID->id;
        //     $supID += 1;
        // }
        
        if($supID > 0 && $supID < 10)
        {
            $MeID = 'Me'.'0000000'.$supID;
        }
        else if($supID > 10 && $supID < 100)
        {
            $MeID = 'Me'.'000000'.$supID;
        }
        else if($supID > 100 && $supID < 1000)
        {
            $MeID = 'Me'.'00000'.$supID;
        } 
        else if($supID > 1000 && $supID < 10000)
        {
            $MeID = 'Me'.'0000'.$supID;
        }
        else if($supID > 10000 && $supID < 100000)
        {
            $MeID = 'Me'.'000'.$supID;
        }
        else if($supID > 100000 && $supID < 1000000)
        {
            $MeID = 'Me'.'00'.$supID;
        }
        else if($supID > 1000000 && $supID < 10000000)
        {
            $MeID = 'Me'.'0'.$supID;
        }
        else if($supID > 10000000 && $supID < 100000000)
        {
            $MeID = 'Me'.$supID;
        }
        



        $ten_thuoc           = $request->input('ten_thuoc');
        $lo_thuoc           = $request->input('lo_thuoc');
        $so_luong           = $request->input('so_luong');
        $SL_goi_y           = $request->input('SL_goi_y');
        $nha_cung_cap       =  $request->input('nha_cung_cap');
        $SL_goi_y           = $request->input('SL_goi_y');
        $lieu_dung           = $request->input('lieu_dung');
        $gia_ban           = $request->input('gia_ban');
        $gia_nhap           = $request->input('gia_nhap');
        $ngay_nhap           = $request->input('ngay_nhap');
        $han_su_dung           = $request->input('han_su_dung');
        $don_vi           = $request->input('don_vi');
        $nhom_thuoc           = $request->input('nhom_thuoc');
        
          $data = array(
            'ma_thuoc'           => $MeID,
            'ten_thuoc'          => $ten_thuoc,
            'nha_cung_cap'         => $nha_cung_cap,
            'so_lo'          => '1',
            'lo_thuoc'          => $lo_thuoc,
            'so_luong'          => $so_luong,
            'con_lai'           =>$so_luong,
            'SL_goi_y'           => $SL_goi_y,
            'SL_goi_y'           => $SL_goi_y,
            'lieu_dung'           => $lieu_dung,
            'gia_ban'          => $gia_ban,   
            'gia_nhap'           => $gia_nhap,
            'ngay_nhap'           => $ngay_nhap,
            'han_su_dung'          => $han_su_dung,     
            'don_vi'           => $don_vi,
            'nhom_thuoc'           => $nhom_thuoc,

            'trang_thai' => '1'

        );
        DB::table("supplies")->insert($data);
        return back()->with('success', 'Thêm thuốc mới thành công.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id) {
            $supplies = Supplies::findOrFail($id);
            return view('admin.supplies.show', compact('supplies'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if ($id) {
            $supplies = Supplies::findOrFail($id);
            return view('admin.supplies.edit', compact('supplies'));
        }
    }

    public function ajaxChonThuoc(Request $request)
    {
        // $supplies = Supplies::where('ma_thuoc', $request->ma_thuoc)->where('trang_thai', 1)->first();
        // $supplies = Supplies::where('ma_thuoc', $request->ma_thuoc)->first();
        // $supSolo = Supplies::find(\DB::table('supplies')->->min('so_lo'));
        $a = Supplies::where('ma_thuoc', $request->ma_thuoc)->get();
        $min = $a->min('so_lo');
        $supplies = Supplies::where('ma_thuoc', $request->ma_thuoc)->where('so_lo', $min)->first();

        if($supplies) {
            $ma_thuoc = $supplies->ma_thuoc;
            $so_lo = $supplies->so_lo;
            $ten_thuoc = $supplies->ten_thuoc;
            $SL_goi_y = $supplies->SL_goi_y;
            $lieu_dung = $supplies->lieu_dung;
            $don_vi = $supplies->don_vi;
            $gia_ban = $supplies->gia_ban;
            $gia_nhap = $supplies->gia_nhap;
            $mo_ta = $supplies->mo_ta;
            return response()->json([
                'ma_thuoc' => $ma_thuoc,
                'so_lo' => $so_lo,
                'ten_thuoc' => $ten_thuoc,
                'SL_goi_y' => $SL_goi_y,
                'lieu_dung' => $lieu_dung,
                'don_vi' => $don_vi,
                'gia_ban' => $gia_ban,
                'gia_nhap' => $gia_nhap,
                'mo_ta' => $mo_ta,
            ], 200);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //chi tiết
     public function showHet($id)
    {
        $supplies = Supplies::findOrfail($id);
        return view('admin.supplies.chiTiet', compact('supplies'));
    }
    //xóa
    public function edit_up($id)
    {
        $supplies = Supplies::findOrfail($id);
        return view('admin.supplies.edit', compact('supplies'));
    }
    public function update(Request $request, $id)
    {   
        $supplies = Supplies::findOrfail($id);
        // $number1 = DB::table('product_stocks')->where('supplies_id','Me00000001')->sum('qty');
        // $number2 = DB::table('supplies')->where('ma_thuoc','Me00000001')->sum('SL_goi_y');
        // $number = $number2 - $number1;

        // $tong = $request->input('SL_goi_y');

        $supplies->update([
            'so_lo' => $request->so_lo,
            'ten_thuoc' => $request->ten_thuoc,
            'SL_goi_y' => $request->SL_goi_y,
            'SL_goi_y' => $request->SL_goi_y,
            'lieu_dung' => $request->lieu_dung,
            'gia_ban' => $request->gia_ban,
            'gia_nhap' => $request->gia_nhap,
            'ngay_nhap' => $request->ngay_nhap,
            'han_su_dung' => $request->han_su_dung,
            'don_vi' => $request->don_vi,
            'nhom_thuoc' => $request->nhom_thuoc,
       ]);
       return redirect()->route('admin.supplies.index');
    }
    //nhập thêm số lượng thuốc
    public function add_up($id)
    {
        $supplies = Supplies::findOrfail($id);
        return view('admin.supplies.add', compact('supplies'));
    }
    public function add(Request $request, $id)
    {   
        $ma_thuoc           = $request->input('ma_thuoc');
        $ten_thuoc           = $request->input('ten_thuoc');
        $so_lo           = $request->input('so_lo');
        $so_luong           = $request->input('so_luong');
        $SL_goi_y           = $request->input('SL_goi_y');
        $nha_cung_cap       =  $request->input('nha_cung_cap');
        $SL_goi_y           = $request->input('SL_goi_y');
        $lieu_dung           = $request->input('lieu_dung');
        $gia_ban           = $request->input('gia_ban');
        $gia_nhap           = $request->input('gia_nhap');
        $ngay_nhap           = $request->input('ngay_nhap');
        $han_su_dung           = $request->input('han_su_dung');
        $don_vi           = $request->input('don_vi');
        $nhom_thuoc           = $request->input('nhom_thuoc');
        
          $data = array(
            'ma_thuoc'          => $ma_thuoc,
            'ten_thuoc'         =>  $ten_thuoc,
            'nha_cung_cap'      => $nha_cung_cap,
            'so_lo'             => $request->so_lo + 1,
            'so_luong'          => $so_luong,
            'con_lai'           =>$so_luong,
            'SL_goi_y'          => $SL_goi_y,
            'lieu_dung'         => $lieu_dung,
            'gia_ban'           => $gia_ban,   
            'gia_nhap'          => $gia_nhap,
            'ngay_nhap'         => $ngay_nhap,
            'han_su_dung'       => $han_su_dung,     
            'don_vi'            => $don_vi,
            'nhom_thuoc'        => $nhom_thuoc,
            'trang_thai'        => '1'

        );
        DB::table("supplies")->insert($data);
        DB::table('supplies')->where('id',$id)->update(['trang_thai' => '0']);
       return redirect()->route('admin.supplies.index');
    }

    public function destroy($id)
    {       
        $supplies = Supplies::findOrfail($id);
        $supplies->delete();    
        return back();
    }

    public function export()
    {       
        // // $supplies_data = DB::table('supplies')->get()->toArray();
        // // $supplies_array[] = array(
        // //     'ma_thuoc',
        // //     'ten_thuoc',
        // //     'nha_cung_cap',
        // //     'so_luong',
        // //     'con_lai'
        // // );       
        // // foreach ($supplies_data as $supplies) {
        // //     $supplies_array[] = array(
        // //     'ma_thuoc' => $supplies->ma_thuoc,
        // //     'ten_thuoc' => $supplies->ten_thuoc,
        // //     'nha_cung_cap' => $supplies->nha_cung_cap,
        // //     'so_luong' => $supplies->so_luong,
        // //     'con_lai' => $supplies->con_lai
        // //     );
        // // }
        $a = Supplies::all();

        return Excel::download($a, 'test.xlsx');

        // // Excel::store('supplies data', function($excel) use ($supplies_array) 
        // // {
        // //     $excel->setTitle('supplies data');
        // //     $excel->sheet('supplies data', function($sheet) use ($supplies_array){
        // //         $sheet->fromArray($supplies_array, null, 'A1', false, false);
        // //     });
        // // })->download('xls');

        // // Excel::download('Pdf Data', function($excel) use ($supplies_array){
        // //     $excel->setTitle('Pdf Data');
        // //     $excel->sheet('Pdf Data', function($sheet) use ($supplies_array){
        // //         $sheet->fromArray($supplies_array, null, 'A1', false, false);
        // //     });
        // // }
        // return Excel::download(new exportEX, 'Pdf Data.xlsx');
        // //return Excel::download($supplies_array, 'test.xlsx');
    }
    

}
