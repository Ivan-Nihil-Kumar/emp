<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Emp::latest()->paginate(5);

    

        return view('emps.index',compact('emps'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emps.create');
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

            'Employee_name' => 'required',

            'Job_detail' => 'required',

        ]);

    

        Emp::create($request->all());

     

        return redirect()->route('emps.index')

                        ->with('success','Employee Detail Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function show(Emp $emp)
    {
        return view('emps.show',compact('emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function edit(Emp $emp)
    {
        return view('emps.edit',compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emp $emp)
    {
        $request->validate([

            'Employee_name' => 'required',

            'Job_detail' => 'required',

        ]);

    

        $emp->update($request->all());

    

        return redirect()->route('emps.index')

                        ->with('success','Employee detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emp $emp)
    {
        $emp->delete();

    

        return redirect()->route('emps.index')

                        ->with('success','Employee Detail deleted successfully');
    }

    public function getvalue($id)
    {
        $data =Emp::find($id);
        return view('emps.edit',['data'=>$data]);

    }

    public function index2()
    {
        $employees = Emp::all();
        return view('emps.edit', ['Employee_name' => $employees]);
    }
}
