<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rsKategori = Kategori::latest()->paginate(5);
        return view('kategori.index', compact('rsKategori'))
                                      ->with('i',(request()
                                      ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
                         ->with('success','Kategori created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        $kategori = Kategori::find($kategori->id);
    	
        $rsBarang = $kategori->barang;
    	$recKategori = $kategori->kategori;
    	$recKeterangan  = $kategori->keterangan;
    	
        return view('kategori.show', compact(['recKategori','recKeterangan','rsBarang']))
                                     ->with('i', (request()
                                     ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')
                         ->with('success','Kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        DB::beginTransaction();
        try {
            $kategori->delete();
            DB::commit();
            
            return redirect()->route('kategori.index')
                             ->with('success','Category delete successfully');
            
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('kategori.index')
                             ->with('failed','Category delete unsuccessfull!!');
        }
    }
}
