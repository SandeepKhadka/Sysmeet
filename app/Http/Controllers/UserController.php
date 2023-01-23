<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->user = $this->user->orderBy('id', 'DESC')->get();
        return view('admin.user.index')->with('user_data', $this->user);
    }

    public function userStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('users')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('users')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->user->getRules();
        $request->validate($rules);
        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'user', '125x125');
            if ($file_name) {
                $data['photo'] = $file_name;
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        $data['password'] = Hash::make($data['password']);
        $this->user->fill($data);
        $status = $this->user->save();
        if ($status) {
            return redirect()->route('user.index')->with('success', 'User added successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in adding user');
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
        $this->user = $this->user->find($id);
        if (!$this->user) {
            //message
            return redirect()->back()->with('error', 'This user is not found');
        }
        return view('admin.user.view')
            ->with('user_data', $this->user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->user = $this->user->find($id);
        if (!$this->user) {
            //message
            return redirect()->back()->with('error', 'This user is not found');
        }
        return view('admin.user.create')
            ->with('user_data', $this->user);
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
        $this->user = $this->user->find($id);
        if (!$this->user) {
            return redirect()->back()->with('error', 'This user is not found');
        }

        $rules = $this->user->getRules('update');
        $request->validate($rules);
        $data = $request->except(['_token', 'photo']);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $file_name = uploadImage($photo, 'user', '125x125');
            if ($file_name) {
                if ($this->user->photo != null && file_exists(public_path() . '/uploads/user/' . $this->user->photo)) {
                    unlink(public_path() . '/uploads/user/' . $this->user->photo);
                    unlink(public_path() . '/uploads/user/Thumb-' . $this->user->photo);
                }
                $data['photo'] = $file_name;
            } else {
                return redirect()->back()->with('error', 'There was error in uploading image');
            }
        }

        if ($data['password'] != $request->password) {

            $data['password'] = Hash::make($request->password);
        }

        $this->user->fill($data);

        $status = $this->user->save();
        if ($status) {
            return redirect()->route('user.index')->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('error', 'There was problem in updating user');
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
        $this->user = $this->user->find($id);
        if (!$this->user) {
            return redirect()->back()->with('error', 'This user is not found');
        }

        $del = $this->user->delete();
        $photo = $this->user->photo;
        if ($del) {
            if ($photo != null && file_exists(public_path() . '/uploads/user/' . $photo)) {
                unlink(public_path() . '/uploads/user/' . $photo);
                unlink(public_path() . '/uploads/user/Thumb-' . $photo);
            }
            return redirect()->route('user.index')->with('success', 'User deleted successfully');
        } else {
            //message
            return redirect()->back()->with('error', 'Sorry! there was problem in deleting user');
        }
    }
}
