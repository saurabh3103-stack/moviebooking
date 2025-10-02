<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transcation;
use App\Models\Theater;
use Illuminate\Support\Facades\Auth;

class TranscationController extends Controller
{
    public function transactionsRecord(){
        $user = Auth::user();
        if ($user->role == 'admin') {
            $data['transaction']  = Transcation::with(['booking.movie'])->orderBy('created_at', 'desc')->get();
        } elseif ($user->role == 'manager') {
            $theater = Theater::where('manager_id', $user->id)->first();
        if (!$theater) {
            return back()->with('error', 'No theater assigned to this manager.');
        }
        $data['transaction'] = Transcation::whereHas('booking.movie', function ($q) use ($theater) {
            $q->where('theater_id', $theater->id);})->with(['booking.movie.theater'])
          ->orderBy('created_at', 'desc')
          ->get();
        } else {
            abort(403, 'Unauthorized access.');
        }
        return view('admin.transcation.transcation',$data);

    }
    
}
