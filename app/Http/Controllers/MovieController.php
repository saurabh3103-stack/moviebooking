<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\MovieCategory;
use App\Models\Theater;
use App\Models\BookingModel;
use App\Models\Transcation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class MovieController extends Controller
{
    
    public function index()
    {       
        $user = Auth::user();
        if ($user->role == 'admin') {
        $data['movies']  = Movie::with(['category', 'theater'])
                    ->orderBy('created_at', 'desc')
                    ->get();
        } elseif ($user->role == 'manager') {
        $theater = Theater::where('manager_id', $user->id)->first();
        if (!$theater) {
            return back()->with('error', 'No theater assigned to this manager.');
        }
        $data['movies']  = Movie::where('theater_id', $theater->id)
                    ->with(['category', 'theater'])
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
        return view('admin.movies.movies',$data);
    }
    public function editmovie(Request $request)
    {
        $id=$request->id;
        $data['movie'] = Movie::find($id);
        $data['category'] = MovieCategory::all();
        $data['theater'] = Theater::all();
        return view('admin.movies.addMovie',$data);
    }

    public function create()
    {   $data['category'] = MovieCategory::all();
        $data['theater'] = Theater::all();
        return view('admin.movies.addMovie',$data);
    }
    
    public function store(Request $request)
    {  
        $title       = $request->title;
        $category_id = $request->category_id;
        $theater_id  = $request->theater_id;
        $date        = $request->date;
        $description = $request->description;
        $price      = $request->price;
        $total_seats = $request->total_seats;
        $status     = $request->status;
        if ($request->show_timings) {
            $show_timings = json_encode($request->show_timings);
        } else {
            $show_timings = null;
        }
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $filename);
            $image = 'upload/' . $filename;
        }else{
            $image =null;
        }
        if ($request->id) {
            $movie = Movie::find($request->id);   
            if ($movie) {
            $movie->title        = $request->title;
            $movie->category_id  = $request->category_id;
            $movie->theater_id   = $request->theater_id;
            $movie->date         = $request->date;
            $movie->description  = $request->description;
            $movie->price        = $request->price;
            $movie->total_seats  = $request->total_seats;
            $movie->status       = $request->status;
            $movie->show_timings = $show_timings;
            if ($image == null ) {
            }else{                $movie->image = $image;
            }
            $movie->save();
                return redirect('admin/movies')->with('success', 'Movie Updated');
            } else {
                return redirect('admin/movies')->with('error', 'Movie not found!');
            }
        } 
        else {
            $movie = new Movie();
            $movie->title        = $request->title;
            $movie->category_id  = $request->category_id;
            $movie->theater_id   = $request->theater_id;
            $movie->date         = $request->date;
            $movie->description  = $request->description;
            $movie->price        = $request->price;
            $movie->total_seats  = $request->total_seats;
            $movie->status       = $request->status;
            $movie->show_timings = $show_timings;
            if ($image) {
                $movie->image = $image;
            }
        $movie->save();
            return redirect('admin/movies')->with('success', 'Movie created successfully!');
        }
    }

    public function destroyMovie(Request $request)
    {
        $id = $request->id; 
        $movie = Movie::find($id);
        if ($movie) {
            $movie->delete();
            return redirect()->back()->with('success', 'Movie deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Movie not found!');
        }
    }
    public function movieDetails(Request $request){
        $id = $request->id;
        $data['movies']=Movie::find($id);
        if ($data['movies']) {
            return view('movieDetails',$data);
        } else {
            return redirect()->back()->with('error', 'Movie not found!');
        }
    }
    public function bookTicket(Request $request){
        $id = $request->id;
        $data['movies']=Movie::find($id);
        if ($data['movies']) {
            return view('bookTicket',$data);
        } else {
            return redirect()->back()->with('error', 'Movie not found!');
        }
    }
    public function bookConfirm(Request $request){
        $user_id = $request->user_id;
        $movie_id = $request->movie_id;
        $show_date = $request->show_date;
        $show_time = $request->show_time;
        $tickets = $request->tickets;
        $movie = Movie::find($movie_id);
        $ticketPrice = $movie->price;  
        $totalPrice = $ticketPrice * $tickets;
        $data['bookingdata'] = [
            'user_id'     => $user_id,
            'movie_id'    => $movie_id,
            'movie_name'  => $movie->title ,
            'show_date'   => $show_date,
            'show_time'   => $show_time,
            'tickets'     => $tickets,
            'ticket_price'=> $ticketPrice,
            'total_price' => $totalPrice,
            'expires_at'  => now()->addMinutes(10), 
        ];
        $bookingdata = $data['bookingdata'];
        Session::put('booking_preview', $bookingdata);
        return view('bookingPreview',$data);
    }
    public function ticketBook(Request $request){
        $user_id = $request->user_id;
        $movie_id = $request->movie_id;
        $show_date = $request->show_date;
        $show_time = $request->show_time;
        $tickets = $request->tickets;
        $movie = Movie::find($movie_id);
        $ticketPrice = $movie->price;  
        $totalPrice = $ticketPrice * $tickets;
        $booking = new BookingModel();
        $booking->movie_id     = $movie_id;
        $booking->user_id      = $user_id;
        $booking->show_date    = $show_date;
        $booking->show_time    = $show_time;
        $booking->tickets      = $tickets;
        $booking->ticket_price = $ticketPrice;
        $booking->total_price  = $totalPrice;
        $booking->status       = "pending";
        $booking->booking_date = now();
        if($booking->save()){
            $transaction = new Transcation();
            $transaction->booking_id      = $booking->id;
            $transaction->user_id         = $user_id;
            $transaction->order_id        = strtoupper("ORD" . uniqid()); 
            $transaction->transaction_id  = strtoupper("TXN" . uniqid()); 
            $transaction->amount          = $totalPrice;
            $transaction->status          = "success"; 
            $transaction->transaction_date = now();
            if($transaction->save()){
                $booking->status = "success";
                $booking->save();
                Session::forget('booking_preview');
                $movie = Movie::find($movie_id);
                $data['ticketdetails']=['booking' => $booking,'transaction' => $transaction,'movie' => $movie];
                    return redirect("/movie-ticket?id={$booking->id}");          
                    }
            else{
                Session::forget('booking_preview');
                return redirect('/');
            }
        }
        else{
                Session::forget('booking_preview');
            return redirect('/');
        }
    }   
    public function movieticekt(Request $request)
    {
        $bookingId = $request->id;
        $booking = BookingModel::with(['movie', 'transaction'])->find($bookingId);
        if (!$booking) {
            return redirect('movie-ticket')->with('error', 'Booking not found!');
        }
        $transaction = $booking->transaction; 
        $movie = $booking->movie; 
        return view('movieticket', [
            'booking' => $booking,
            'transaction' => $transaction,
            'movie' => $movie,
        ]);
    }
    public function allBooking()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $data['bookings'] = BookingModel::with(['movie', 'transaction'])
                            ->orderBy('created_at', 'desc')
                            ->get();
        } elseif ($user->role == 'manager') {
        $theaterid = Theater::where('manager_id', $user->id)->pluck('id');

        if ($theaterid->isEmpty()) {
            return back()->with('error', 'No theater assigned to this manager.');
        }
        $movieid = Movie::whereIn('theater_id', $theaterid)->pluck('id');

        // Step 3: Get bookings for those movies
        $data['bookings'] = BookingModel::whereIn('movie_id', $movieid)
                        ->orderBy('created_at', 'desc')
                        ->get();
        }
        return view('admin.movies.allbooking', $data);
    }
public function movieBooking()
{
    $today = date("Y-m-d");
    $movies = Movie::all();
    $report = [];
    foreach ($movies as $movie) {
        $showTimings = is_string($movie->show_timings) ? json_decode($movie->show_timings, true) : $movie->show_timings;
        if (!$showTimings) continue;
        foreach ($showTimings as $timing) {
            $totalSeats = $movie->total_seats;
            $bookedSeats = BookingModel::where('movie_id', $movie->id)
                ->whereDate('show_date', $today)
                ->where('show_time', $timing)    
                ->count();

            $report[] = [
                'movie_id' => $movie->id,
                'movie_title' => $movie->title,
                'timing' => $timing,
                'total_seats' => $totalSeats,
                'booked_seats' => $bookedSeats,
                'left_seats' => $totalSeats - $bookedSeats
            ];
        }
    }
    $bookings = BookingModel::whereDate('show_date', $today)->get();
    return view('admin.movies.movieBookingDetails', compact('report', 'bookings'));
}
}
