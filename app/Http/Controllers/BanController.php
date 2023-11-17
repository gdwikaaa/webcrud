<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class banController extends Controller
{

    public function index()
    {
        $ban = DB::table('ban')
        ->select("ban.id", "kdban", "ban.nama","ban.harga", "jenisban_id", "jenisban.nama AS jenisban_nama" ,"merkban_id", "merkban.nama AS merkban_nama")
        ->join('merkban', 'merkban.id', '=', 'ban.merkban_id')
        ->join('jenisban', 'jenisban.id', '=', 'ban.jenisban_id')
        ->get();

        return view('ban.index', ['banban' => $ban]);
    }

    public function create()
    {
        $jenisban = DB::table('jenisban')->get();
        $merkban = DB::table('merkban')->get();
       
        return view('ban.create', ['jenisban' => $jenisban,'merkban' => $merkban]);
    }

    public function store(Request $request)
    {
        DB::table('ban')->insert([
            'kdban' => $request->kdban,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisban_id' => $request->jenisban,
            'merkban_id' => $request->merkban,
        ]);

        return redirect(url('/ban'));
    }

    public function update(Request $request, $id)
    {
        DB::table('ban')
        ->where('id', $id)
        ->update([
            'kdban' => $request->kdban,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisban_id' => $request->jenisban,
            'merkban_id' => $request->merkban,
        ]);

        return redirect(url('/ban'));
    }

    public function edit($id)
    {
        $ban = DB::table('ban')
        ->select("ban.id", "kdban", "ban.nama","ban.harga", "jenisban_id", "jenisban.nama AS jenisban_nama" ,"merkban_id", "merkban.nama AS merkban_nama")
        ->join('merkban', 'merkban.id', '=', 'ban.merkban_id')
        ->join('jenisban', 'jenisban.id', '=', 'ban.jenisban_id')
        ->where('ban.id', $id)
        ->first();

        $jenisban = DB::table('jenisban')->get();
        $merkban = DB::table('merkban')->get();

        return view('ban.edit', ['banban' => $ban, 'id' => $id,'jenisban' => $jenisban,'merkban' => $merkban]);
    }

    public function show($id)
    {
        $ban = DB::table('ban')
        ->select("ban.id", "kdban", "ban.nama","ban.harga", "jenisban_id", "jenisban.nama AS jenisban_nama" ,"merkban_id", "merkban.nama AS merkban_nama")
        ->join('merkban', 'merkban.id', '=', 'ban.merkban_id')
        ->join('jenisban', 'jenisban.id', '=', 'ban.jenisban_id')
        ->where('ban.id', $id)
        ->first();

        $jenisban = DB::table('jenisban')->get();
        $merkban = DB::table('merkban')->get();

        return view('ban.show', ['banban' => $ban, 'id' => $id,'jenisban' => $jenisban, 'merkban' => $merkban]);
    }
    public function destroy($id)
    {
        DB::table('ban')
        ->where('id', $id)
        ->delete();

        return redirect(url('/ban'));
}
}