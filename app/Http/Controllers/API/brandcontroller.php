<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;

class brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=brand::get();
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
            'nama_brand'=>'required'
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_brand
     * @return \Illuminate\Http\Response
     */
    public function show($id_brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id_brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_brand)
    {
        $validasi=$request->validate([
            'nama_brand'=>'required',
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_brand)
    {
        try {
            $response = brand::find($id_brand);
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
