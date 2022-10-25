<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rsBarang = Barang::select('*')->with('kategori')->simplePaginate(5);
        return view('barang.index', compact('rsBarang'))
                                    ->with('i', (request()
                                    ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rsKategori = Kategori::All();
        return view('barang.create',compact('rsKategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required',
            'merk'        => 'required',
            'spesifikasi' => 'required',
            'lokasi'      =>'required',
            'kategori_id' =>'required'
        ]);
        
    
        Barang::create($request->all());
     
        return redirect()->route('barang.index')
                         ->with('success','barang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $barang			= Barang::find($barang->id);
        $reckategori	= $barang->kategori;
        $kategori		= $reckategori->kategori;
        $keterangan		= $reckategori->keterangan;
   
        return view('barang.show',compact(['barang','kategori','keterangan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $rsKategori = Kategori::All();
        return view('barang.edit',compact(['barang','rsKategori']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama'        => 'required',
            'merk'        => 'required',
            'spesifikasi' => 'required',
            'lokasi'      =>'required',
            'kategori_id' =>'required'
        ]);
    
        $barang->update($request->all());
    
        return redirect()->route('barang.index')
                         ->with('success','barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        DB::beginTransaction();
        try {
            $barang->delete();
            DB::commit();
            return redirect()->route('barang.index')
                             ->with('success','barang delete successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('barang.index')
                             ->with('failed','Barang Delete unsuccessfull');
        }
    }
}
