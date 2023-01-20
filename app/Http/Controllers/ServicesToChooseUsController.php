<?php

namespace App\Http\Controllers;

use App\Models\ServicesToChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesToChooseUsController extends Controller
{
    protected $services_choose;

    public function __construct(ServicesToChooseUs $services_choose)
    {
        $this->services_choose = $services_choose;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services_choose_data = $this->services_choose->orderBy('id', 'DESC')->get();
        return view('admin.about.services_choose.index')->with('services_choose_data', $services_choose_data);
    }

    public function servicesChooseUsStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('services_to_choose_us')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('services_to_choose_us')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.about.services_choose.create');
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
            'sub_title' => 'string|required',
            'description' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->services_choose->fill($data);
        $status = $this->services_choose->save();
        if ($status) {
            return redirect()->route('services_choose.index')->with('success', 'Services to choose us detail added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding services to choose us detail');
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
        $this->services_choose = $this->services_choose->find($id);
        if (!$this->services_choose) {
            //message
            return redirect()->back()->with('error', 'This services to choose us detail is not found');
        }

        return view('admin.about.services_choose.view')
            ->with('services_choose_data', $this->services_choose);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->services_choose = $this->services_choose->find($id);
        if (!$this->services_choose) {
            //message
            return redirect()->back()->with('error', 'This services to choose us detail is not found');
        }

        return view('admin.about.services_choose.create')
            ->with('services_choose_data', $this->services_choose);
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
        $this->services_choose = $this->services_choose->find($id);
        if (!$this->services_choose) {
            return redirect()->back()->with('error', 'This services to choose us detail is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'sub_title' => 'string|required',
            'summary' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->services_choose->fill($data);
        $status = $this->services_choose->save();
        if ($status) {
            return redirect()->route('services_choose.index')->with('success', 'Services to choose us detail updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating services to choose us detail');
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
        $this->services_choose = $this->services_choose->find($id);
        if (!$this->services_choose) {
            return redirect()->back()->with('error', 'This services to choose us detail is not found');
        }

        $del = $this->services_choose->delete();
        if ($del) {
            return redirect()->route('services_choose.index')->with('success', 'Services to choose us detail deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting services to choose us detail');
        }

    }
}
