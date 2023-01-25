<?php

namespace App\Http\Controllers;

use App\Models\SocialInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialInfoController extends Controller
{
    protected $social_info;

    public function __construct(SocialInfo $social_info)
    {
        $this->social_info = $social_info;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_info_data = $this->social_info->orderBy('id', 'DESC')->get();
        return view('admin.social_info.index')->with('social_info_data', $social_info_data);
    }

    public function socialInfoStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('social_infos')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('social_infos')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.social_info.create');
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
            'link' => 'url|required',
        ]);

        $order_id = $this->social_info->all();
        $data = $request->except(['_token']);
        $data['order_id'] = getOrderId($order_id);
        $this->social_info->fill($data);
        $status = $this->social_info->save();
        if ($status) {
            return redirect()->route('social_info.index')->with('success', 'Social Info link added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding social info link');
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
        $this->social_info = $this->social_info->find($id);
        if (!$this->social_info) {
            //message
            return redirect()->back()->with('error', 'This social info link is not found');
        }

        return view('admin.social_info.view')
            ->with('social_info_data', $this->social_info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->social_info = $this->social_info->find($id);
        if (!$this->social_info) {
            //message
            return redirect()->back()->with('error', 'This social info link is not found');
        }

        return view('admin.social_info.create')
            ->with('social_info_data', $this->social_info);
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
        $this->social_info = $this->social_info->find($id);
        if (!$this->social_info) {
            return redirect()->back()->with('error', 'This social info link is not found');
        }

        $this->validate($request, [
            'link' => 'url|required',
            'order_id' => 'required|integer|gt:0',
        ]);

        $data = $request->except(['_token']);
        $this->social_info->fill($data);
        $status = $this->social_info->save();
        if ($status) {
            return redirect()->route('social_info.index')->with('success', 'Social Info link added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating social info link');
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
        $this->social_info = $this->social_info->find($id);
        if (!$this->social_info) {
            return redirect()->back()->with('error', 'This social info link is not found');
        }

        $del = $this->social_info->delete();
        if ($del) {
            return redirect()->route('social_info.index')->with('success', 'Social Info link deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting social info link');
        }

    }
}
