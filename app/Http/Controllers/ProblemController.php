<?php

namespace App\Http\Controllers;

use App\Models\Problems;
use Illuminate\Http\Request;
use App\Http\Requests\ProblemFormRequest;

class ProblemController extends Controller
{

    public function __construct(Problems $problem)
    {
        $this->problem = $problem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems= $this->problem::where('status','pending')->orWhere('status','solving')->get();
        // dd($problems);
        return view('admin.problems.index', compact('problems'));
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProblemFormRequest $request)
    {
        $this->problem::create($request->createProblems());
        return redirect()->route('home');
        // dd($request->all());

        //
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
        $status=$request->status;
        $problem=$this->problem::find($id);
     
        $problem->status= $status;
        $problem->save();
        return redirect()->route('problem.changeStatus');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $problem=$this->problem::find($id);
        $problem->delete();
        return redirect('admin/problem-view');
        //
    }
}
