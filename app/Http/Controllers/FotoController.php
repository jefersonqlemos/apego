<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Foto;

use App\Produto;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //

        $foto = new Foto();

        if($request->hasFile('foto')){
            $fototemp = $request->foto->store('/public/upload');
            $fototemp = Storage::url($fototemp);
            $foto->fotos = $fototemp;
        }

        /*if($request->hasFile('foto')){
            $fototemp = $request->foto->store('/storage/upload', 'uploads');
            //$fototemp = Storage::url($fototemp);
            $foto->fotos = '/'.$fototemp;
        }*/

        $foto->produtos_idprodutos = $request->idproduto;

        $foto->save();

        $produto = Produto::find($request->idproduto);
        
        if($request->fotoproduto == null){
            $produto->foto = $fototemp;
        }else{
            $produto->foto = $request->fotoproduto;
        }

        $produto->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        //dd($request->foto);

        $foto = new Foto();

        /*if($request->hasFile('foto')){
            $fototemp = $request->foto->store('/storage/upload', 'uploads');
            //$fototemp = Storage::url($fototemp);
            $foto->fotos = '/'.$fototemp;
        }*/
        
        if($request->hasFile('foto')){
            $fototemp = $request->foto->store('/public/upload');
            $fototemp = Storage::url($fototemp);
            $foto->fotos = $fototemp;
        }

        $foto->produtos_idprodutos = $id;

        $foto->save();

        $produto = Produto::find($id);
        
        if($request->fotoproduto == null){
            $produto->foto = $fototemp;
        }else{
            $produto->foto = $request->fotoproduto;
        }

        $produto->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $foto = Foto::find($id); // Can chain this line with the next one
        $foto->delete();
        return redirect()->back();
    }
}
