<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    protected $about_us;

    public function __construct(AboutUs $about_us)
    {
        $this->about_us = $about_us;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us_data = $this->about_us->orderBy('id', 'DESC')->get();
        return view('admin.about.about_us.index')->with('about_us_data', $about_us_data);
    }

    public function aboutUsStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('about_us')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('about_us')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.about.about_us.create');
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
            'description' => 'string|required',
            'image' => 'image|required|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'about_us', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->about_us->fill($data);

        $status = $this->about_us->save();
        if ($status) {
            return redirect()->route('about_us.index')->with('success', 'About us added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding about us');
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
        $this->about_us = $this->about_us->find($id);
        if (!$this->about_us) {
            //message
            return redirect()->back()->with('error', 'This about us is not found');
        }

        return view('admin.about.about_us.view')
            ->with('about_us_data', $this->about_us);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->about_us = $this->about_us->find($id);
        if (!$this->about_us) {
            //message
            return redirect()->back()->with('error', 'This about us is not found');
        }

        return view('admin.about.about_us.create')
            ->with('about_us_data', $this->about_us);
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
        $this->about_us = $this->about_us->find($id);
        if (!$this->about_us) {
            return redirect()->back()->with('error', 'This about us is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'description' => 'string|required',
            'image' => 'image|nullable|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'about_us', '125x125');
            if ($file_name) {
                if ($this->about_us->image != null && file_exists(public_path() . '/uploads/about_us/' . $this->about_us->image)) {
                    unlink(public_path() . '/uploads/about_us/' . $this->about_us->image);
                    unlink(public_path() . '/uploads/about_us/Thumb-' . $this->about_us->image);
                }
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }
        
        $this->about_us->fill($data);

        $status = $this->about_us->save();
        if ($status) {
            return redirect()->route('about_us.index')->with('success', 'About us updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating about us');
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
        $this->about_us = $this->about_us->find($id);
        if (!$this->about_us) {
            return redirect()->back()->with('error', 'This about us is not found');
        }

        $del = $this->about_us->delete();
        $image = $this->about_us->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/about_us/' . $image)) {
                unlink(public_path() . '/uploads/about_us/' . $image);
                unlink(public_path() . '/uploads/about_us/Thumb-' . $image);
            }
            return redirect()->route('about_us.index')->with('success', 'About us deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting about us');
        }
    }
}
