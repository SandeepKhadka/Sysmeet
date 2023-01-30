<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotesController extends Controller
{
    protected $quote;

    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quote_data = $this->quote->orderBy('id', 'DESC')->get();
        return view('admin.quote.index')->with('quote_data', $quote_data);
    }

    public function quoteStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('quotes')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('quotes')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.quote.create');
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
            'quote_by' => 'string|required',
            'quote' => 'string|required',
            'role' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->quote->fill($data);
        $status = $this->quote->save();
        if ($status) {
            return redirect()->route('quote.index')->with('success', 'Quote added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding quote');
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
        $this->quote = $this->quote->find($id);
        if (!$this->quote) {
            //message
            return redirect()->back()->with('error', 'This quote is not found');
        }

        return view('admin.quote.view')
            ->with('quote_data', $this->quote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->quote = $this->quote->find($id);
        if (!$this->quote) {
            //message
            return redirect()->back()->with('error', 'This banner is not found');
        }

        return view('admin.quote.create')
            ->with('quote_data', $this->quote);
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
        $this->quote = $this->quote->find($id);
        if (!$this->quote) {
            return redirect()->back()->with('error', 'This quote is not found');
        }

        $this->validate($request, [
            'quote_by' => 'string|required',
            'quote' => 'string|required',
            'role' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->quote->fill($data);
        $status = $this->quote->save();
        if ($status) {
            return redirect()->route('quote.index')->with('success', 'Quote updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating quote');
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
        $this->quote = $this->quote->find($id);
        if (!$this->quote) {
            return redirect()->back()->with('error', 'This quote is not found');
        }

        $del = $this->quote->delete();
        if ($del) {
            return redirect()->route('quote.index')->with('success', 'Quote deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting quote');
        }
    }
}