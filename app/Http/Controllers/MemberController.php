<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Reservoir;
use Validator;


class MemberController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('name')->orderBy('surname')->get();
        $membersCities = $members->unique('live');
        // dd($membersCities);
        $reservoirs = Reservoir::all()->unique('title');

        return view('member.index', ['members' => $members, 'reservoirs' =>$reservoirs, 'membersCities' =>$membersCities]); 
    }

        public function indexSpecifics(Request $request) 
        {
        $members = Member::all();
        
        $membersCities = $members->unique('live');
        if ($request->order) {
            $members = $members->sortBy($request->order);
        }
        if($request->filter) {
            $members = $members->where('reservoir_id','=', $request->filter);
        }
        if($request->filterCity) {
            $members = $members->where('live','=', $request->filterCity);
        }

        $reservoirs= Reservoir::all()->unique('title');
       return view('member.index', ['members' => $members, 'reservoirs' => $reservoirs, 'membersCities' => $membersCities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::all();
        return view('member.create', ['reservoirs' => $reservoirs]);
 
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
            'name' => ['required', 'min:2', 'max:100'],
            'surname' => ['required', 'min:2', 'max:150'],
            'live' => ['required', 'min:2', 'max:50'],
            'experience' => ['required', 'numeric', 'min:1'],
            'registered' => ['required', 'numeric', 'lt:experience', 'min:0'],
        ],
 [
 'name.min' => 'Vardas per trumpas',
 'name.max' => 'Vardas per ilgas',
 'name.required' => 'Privaloma nurodyti vard??',

 'surname.min' => 'Pavard?? per trumpa',
 'surname.max' => 'Pavard?? per ilga',
 'surname.required' => 'Privaloma nurodyti pavard??',

 'live.required' => 'Privaloma nurodyti gyvenam??j?? viet??',

 'experience.numeric' => 'Patirtis turi b??ti nurodoma skai??iais',
 'experience.required' => 'B??tina nurodyti patirt??',
 

 'registered.numeric' => 'Registracija turi b??ti nurodoma skai??iais',
 'registered.required' => 'B??tina nurodyti registracij??',
 'registered.lt:experience' => 'Registracija turi b??ti ma??esn?? negu patirtis',
 'registered.min' => 'Minimalus reikalavimas yra nurodyti nul??'
 ]
 //nurodyti validacijoje iki kiek gali buti integeriai(dydis)
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 


        $member = new Member;
        $member->name = $request->name;
        $member->surname = $request->surname;
        $member->live = $request->live;
        $member->experience = $request->experience;
        $member->registered = $request->registered;
        $member->reservoir_id = $request->reservoir_id;
        $member->save();
        return redirect()->route('member.index')->with('success_message','s??kmingai ??ra??ytas');
    }


/**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $reservoirs = Reservoir::all();
        return view('member.edit', ['member' => $member, 'reservoirs' => $reservoirs]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => ['required', 'min:2', 'max:100'],
            'surname' => ['required', 'min:2', 'max:150'],
            'live' => ['required', 'min:2', 'max:50'],
            'experience' => ['required', 'numeric', 'min:1'],
            'registered' => ['required', 'numeric', 'lt:experience', 'min:0'],
        ],
 [
 'name.min' => 'Vardas per trumpas',
 'name.max' => 'Vardas per ilgas',
 'name.required' => 'Privaloma nurodyti vard??',

 'surname.min' => 'Pavard?? per trumpa',
 'surname.max' => 'Pavard?? per ilga',
 'surname.required' => 'Privaloma nurodyti pavard??',

 'live.required' => 'Privaloma nurodyti gyvenam??j?? viet??',

 'experience.numeric' => 'Patirtis turi b??ti nurodoma skai??iais',
 'experience.required' => 'B??tina nurodyti patirt??',
 

 'registered.numeric' => 'Registracija turi b??ti nurodoma skai??iais',
 'registered.required' => 'B??tina nurodyti registracij??',
 'registered.lte:experience' => 'Registracija turi b??ti ma??esn?? arba lygu negu patirtis',
 'registered.min' => 'Minimalus reikalavimas yra nurodyti nul??'
 ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $member->name = $request->name;
       $member->surname = $request->surname;
       $member->live = $request->live;
       $member->experience = $request->experience;
       $member->registered = $request->registered;
       $member->reservoir_id = $request->reservoir_id;
       $member->save();
       return redirect()->route('member.index')->with('success_message','s??kmingai atnaujintas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
       return redirect()->route('member.index')->with('success_message','s??kmingai i??trintas');
    }
}
