<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mark;
use App\Http\Controllers\Controller;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $marks = Mark::all();  
        return view('marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('marks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'name'=>'required'
            ]);
    
            $contact = new Mark([
                'name' => $request->get('name')
            ]);
            $contact->save();
            return redirect('/cars')->with('success', 'mark saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $mark = Mark::find($id);
        return view('marks.show', array('mark' => $mark));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $mark = Mark::find($id);
        return view('marks.edit', compact('mark')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $mark = Mark::find($id);
        $mark->name =  $request->get('name');
        $mark->save();

        return redirect('/marks')->with('success', 'mark updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        $mark->delete();

        return redirect('/marks')->with('success', 'mark deleted!');
    }
}