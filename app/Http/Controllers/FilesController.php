<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $files = File::where('id_user', Auth::user()->id)->get();
    return view('files', compact('files'));
  }

  /**
   * Download selected file.
   */
  public function get($file)
  {
    return Storage::disk('local')->download($file);
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
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Storage::disk('local')->put($request->file('file')->getClientOriginalName(), file_get_contents($request->file));
    File::create([
      'id_user' => Auth::user()->id,
      'file' => $request->file('file')->getClientOriginalName()
    ]);
    session()->flash('success', 'Archivo cargado correctamente!');
    return back();
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    File::where('file', $id)->delete();
    Storage::disk('local')->delete($id);
    session()->flash('success', 'Archivo borrado correctamente!');
    return back();
  }
}
