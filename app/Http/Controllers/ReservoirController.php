<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;

class ReservoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservoirs = Reservoir::all();
       return view('reservoir.index', ['reservoirs' => $reservoirs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservoir.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => ['required', 'min:2', 'max:200'],
            'area' => ['required', 'min:0'],
            'about' => ['required', 'min:2'],
        ],
 [
 'title.required' => 'Privaloma įvesti pavadinimą',
 'title.min' => 'Pavadinimas per trumpas',
 'title.max' => 'Pavadinimas per ilgas',

'area.required' => 'Plotas turi būti užpildytas',
'area.numeric'=> 'Plotas turi būti nurodomas skaičiais',

'about.required' => 'Aprašymas turi būti užpildytas',
 ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $reservoir = new Reservoir();
$reservoir-> title = $request-> title;
$reservoir-> area = $request-> area;
$reservoir-> about = $request-> about;
$reservoir->save();
return redirect()->route('reservoir.index')->with('success_message','sėkmingai įrašytas');

    }

 /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        return view('reservoir.show',['reservoir' =>$reservoir]);
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {

        $validator = Validator::make($request->all(),
        [
            'title' => ['required', 'min:2', 'max:200'],
            'area' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$'],
            'about' => ['required', 'min:2'],
        ],
 [
    'title.required' => 'Privaloma įvesti pavadinimą',
    'title.min' => 'Pavadinimas per trumpas',
    'title.max' => 'Pavadinimas per ilgas',
   
   'area.required' => 'Plotas turi būti užpildytas',
   'area.numeric'=> 'Plotas turi būti nurodomas skaičiais',
   
   'about.required' => 'Aprašymas turi būti užpildytas'
 ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }



        $reservoir->title = $request->title;
        $reservoir->area = $request->area;
        $reservoir->about = $request->about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message','sėkmingai atnaujintas');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {

        if($reservoir->member->count()){
            return redirect()->route('reservoir.index')->with('info_message','Trinti negalima, nes turi duomenų');
        }
        $reservoir->delete();
        return redirect()->route('reservoir.index')->with('success_message','sėkmingai ištrintas');
 
    }
}
