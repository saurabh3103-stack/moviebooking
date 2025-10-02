<?php

namespace App\Http\Controllers;


use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\MovieCategory;
use App\Models\Theater;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingModel;
use App\Models\Transcation;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = MovieCategory::all();
        $moviesQuery = Movie::with(['category', 'theater']);
        if ($request->filled('category')) {
            $moviesQuery->where('category_id', $request->category);
        }
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $moviesQuery->whereBetween('date', [$request->from_date, $request->to_date]);
        } elseif ($request->filled('from_date')) {
            $moviesQuery->whereDate('date', '>=', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $moviesQuery->whereDate('date', '<=', $request->to_date);
        }
        $movies = $moviesQuery->get();
        return view('welcome', [
            'movies' => $movies,
            'categories' => $categories,
            'selectedCategory' => $request->category ?? '',
            'fromDate' => $request->from_date ?? '',
            'toDate' => $request->to_date ?? ''
        ]);
    }

    public function dashboard(){
           $user = Auth::user();
    $today  =  date("Y-m-d");
;

    if ($user->role == 'admin') {
        $todaysBookings = BookingModel::whereDate('show_date', $today)->count();
        $cancelled = BookingModel::where('status', 'cancelled')->count();
        $confirmed = BookingModel::where('status', 'confirmed')->count();
        $successTransactionsCount = Transcation::where('status', 'success')->count();
        $totalSuccessAmount = Transcation::where('status', 'success')->sum('amount');
         $data['dashboard'] = [
        'todaysBookings' => $todaysBookings,
        'cancelled' => $cancelled,
        'confirmed' => $confirmed,
        'successTransactions' => $successTransactionsCount,
        'totalSuccessAmount' => $totalSuccessAmount
    ];
                return view('dashboard',$data);


    } elseif ($user->role == 'manager') {
        $theaterIds = Theater::where('manager_id', $user->id)->pluck('id');
        $movieIds = Movie::whereIn('theater_id', $theaterIds)->pluck('id');

        $todaysBookings = BookingModel::whereIn('movie_id', $movieIds)
                            ->whereDate('show_date', $today)
                            ->count();

        $cancelled = BookingModel::whereIn('movie_id', $movieIds)
                            ->where('status', 'cancelled')
                            ->count();

        $confirmed = BookingModel::whereIn('movie_id', $movieIds)
                            ->where('status', 'confirmed')
                            ->count();

        $bookingIds = BookingModel::whereIn('movie_id', $movieIds)->pluck('id');
        $successTransactionsCount = Transcation::whereIn('booking_id', $bookingIds)
                                    ->where('status', 'success')
                                    ->count();

        $totalSuccessAmount = Transcation::whereIn('booking_id', $bookingIds)
                                ->where('status', 'success')
                                ->sum('amount');
                                 $data['dashboard'] = [
        'todaysBookings' => $todaysBookings,
        'cancelled' => $cancelled,
        'confirmed' => $confirmed,
        'successTransactions' => $successTransactionsCount,
        'totalSuccessAmount' => $totalSuccessAmount
    ];
                return view('dashboard',$data);

    } 
          
            return view('dashboard');
            
    }
}
