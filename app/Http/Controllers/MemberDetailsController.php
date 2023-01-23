<?php

namespace App\Http\Controllers;

use App\Models\MemberDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberDetailsController extends Controller
{
    protected $member_details;

    public function __construct(MemberDetails $member_details)
    {
        $this->member_details = $member_details;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_details_data = $this->member_details->orderBy('id', 'DESC')->get();
        return view('admin.our_team.member_details.index')->with('member_details_data', $member_details_data);
    }

    public function memberDetailsStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('member_details')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('member_details')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.our_team.member_details.create');
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
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'member_desc' => 'string|nullable',
            'role' => 'string|required',
            'experience' => 'string|nullable',
            'responsibility' => 'string|nullable',
            'phone' => 'string|required',
            'email' => 'string|required',
            'biography' => 'string|nullable',
            'prof_skill' => 'string|nullable',
            'photo' => 'image|required|max:5120',
            'facebook_link' => 'url|nullable',
            'twitter_link' => 'url|nullable',
            'pinterest_link' => 'url|nullable',
            'instagram_link' => 'url|nullable',
            'linked_in_link' => 'url|nullable',
        ]);

        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'member_details', '125x125');
            if ($file_name) {
                $data['photo'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading photo');
            }
        }

        $data['slug'] = $this->member_details->getSlug($data['first_name']);
        
        $this->member_details->fill($data);

        $status = $this->member_details->save();
        if ($status) {
            return redirect()->route('member_details.index')->with('success', 'Member details added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding member details');
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
        $this->member_details = $this->member_details->find($id);
        if (!$this->member_details) {
            //message
            return redirect()->back()->with('error', 'This member details is not found');
        }

        return view('admin.our_team.member_details.view')
            ->with('member_details', $this->member_details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->member_details = $this->member_details->find($id);
        if (!$this->member_details) {
            //message
            return redirect()->back()->with('error', 'This member details is not found');
        }

        return view('admin.our_team.member_details.create')
            ->with('member_details', $this->member_details);
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
        $this->member_details = $this->member_details->find($id);
        if (!$this->member_details) {
            return redirect()->back()->with('error', 'This member details is not found');
        }

        $this->validate($request, [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'member_desc' => 'string|nullable',
            'role' => 'string|required',
            'experience' => 'string|nullable',
            'responsibility' => 'string|nullable',
            'phone' => 'string|nullable',
            'email' => 'string|required',
            'biography' => 'string|nullable',
            'prof_skill' => 'string|nullable',
            'photo' => 'image|nullable|max:5120',
            'facebook_link' => 'url|nullable',
            'twitter_link' => 'url|nullable',
            'pinterest_link' => 'url|nullable',
            'instagram_link' => 'url|nullable',
            'linked_in_link' => 'url|nullable',
        ]);

        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'member_details', '125x125');
            if ($file_name) {
                if ($this->member_details->photo != null && file_exists(public_path() . '/uploads/member_details/' . $this->member_details->photo)) {
                    unlink(public_path() . '/uploads/member_details/' . $this->member_details->photo);
                    unlink(public_path() . '/uploads/member_details/Thumb-' . $this->member_details->photo);
                }
                $data['photo'] = $file_name;
                // dd($file_name);        
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }
        
        $data['slug'] = $this->member_details->getSlug($data['first_name']);

        $this->member_details->fill($data);

        $status = $this->member_details->save();
        if ($status) {
            return redirect()->route('member_details.index')->with('success', 'Member details updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating member details');
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
        $this->member_details = $this->member_details->find($id);
        if (!$this->member_details) {
            return redirect()->back()->with('error', 'This member details is not found');
        }

        $del = $this->member_details->delete();
        $image = $this->member_details->image;
        if ($del) {
            if ($image != null && file_exists(public_path() . '/uploads/member_details/' . $image)) {
                unlink(public_path() . '/uploads/member_details/' . $image);
                unlink(public_path() . '/uploads/member_details/Thumb-' . $image);
            }
            return redirect()->route('member_details.index')->with('success', 'Member details deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting member details');
        }
    }
}
