<?php

namespace App\Http\Controllers;

use App\Models\TimeLapse;
use Illuminate\Http\Request;

class PlansController extends Controller
{
  private $days = [
    [7, "Una semana"],
    [15, "Quince días"],
    [30, "Un mes"],
    [60, "Dos meses"],
    [90, "Tres meses"],
    [180, "Seis meses"],
    [365, "Un año"],
    [730, "Dos años"],
    [1095, "Tres años"]
  ];

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $plans = TimeLapse::all();
    return view('plans', compact('plans'))->with('days', $this->days);
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
    TimeLapse::create([
      "title" => $request->title,
      "price" => $request->price,
      "days" => $request->days,
      "desc" => $request->desc
    ]);
    session()->flash('success', 'Plan creado correctamente!');
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
    TimeLapse::find($id)->delete();
    session()->flash('success', 'Plan borrado correctamente!');
    return back();
  }
}
