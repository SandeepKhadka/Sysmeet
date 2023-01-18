<?php

namespace App\Http\Controllers;

use App\Models\OurPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurPartnerController extends Controller
{
    protected $our_partner;

    public function __construct(OurPartner $our_partner)
    {
        $this->our_partner = $our_partner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner_data = $this->our_partner->orderBy('id', 'DESC')->get();
        return view('admin.our_partner.index')->with('partner_data', $partner_data);
    }

    public function ourPartnerStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('our_partners')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('our_partners')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.our_partner.create');
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
            $file_name = uploadImage($image, 'our_partner', '125x125');
            if ($file_name) {
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->our_partner->fill($data);

        $status = $this->our_partner->save();
        if ($status) {
            return redirect()->route('our_partner.index')->with('success', 'Partner added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding partner');
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
        $this->our_partner = $this->our_partner->find($id);
        if (!$this->our_partner) {
            //message
            return redirect()->back()->with('error', 'This Partner is not found');
        }

        return view('admin.our_partner.view')
            ->with('partner_data', $this->our_partner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->our_partner = $this->our_partner->find($id);
        if (!$this->our_partner) {
            //message
            return redirect()->back()->with('error', 'This partner is not found');
        }

        return view('admin.our_partner.create')
            ->with('partner_data', $this->our_partner);
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
        $this->our_partner = $this->our_partner->find($id);
        if (!$this->our_partner) {
            return redirect()->back()->with('error', 'This partner is not found');
        }

        $this->validate($request, [
            'image' => 'image|nullable|max:5120',
        ]);

        $data = $request->except(['_token', 'image']);
        if ($request->has('image')) {
            $image = $request->image;
            $file_name = uploadImage($image, 'our_partner', '125x125');
            if ($file_name) {
                if ($this->our_partner->image != null && file_exists(public_path() . '/uploads/our_partner/' . $this->our_partner->image)) {
                    unlink(public_path() . '/uploads/our_partner/' . $this->our_partner->image);
                    unlink(public_path() . '/uploads/our_partner/Thumb-' . $this->our_partner->image);
                }
                $data['image'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $this->our_partner->fill($data);

        $status = $this->our_partner->save();
        if ($status) {
            return redirect()->route('our_partner.index')->with('success', 'Partner updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating partner');
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
        $this->our_partner = $this->our_partner->find($id);
        if (!$this->our_partner) {
            return redirect()->back()->with('error', 'This partner is not found');
        }

        $del = $this->our_partner->delete();
        $image = $this->our_partner->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/our_partner/' . $image)) {
                unlink(public_path() . '/uploads/our_partner/' . $image);
                unlink(public_path() . '/uploads/our_partner/Thumb-' . $image);
            }
            return redirect()->route('our_partner.index')->with('success', 'Partner deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting partner');
        }
    }
}
