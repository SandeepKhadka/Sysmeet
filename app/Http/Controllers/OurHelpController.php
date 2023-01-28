<?php

namespace App\Http\Controllers;

use App\Models\OurHelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurHelpController extends Controller
{
    protected $our_help;

    public function __construct(OurHelp $our_help)
    {
        $this->our_help = $our_help;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_help_data = $this->our_help->orderBy('id', 'DESC')->get();
        return view('admin.our_service.our_help.index')->with('our_help_data', $our_help_data);
    }

    public function ourHelpStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('our_helps')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('our_helps')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.our_service.our_help.create');
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
            'desc' => 'string|required',
            'image' => 'image|required|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'our_help', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $data['slug'] = $this->our_help->getSlug($data['sub_title']);
        $order_id = $this->our_help->all();
        $data['order_id'] = getOrderId($order_id);

        $this->our_help->fill($data);

        $status = $this->our_help->save();
        if ($status) {
            return redirect()->route('service_our_help.index')->with('success', 'Our help service added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding our help service');
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
        $this->our_help = $this->our_help->find($id);
        if (!$this->our_help) {
            //message
            return redirect()->back()->with('error', 'This our help service is not found');
        }

        return view('admin.our_service.our_help.view')
            ->with('our_help_data', $this->our_help);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->our_help = $this->our_help->find($id);
        if (!$this->our_help) {
            //message
            return redirect()->back()->with('error', 'This our help service is not found');
        }

        return view('admin.our_service.our_help.create')
            ->with('our_help_data', $this->our_help);
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
        $this->our_help = $this->our_help->find($id);
        if (!$this->our_help) {
            return redirect()->back()->with('error', 'This our help service is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'sub_title' => 'string|required',
            'desc' => 'string|required',
            'image' => 'image|nullable|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'our_help', '125x125');
            if ($file_name) {
                if ($this->our_help->image != null && file_exists(public_path() . '/uploads/our_help/' . $this->our_help->image)) {
                    unlink(public_path() . '/uploads/our_help/' . $this->our_help->image);
                    unlink(public_path() . '/uploads/our_help/Thumb-' . $this->our_help->image);
                }
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $data['slug'] = $this->our_help->getSlug($data['sub_title']);

        $this->our_help->fill($data);

        $status = $this->our_help->save();
        if ($status) {
            return redirect()->route('service_our_help.index')->with('success', 'Our help service updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating our help service');
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
        $this->our_help = $this->our_help->find($id);
        if (!$this->our_help) {
            return redirect()->back()->with('error', 'This our help service is not found');
        }

        $del = $this->our_help->delete();
        $image = $this->our_help->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/our_help/' . $image)) {
                unlink(public_path() . '/uploads/our_help/' . $image);
                unlink(public_path() . '/uploads/our_help/Thumb-' . $image);
            }
            return redirect()->route('service_our_help.index')->with('success', 'Our help service deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting our help service');
        }
    }
}
