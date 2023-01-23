<?php

namespace App\Http\Controllers;

use App\Models\TeamMotto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMottoController extends Controller
{
    protected $team_motto;

    public function __construct(TeamMotto $team_motto)
    {
        $this->team_motto = $team_motto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team_motto_data = $this->team_motto->orderBy('id', 'DESC')->get();
        return view('admin.our_team.team_motto.index')->with('team_motto_data', $team_motto_data);
    }

    public function teamMottoStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('team_mottoes')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('team_mottoes')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.our_team.team_motto.create');
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
            'team_motto' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->team_motto->fill($data);
        $status = $this->team_motto->save();
        if ($status) {
            return redirect()->route('team_motto.index')->with('success', 'Team Detail added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding team details');
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
        $this->team_motto = $this->team_motto->find($id);
        if (!$this->team_motto) {
            //message
            return redirect()->back()->with('error', 'This team details is not found');
        }

        return view('admin.our_team.team_motto.view')
            ->with('team_motto_data', $this->team_motto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->team_motto = $this->team_motto->find($id);
        if (!$this->team_motto) {
            //message
            return redirect()->back()->with('error', 'This team details is not found');
        }

        return view('admin.our_team.team_motto.create')
            ->with('team_motto_data', $this->team_motto);
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
        $this->team_motto = $this->team_motto->find($id);
        if (!$this->team_motto) {
            return redirect()->back()->with('error', 'This team details is not found');
        }

        $this->validate($request, [
            'team_motto' => 'string|required',
        ]);

        $data = $request->except(['_token']);
        $this->team_motto->fill($data);
        $status = $this->team_motto->save();
        if ($status) {
            return redirect()->route('team_motto.index')->with('success', 'Team Detail updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating team details');
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
        $this->team_motto = $this->team_motto->find($id);
        if (!$this->team_motto) {
            return redirect()->back()->with('error', 'This team details is not found');
        }

        $del = $this->team_motto->delete();
        if ($del) {
            return redirect()->route('team_motto.index')->with('success', 'Team Detail deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting team details');
        }

    }
}
