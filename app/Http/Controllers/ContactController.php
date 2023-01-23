<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    protected $contact_us;

    public function __construct(Contact $contact_us)
    {
        $this->contact_us = $contact_us;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_us_data = $this->contact_us->orderBy('id', 'DESC')->get();
        return view('admin.contact.contact_us.index')->with('contact_us_data', $contact_us_data);
    }

    public function contactUsStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('contacts')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('contacts')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.contact.contact_us.create');
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
            'email' => 'string|required',
            'phone' => 'string|required',
            'location' => 'string|required',
            'why_contact_us' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->contact_us->fill($data);
        $status = $this->contact_us->save();
        if ($status) {
            return redirect()->route('contact_us.index')->with('success', 'Contact added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding contact');
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
        $this->contact_us = $this->contact_us->find($id);
        if (!$this->contact_us) {
            //message
            return redirect()->back()->with('error', 'This contact is not found');
        }

        return view('admin.contact.contact_us.view')
            ->with('contact_us_data', $this->contact_us);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->contact_us = $this->contact_us->find($id);
        if (!$this->contact_us) {
            //message
            return redirect()->back()->with('error', 'This contact is not found');
        }

        return view('admin.contact.contact_us.create')
            ->with('contact_us_data', $this->contact_us);
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
        $this->contact_us = $this->contact_us->find($id);
        if (!$this->contact_us) {
            return redirect()->back()->with('error', 'This contact is not found');
        }

        $this->validate($request, [
            'email' => 'string|required',
            'phone' => 'string|required',
            'location' => 'string|required',
            'why_contact_us' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->contact_us->fill($data);
        $status = $this->contact_us->save();
        if ($status) {
            return redirect()->route('contact_us.index')->with('success', 'Contact updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating contact');
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
        $this->contact_us = $this->contact_us->find($id);
        if (!$this->contact_us) {
            return redirect()->back()->with('error', 'This contact is not found');
        }

        $del = $this->contact_us->delete();
        if ($del) {
            return redirect()->route('contact_us.index')->with('success', 'Contact deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting contact');
        }

    }
}
