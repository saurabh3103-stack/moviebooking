<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingModel;
use App\Models\Transcation;


class CustomerController extends Controller
{
    public function tickeList(){
        $customer_id = Auth::id(); 
        $data['bookings'] = BookingModel::with(['movie', 'transaction'])->where('user_id', $customer_id)->get();
        return view('customer.ticketlist', $data);
    }
    public function showTranscation(){
        $customer_id = 2;
        $data['transaction'] =Transcation::with(['booking.movie'])
                ->where('user_id', $customer_id)
                ->get();
        return view('customer.transcation',$data);
    }
}
