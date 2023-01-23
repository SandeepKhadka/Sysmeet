<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactMessagesController extends Controller
{
    protected $messages;

    public function __construct(ContactMessage $messages)
    {
        $this->messages = $messages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages_data = $this->messages->orderBy('id', 'DESC')->get();
        return view('admin.contact.messages.index')->with('messages_data', $messages_data);
    }

    public function messagesStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('contact_messages')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('contact_messages')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.contact.messages.create');
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
            'email' => 'string|required',
            'phone' => 'string|nullable',
            'subject' => 'string|nullable',
            'messages' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->messages->fill($data);
        $status = $this->messages->save();
        // if ($status) {
        //     return redirect()->route('messages.index')->with('success', 'Contact added successfully');
        // } else {
        //     return redirect()->back()->with('error', 'There was problem in adding contact');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->messages = $this->messages->find($id);
        if (!$this->messages) {
            //message
            return redirect()->back()->with('error', 'This contact message is not found');
        }

        return view('admin.contact.messages.view')
            ->with('messages_data', $this->messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $this->messages = $this->messages->find($id);
        // if (!$this->messages) {
        //     //message
        //     return redirect()->back()->with('error', 'This contact is not found');
        // }

        // return view('admin.contact.messages.create')
        //     ->with('messages_data', $this->messages);
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
        // $this->messages = $this->messages->find($id);
        // if (!$this->messages) {
        //     return redirect()->back()->with('error', 'This contact is not found');
        // }

        // $this->validate($request, [
        //     'email' => 'string|required',
        //     'phone' => 'string|required',
        //     'location' => 'string|required',
        //     'why_messages' => 'string|required',
        // ]);

        // $data = $request->except(['_token']);
        // $this->messages->fill($data);
        // $status = $this->messages->save();
        // if ($status) {
        //     return redirect()->route('messages.index')->with('success', 'Contact updated successfully');
        // } else {
        //     return redirect()->back()->with('error', 'There was problem in updating contact');
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->messages = $this->messages->find($id);
        if (!$this->messages) {
            return redirect()->back()->with('error', 'This contact message is not found');
        }

        $del = $this->messages->delete();
        if ($del) {
            return redirect()->route('messages.index')->with('success', 'Contact message deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting contact message');
        }

    }
}
