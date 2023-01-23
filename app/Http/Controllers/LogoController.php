<?php

namespace App\Http\Controllers;

use App\Models\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogoController extends Controller
{
    protected $logo;

    public function __construct(logo $logo)
    {
        $this->logo = $logo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo_data = $this->logo->orderBy('id', 'DESC')->get();
        return view('admin.logo.index')->with('logo_data', $logo_data);
    }

    public function logoStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('logos')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('logos')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.logo.create');
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
            'image' => 'image|required|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'logo', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->logo->fill($data);

        $status = $this->logo->save();
        if ($status) {
            return redirect()->route('logo.index')->with('success', 'Logo added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding logo');
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
        $this->logo = $this->logo->find($id);
        if (!$this->logo) {
            //message
            return redirect()->back()->with('error', 'This logo is not found');
        }

        return view('admin.logo.view')
            ->with('logo_data', $this->logo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->logo = $this->logo->find($id);
        if (!$this->logo) {
            //message
            return redirect()->back()->with('error', 'This logo is not found');
        }

        return view('admin.logo.create')
            ->with('logo_data', $this->logo);
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
        $this->logo = $this->logo->find($id);
        if (!$this->logo) {
            return redirect()->back()->with('error', 'This logo is not found');
        }

        $this->validate($request, [
            'image' => 'image|nullable|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'logo', '125x125');
            if ($file_name) {
                if ($this->logo->image != null && file_exists(public_path() . '/uploads/logo/' . $this->logo->image)) {
                    unlink(public_path() . '/uploads/logo/' . $this->logo->image);
                    unlink(public_path() . '/uploads/logo/Thumb-' . $this->logo->image);
                }
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->logo->fill($data);

        $status = $this->logo->save();
        if ($status) {
            return redirect()->route('logo.index')->with('success', 'Logo updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating logo');
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
        $this->logo = $this->logo->find($id);
        if (!$this->logo) {
            return redirect()->back()->with('error', 'This logo is not found');
        }

        $del = $this->logo->delete();
        $image = $this->logo->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/logo/' . $image)) {
                unlink(public_path() . '/uploads/logo/' . $image);
                unlink(public_path() . '/uploads/logo/Thumb-' . $image);
            }
            return redirect()->route('logo.index')->with('success', 'Logo deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting logo');
        }
    }
}
