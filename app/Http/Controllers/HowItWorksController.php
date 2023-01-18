<?php

namespace App\Http\Controllers;

use App\Models\HowItWorks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HowItWorksController extends Controller
{
    protected $works;

    public function __construct(HowItWorks $works)
    {
        $this->works = $works;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works_data = $this->works->orderBy('id', 'DESC')->get();
        return view('admin.how_it_works.index')->with('works_data', $works_data);
    }

    public function howItWorksStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('how_it_works')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('how_it_works')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.how_it_works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->works->fill($data);
        $status = $this->works->save();
        if ($status) {
            return redirect()->route('how_it_works.index')->with('success', 'Work data added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding work data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->works = $this->works->find($id);
        if (!$this->works) {
            //message
            return redirect()->back()->with('error', 'This work data is not found');
        }

        return view('admin.how_it_works.view')
            ->with('work_data', $this->works);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->works = $this->works->find($id);
        if (!$this->works) {
            //message
            return redirect()->back()->with('error', 'This banner is not found');
        }

        return view('admin.how_it_works.create')
            ->with('work_data', $this->works);
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
        $this->works = $this->works->find($id);
        if (!$this->works) {
            return redirect()->back()->with('error', 'This work data is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->works->fill($data);
        $status = $this->works->save();
        if ($status) {
            return redirect()->route('how_it_works.index')->with('success', 'Work data updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating work data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->works = $this->works->find($id);
        if (!$this->works) {
            return redirect()->back()->with('error', 'This work data is not found');
        }

        $del = $this->works->delete();
        if ($del) {
            return redirect()->route('how_it_works.index')->with('success', 'Work data deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting work data');
        }
    }
}
