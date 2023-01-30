<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
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
        if (!auth()->user()) {
            return redirect('/login');
        }
        return view('admin.user.adminDetail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('front.user.adminDetail')
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
        // dd($request->newPassword);
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
            }
        }

        if (isset($request->oldPassword) && $request->oldPassword != null) {
            if (!password_verify($request->oldPassword, $data['password'])) {
                return redirect()->back()->with('error', 'Your old password did not match.');
            }
        }

        if (isset($request->newPassword) && $request->newPassword != null) {
            if (isset($request->retypeNewPassword) && $request->retypeNewPassword != null) {
                if ($request->newPassword == $request->retypeNewPassword) {
                    $data['password'] = Hash::make($request->newPassword);
                } else {
                    return redirect()->route('adminProfile.index')->with('error', 'Password did not match.');
                }
            }
        }

        $this->user->fill($data);

        $status = $this->user->save();
        if ($status) {
            return redirect()->route('adminProfile.index')->with('success', 'Details updated successfully.');
        } else {
            return redirect()->route('adminProfile.index')->with('error', 'Sorry! There was problem in updating details.');
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
        //
    }
}
