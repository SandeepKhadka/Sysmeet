<?php

namespace App\Http\Controllers;

use App\Models\MainBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainBannerController extends Controller
{
    protected $main_banner;

    public function __construct(MainBanner $main_banner)
    {
        $this->main_banner = $main_banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner_data = $this->main_banner->orderBy('id', 'DESC')->get();
        return view('admin.main_banner.index')->with('banner_data', $banner_data);
    }

    public function bannerStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('main_banners')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('main_banners')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.main_banner.create');
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
            $file_name = uploadImage($image, 'main_banner', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->main_banner->fill($data);

        $status = $this->main_banner->save();
        if ($status) {
            return redirect()->route('main_banner.index')->with('success', 'Banner added successfully');
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
        $this->main_banner = $this->main_banner->find($id);
        if (!$this->main_banner) {
            //message
            return redirect()->back()->with('error', 'This banner is not found');
        }

        return view('admin.main_banner.view')
            ->with('banner_data', $this->main_banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->main_banner = $this->main_banner->find($id);
        if (!$this->main_banner) {
            //message
            return redirect()->back()->with('error', 'This banner is not found');
        }

        return view('admin.main_banner.create')
            ->with('banner_data', $this->main_banner);
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
        $this->main_banner = $this->main_banner->find($id);
        if (!$this->main_banner) {
            return redirect()->back()->with('error', 'This banner is not found');
        }

        $this->validate($request, [
            'image' => 'image|nullable|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'main_banner', '125x125');
            if ($file_name) {
                if ($this->main_banner->image != null && file_exists(public_path() . '/uploads/main_banner/' . $this->main_banner->image)) {
                    unlink(public_path() . '/uploads/main_banner/' . $this->main_banner->image);
                    unlink(public_path() . '/uploads/main_banner/Thumb-' . $this->main_banner->image);
                }
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->main_banner->fill($data);

        $status = $this->main_banner->save();
        if ($status) {
            return redirect()->route('main_banner.index')->with('success', 'Banner updated successfully');
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
        $this->main_banner = $this->main_banner->find($id);
        if (!$this->main_banner) {
            return redirect()->back()->with('error', 'This banner is not found');
        }

        $del = $this->main_banner->delete();
        $image = $this->main_banner->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/main_banner/' . $image)) {
                unlink(public_path() . '/uploads/main_banner/' . $image);
                unlink(public_path() . '/uploads/main_banner/Thumb-' . $image);
            }
            return redirect()->route('main_banner.index')->with('success', 'Banner deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting banner');
        }
    }
}
