<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bukus = Buku::all();
        return view("buku", ["bukus"=>$bukus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view("create");
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
        $request->validate([
            'Judul' => 'required',
            'Author' => 'required',
            'Synopsis' => 'required',
            'Penerbit' => 'required'
        ]);

        $input = $request->all();
        $bukus = Buku::create($input);

        return redirect("buku")->with('success', ' Data telah ditambah !!!');
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
        $buku = Buku::findOrFail($id);
        return view("edit", ["buku"=>$buku]);
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
        $request->validate([
            'Judul' => 'required',
            'Author' => 'required',
            'Synopsis' => 'required',
            'Penerbit' => 'required'
        ]);

        $buku = Buku::find($id)->update($request->all());
        return redirect("buku")->with('success', ' Data telah diperbaharui !!!');
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
        $buku = Buku::find($id);

        $buku->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
}
