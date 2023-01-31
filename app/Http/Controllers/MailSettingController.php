<?php

namespace App\Http\Controllers;

use App\Models\MailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailSettingController extends Controller
{
    protected $mail;

    public function __construct(MailSetting $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail_data = $this->mail->orderBy('id', 'DESC')->get();
        return view('admin.mail.index')->with('mail_data', $mail_data);
    }

    public function mailStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('mail_settings')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('mail_settings')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.mail.create');
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
            'mail_transport' => 'string|required',
            'mail_host' => 'string|required',
            'mail_port' => 'string|required',
            'mail_username' => 'string|required',
            'mail_password' => 'string|required',
            'mail_encryption' => 'string|required',
            'mail_from' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->mail->fill($data);
        $status = $this->mail->save();
        if ($status) {
            return redirect()->route('mail.index')->with('success', 'Mail detail added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding mail detail');
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
        $this->mail = $this->mail->find($id);
        if (!$this->mail) {
            //message
            return redirect()->back()->with('error', 'This mail detail is not found');
        }

        return view('admin.mail.view')
            ->with('mail_data', $this->mail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->mail = $this->mail->find($id);
        if (!$this->mail) {
            //message
            return redirect()->back()->with('error', 'This mail detail is not found');
        }

        return view('admin.mail.create')
            ->with('mail_data', $this->mail);
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
        $this->mail = $this->mail->find($id);
        if (!$this->mail) {
            return redirect()->back()->with('error', 'This mail detail is not found');
        }

        $this->validate($request, [
            'mail_transport' => 'string|required',
            'mail_host' => 'string|required',
            'mail_port' => 'string|required',
            'mail_username' => 'string|required',
            'mail_password' => 'string|required',
            'mail_encryption' => 'string|required',
            'mail_from' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->mail->fill($data);
        $status = $this->mail->save();
        if ($status) {
            return redirect()->route('mail.index')->with('success', 'Mail detail updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating mail detail');
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
        $this->mail = $this->mail->find($id);
        if (!$this->mail) {
            return redirect()->back()->with('error', 'This mail detail is not found');
        }

        $del = $this->mail->delete();
        if ($del) {
            return redirect()->route('mail.index')->with('success', 'Mail detail deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting mail detail');
        }
    }
}
