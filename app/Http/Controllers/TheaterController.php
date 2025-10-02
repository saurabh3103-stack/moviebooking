<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class TheaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['theaters'] = Theater::with('manager')->get();
        return view('admin.theater.theater',$data);
    }
    public function addtheatres()
    {
        return view('admin.theater.addTheater');
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeTheater(Request $request)
    {
        $theater_id       = $request->id;
        $theaterName     = $request->name;
        $managerName     = $request->manager_name;
        $managerEmail    = $request->manager_email;
        $managerPassword = $request->manager_password;
        $status          = $request->status;
        if ($theater_id) {
            $theater = Theater::find($theater_id);
            if (!$theater) {
                return redirect()->back()->with('error', 'Theater not found!');
            }
            $theater->name = $theaterName;
            $theater->manager_name = $managerName;
            $theater->status = $status;
            $manager = User::find($theater->manager_id);
            if ($manager) {
                $manager->name = $managerName;
                $manager->email = $managerEmail;
                if ($managerPassword) {
                    $manager->password = Hash::make($managerPassword);
                }
                $manager->save();
            }
            $theater->save();
            return redirect('admin/theatres')->with('success', 'Theater updated successfully!');
        } else {
            $manager = new User();
            $manager->name = $managerName;
            $manager->email = $managerEmail;
            $manager->password = Hash::make($managerPassword);
            $manager->role = 'manager';
            $manager->save();
            $theater = new Theater();
            $theater->name = $theaterName;
            $theater->manager_name = $managerName;
            $theater->manager_id = $manager->id;
            $theater->status = $status;
            $theater->save();
            return redirect('admin/theatres')->with('success', 'Theater created successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Theater $theater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editTheater(Request $request)
    {
        $id = $request->id;
        $data['theater'] = Theater::with('manager')->find($id);
        return view('admin.theater.addTheater',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theater $theater)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theater $theater)
    {
        //
    }
}
