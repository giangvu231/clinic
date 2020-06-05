<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;
use Validator;
use Response;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$limit = $request->limit ? $request->limit : 100;
        $templates = Template::latest();
        if($request->name) {
            $templates = $templates->where('TenNoiDung', 'like', '%' . $request->name . '%');
        }
        
        $templates = $templates->paginate($limit);
        return view('admin.template.index', compact("templates"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.template.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            
            'TenNoiDung' => 'required',
            'KetQua_Text' => 'required',
            'KetLuan' => 'required',
            
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            session()->put('errors', []);
            foreach($errors as $error) {
                session()->push('errors', $error);
            }
            return back();
        }
        $template = Template::create($request->all());
        session()->flash("message","Thêm một template thành công");
        return redirect()->route('admin.template.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template $template
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id) {
            $template = Template::findOrFail($id);
            return view('admin.template.show', compact('template'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template $template
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id) {
            $template = Template::findOrFail($id);
            return view('admin.template.edit', compact('template'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Template $template
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // dd(1);
        if ($id) {
            $rules = [                
                'TenNoiDung' => 'required',
                'KetQua_Text' => 'required',
                'KetLuan' => 'KetLuan',
                
            ];

            $data = [
                
                'TenNoiDung' => $request->TenNoiDung,
                'KetQua_Text' => $request->KetQua_Text,
                'KetLuan' => $request->KetLuan,
               
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                session()->put('errors', []);
                foreach($errors as $error) {
                    session()->push('errors', $error);
                }
                return back();
            }

            $template = Template::findOrFail($id);
            $template = $template->update($data);
            session()->flash("message","Sửa một template thành công");
            return redirect()->route('admin.template.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template $template
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $template = Template::findOrFail($id);
            $template->delete();
            return redirect()->route('admin.template.get.index');
        }
    }
}
