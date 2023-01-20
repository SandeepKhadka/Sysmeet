<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhyChooseUsController extends Controller
{
    protected $why_choose_us;

    public function __construct(WhyChooseUs $why_choose_us)
    {
        $this->why_choose_us = $why_choose_us;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $why_choose_us_data = $this->why_choose_us->orderBy('id', 'DESC')->get();
        return view('admin.about.why_choose_us.index')->with('why_choose_us_data', $why_choose_us_data);
    }

    public function whyChooseUsStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('why_choose_us')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('why_choose_us')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.about.why_choose_us.create');
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
            'image' => 'image|required|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'why_choose_us', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->why_choose_us->fill($data);

        $status = $this->why_choose_us->save();
        if ($status) {
            return redirect()->route('why_choose_us.index')->with('success', 'Why choose us detail added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding why choose us detail');
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
        $this->why_choose_us = $this->why_choose_us->find($id);
        if (!$this->why_choose_us) {
            //message
            return redirect()->back()->with('error', 'This why choose us detail is not found');
        }

        return view('admin.about.why_choose_us.view')
            ->with('why_choose_us_data', $this->why_choose_us);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->why_choose_us = $this->why_choose_us->find($id);
        if (!$this->why_choose_us) {
            //message
            return redirect()->back()->with('error', 'This why choose us detail is not found');
        }

        return view('admin.about.why_choose_us.create')
            ->with('why_choose_us_data', $this->why_choose_us);
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
        $this->why_choose_us = $this->why_choose_us->find($id);
        if (!$this->why_choose_us) {
            return redirect()->back()->with('error', 'This why choose us detail is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'image' => 'image|nullable|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'why_choose_us', '125x125');
            if ($file_name) {
                if ($this->why_choose_us->image != null && file_exists(public_path() . '/uploads/why_choose_us/' . $this->why_choose_us->image)) {
                    unlink(public_path() . '/uploads/why_choose_us/' . $this->why_choose_us->image);
                    unlink(public_path() . '/uploads/why_choose_us/Thumb-' . $this->why_choose_us->image);
                }
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }
        
        $this->why_choose_us->fill($data);

        $status = $this->why_choose_us->save();
        if ($status) {
            return redirect()->route('why_choose_us.index')->with('success', 'Why choose us detail updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating why choose us detail');
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
        $this->why_choose_us = $this->why_choose_us->find($id);
        if (!$this->why_choose_us) {
            return redirect()->back()->with('error', 'This why choose us detail is not found');
        }

        $del = $this->why_choose_us->delete();
        $image = $this->why_choose_us->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/why_choose_us/' . $image)) {
                unlink(public_path() . '/uploads/why_choose_us/' . $image);
                unlink(public_path() . '/uploads/why_choose_us/Thumb-' . $image);
            }
            return redirect()->route('why_choose_us.index')->with('success', 'Why choose us detail deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting why choose us detail');
        }
    }
}
