<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuppliersResource;
use App\Laravue\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('brand') && $request->input('brand') != '') {
            return SuppliersResource::collection(Suppliers::where('marca', $request->input('brand'))->get());
        }
        else {
            return SuppliersResource::collection(Suppliers::all());
        }
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
        $validator = Validator::make(
            $request->all(),
            [
                // ensure that the validation rules expects the data in the format you have dumped above
            ]
        );
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403); // 422 is more appropriate
        }

        $params = $request->all();
        return Suppliers::create([
            'proveedor' => $params['proveedor'],
            'marca' => $params['marca'],
            'code' => strtolower($params['proveedor']) . time(), // Just to make sure this value is unique
            'contacto' => $params['contacto'],
            'telefono' => $params['telefono'],
            'email' => $params['email'],
            'pais' => $params['pais'],
            'direccion' => $params['direccion'],
            'calidad' => $params['calidad'],
            'pedidos' => $params['pedidos'],
            'link' => $params['link'],
        ]);
    
        return new SuppliersResource($suppliers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laravue\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laravue\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(Suppliers $suppliers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laravue\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
// File: app/Http/Controllers/CategoryController.php
public function update(Request $request, $id)
{
    if ($id === null) {
        return response()->json(['error' => 'Supplier not found'], 404);
    }

    $validator = Validator::make(
        $request->all(),
        [

        ]
    );

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 403);
    } else {
        $suppliers = Suppliers::find($id);
        $params = $request->all();
        // $suppliers->id = $params['id'];
        $suppliers->proveedor = $params['proveedor'];
        $suppliers->marca = $params['marca'];
        $suppliers->contacto = $params['contacto'];
        $suppliers->telefono = $params['telefono'];
        $suppliers->email = $params['email'];
        $suppliers->pais = $params['pais'];
        $suppliers->direccion = $params['direccion'];
        $suppliers->calidad = $params['calidad'];
        $suppliers->pedidos = $params['pedidos'];
        $suppliers->link = $params['link'];
        $suppliers->save();
    }

    return new SuppliersResource($suppliers);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laravue\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Suppliers::destroy($id);
        } catch (\Exception $ex) {
            response()->json(['error' => $ex->getMessage()], 403);
        }
        return response()->json(null, 204);
    }
}
