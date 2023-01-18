<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    protected $services;

    public function __construct(Service $services)
    {
        $this->services = $services;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services_data = $this->services->orderBy('id', 'DESC')->get();
        return view('admin.our_service.service.index')->with('services_data', $services_data);
    }

    public function serviceStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('services')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('services')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.our_service.service.create');
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
        $this->services->fill($data);
        $status = $this->services->save();
        if ($status) {
            return redirect()->route('service.index')->with('success', 'Service added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding service');
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
        $this->services = $this->services->find($id);
        if (!$this->services) {
            //message
            return redirect()->back()->with('error', 'This service is not found');
        }

        return view('admin.our_service.service.view')
            ->with('service_data', $this->services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->services = $this->services->find($id);
        if (!$this->services) {
            //message
            return redirect()->back()->with('error', 'This service is not found');
        }

        return view('admin.our_service.service.create')
            ->with('service_data', $this->services);
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
        $this->services = $this->services->find($id);
        if (!$this->services) {
            return redirect()->back()->with('error', 'This service is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->services->fill($data);
        $status = $this->services->save();
        if ($status) {
            return redirect()->route('service.index')->with('success', 'Service updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating service');
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
        $this->services = $this->services->find($id);
        if (!$this->services) {
            return redirect()->back()->with('error', 'This service is not found');
        }

        $del = $this->services->delete();
        if ($del) {
            return redirect()->route('service.index')->with('success', 'Service deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting service');
        }
    }
}
