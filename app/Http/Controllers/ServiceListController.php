<?php

namespace App\Http\Controllers;

use App\Models\ServiceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceListController extends Controller
{
    protected $services;

    public function __construct(ServiceList $services)
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
        return view('admin.our_service.service_list.index')->with('services_data', $services_data);
    }

    public function serviceListStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('service_lists')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('service_lists')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.our_service.service_list.create');
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
            'description' => 'string|nullable',
        ]);

        $order_id = $this->services->all();
        $data = $request->except(['_token']);
        $data['order_id'] = getOrderId($order_id);
        $data['slug'] = $this->services->getSlug($data['title']);
        $this->services->fill($data);
        $status = $this->services->save();
        if ($status) {
            return redirect()->route('service_list.index')->with('success', 'Service List added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding service list');
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
            return redirect()->back()->with('error', 'This service list is not found');
        }

        return view('admin.our_service.service_list.view')
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
            return redirect()->back()->with('error', 'This service list is not found');
        }

        return view('admin.our_service.service_list.create')
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
            return redirect()->back()->with('error', 'This service list is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'order_id' => 'required|integer|gt:0',
        ]);

        $data = $request->except(['_token']);
        $data['slug'] = $this->services->getSlug($data['title']);
        $this->services->fill($data);
        $status = $this->services->save();
        if ($status) {
            return redirect()->route('service_list.index')->with('success', 'Service List updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating service list');
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
            return redirect()->back()->with('error', 'This service list is not found');
        }

        $del = $this->services->delete();
        if ($del) {
            return redirect()->route('service_list.index')->with('success', 'Service List deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting service list');
        }
    }
}
