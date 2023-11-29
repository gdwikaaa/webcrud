<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ban;
use App\Models\merkban;
use App\Models\jenisban;

class banController extends Controller
{

    public function index()
    {
        $ban = ban::with('merkban')->get();
        $ban = ban::with('jenisban')->get();

        return view('ban.index', ['banban' => $ban]);
    }

    public function create()
    {
        // $jenisban = DB::table('jenisban')->get();
        // $merkban = DB::table('merkban')->get();
        $merkban = merkban::all();
        $jenisban = jenisban::all();
       
        return view('ban.create', ['jenisban' => $jenisban,'merkban' => $merkban]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'kdban' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'jenisban_id' => 'required',
            'merkban_id' => 'required',
        ]);

       $ban = ban::create([
            'kdban' => $validated['kdban'],
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'jenisban_id' => $validated['jenisban'],
            'merkban_id' => $validated['merkban'],
        ]);

        return redirect(url('/ban'));
    }

    public function update(Request $request, ban $ban)
    {
        $ban->update([
            'kdban' => $request->kdban,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisban_id' => $request->jenisban,
            'merkban_id' => $request->merkban,
        ]);

        return redirect(url('/ban'));
    }

    public function edit(ban $ban)
    {
        $ban->load('jenisban');
        $ban->load('merkban');
        // ->select("ban.id", "kdban", "ban.nama","ban.harga", "jenisban_id", "jenisban.nama AS jenisban_nama" ,"merkban_id", "merkban.nama AS merkban_nama")
        // ->join('merkban', 'merkban.id', '=', 'ban.merkban_id')
        // ->join('jenisban', 'jenisban.id', '=', 'ban.jenisban_id')
        // ->where('ban.id', $id)
        // ->first();

        $jenisban = jenisban::all();
        $merkban = merkban::all();

        return view('ban.edit', ['banban' => $ban, 'id' => $ban->id,'jenisban' => $jenisban,'merkban' => $merkban]);
    }

    public function show(ban $ban)
    {
        $ban->load('jenisban');
        $ban->load('merkban');
        // $ban = DB::table('ban')
        // ->select("ban.id", "kdban", "ban.nama","ban.harga", "jenisban_id", "jenisban.nama AS jenisban_nama" ,"merkban_id", "merkban.nama AS merkban_nama")
        // ->join('merkban', 'merkban.id', '=', 'ban.merkban_id')
        // ->join('jenisban', 'jenisban.id', '=', 'ban.jenisban_id')
        // ->where('ban.id', $id)
        // ->first();

        $jenisban = jenisban::all();
        $merkban = merkban::all();

        return view('ban.show', ['banban' => $ban, 'id' => $ban->id,'jenisban' => $jenisban, 'merkban' => $merkban]);
    }
    public function destroy(ban $ban)
    {
        $ban->delete();

        return redirect(url('/ban'));
}
}