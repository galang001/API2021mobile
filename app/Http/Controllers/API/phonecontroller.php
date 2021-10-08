<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\phone;

class phonecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=phone::getPhone()->paginate(5);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'kd_phone'=>'required'
             ,'nama'=>'required',
             'tahun'=>'required',
             'merk'=>'required','asalhp'=>'required',
             'foto'=>'required|file|mimes:png,jpg',
        ]);
        try {
            $fileName          = time().$request->file('foto')->getClientOriginalName();
            $path              = $request->file('foto')->storeAs('uploads/phone', $fileName);
            $validasi['foto']  = $path;
            $response          = phone::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data'    => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
            ]);
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_phone
     * @return \Illuminate\Http\Response
     */
    public function show($id_phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_phone
     * @return \Illuminate\Http\Response
     */
    public function edit($id_phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_phone)
    {
        $validasi=$request->validate([
            'kd_phone'=>'required',
             'nama'=>'required',
             'tahun'=>'required',
             'merk'=>'required',
             'asalhp'=>'required',
             'foto'=>'',
        ]);
        try {
            if($request->file('foto')){
                $fileName          = time().$request->file('foto')->getClientOriginalName();
                $path              = $request->file('foto')->storeAs('uploads/phone', $fileName);
                $validasi['foto']  = $path;
            }

            $response = phone::find($id_phone);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data'    => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_phone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_phone)
    {
        try {
            $response = phone::find($id_phone);
            $response->delete();
            return response()->json([
                'success' => true,
                'message' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
