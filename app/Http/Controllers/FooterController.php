<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    protected $footer;

    public function __construct(Footer $footer)
    {
        $this->footer = $footer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer_data = $this->footer->orderBy('id', 'DESC')->get();
        return view('admin.footer.index')->with('footer_data', $footer_data);
    }

    public function footerStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('footers')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('footers')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.footer.create');
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
            'description' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->footer->fill($data);
        $status = $this->footer->save();
        if ($status) {
            return redirect()->route('footer.index')->with('success', 'Footer detail added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding footer detail');
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
        $this->footer = $this->footer->find($id);
        if (!$this->footer) {
            //message
            return redirect()->back()->with('error', 'This footer detail is not found');
        }

        return view('admin.footer.view')
            ->with('footer_data', $this->footer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->footer = $this->footer->find($id);
        if (!$this->footer) {
            //message
            return redirect()->back()->with('error', 'This footer detail is not found');
        }

        return view('admin.footer.create')
            ->with('footer_data', $this->footer);
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
        $this->footer = $this->footer->find($id);
        if (!$this->footer) {
            return redirect()->back()->with('error', 'This footer detail is not found');
        }

        $this->validate($request, [
            'description' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->footer->fill($data);
        $status = $this->footer->save();
        if ($status) {
            return redirect()->route('footer.index')->with('success', 'Footer detail updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating footer detail');
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
        $this->footer = $this->footer->find($id);
        if (!$this->footer) {
            return redirect()->back()->with('error', 'This footer detail is not found');
        }

        $del = $this->footer->delete();
        if ($del) {
            return redirect()->route('footer.index')->with('success', 'Footer detail deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting footer detail');
        }

    }
}
