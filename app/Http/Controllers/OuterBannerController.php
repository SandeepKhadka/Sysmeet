<?php

namespace App\Http\Controllers;

use App\Models\OuterBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OuterBannerController extends Controller
{
    protected $outer_banner;

    public function __construct(OuterBanner $outer_banner)
    {
        $this->outer_banner = $outer_banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner_data = $this->outer_banner->orderBy('id', 'DESC')->get();
        return view('admin.outer_banner.index')->with('banner_data', $banner_data);
    }

    public function bannerStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('outer_banners')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('outer_banners')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.outer_banner.create');
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
            $file_name = uploadImage($image, 'outer_banner', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->outer_banner->fill($data);

        $status = $this->outer_banner->save();
        if ($status) {
            return redirect()->route('outer_banner.index')->with('success', 'Banner added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding banner');
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
        $this->outer_banner = $this->outer_banner->find($id);
        if (!$this->outer_banner) {
            //message
            return redirect()->back()->with('error', 'This banner is not found');
        }

        return view('admin.outer_banner.view')
            ->with('banner_data', $this->outer_banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->outer_banner = $this->outer_banner->find($id);
        if (!$this->outer_banner) {
            //message
            return redirect()->back()->with('error', 'This banner is not found');
        }

        return view('admin.outer_banner.create')
            ->with('banner_data', $this->outer_banner);
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
        $this->outer_banner = $this->outer_banner->find($id);
        if (!$this->outer_banner) {
            return redirect()->back()->with('error', 'This banner is not found');
        }

        $this->validate($request, [
            'title' => 'string|required',
            'image' => 'image|nullable|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'outer_banner', '125x125');
            if ($file_name) {
                if ($this->outer_banner->image != null && file_exists(public_path() . '/uploads/outer_banner/' . $this->outer_banner->image)) {
                    unlink(public_path() . '/uploads/outer_banner/' . $this->outer_banner->image);
                    unlink(public_path() . '/uploads/outer_banner/Thumb-' . $this->outer_banner->image);
                }
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->outer_banner->fill($data);

        $status = $this->outer_banner->save();
        if ($status) {
            return redirect()->route('outer_banner.index')->with('success', 'Banner updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating banner');
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
        $this->outer_banner = $this->outer_banner->find($id);
        if (!$this->outer_banner) {
            return redirect()->back()->with('error', 'This banner is not found');
        }

        $del = $this->outer_banner->delete();
        $image = $this->outer_banner->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/outer_banner/' . $image)) {
                unlink(public_path() . '/uploads/outer_banner/' . $image);
                unlink(public_path() . '/uploads/outer_banner/Thumb-' . $image);
            }
            return redirect()->route('outer_banner.index')->with('success', 'Banner deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting banner');
        }
    }
}
