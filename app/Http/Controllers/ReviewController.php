<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {

        $rating = $request->get('rating');
        if(empty($rating)){
            $rating = 0.5;
        }

        $reviews = new review([
            'comments' => $request->get('comments'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'siteweb' => $request->get('siteweb'),
            'user_id' =>$request->get('user_id'),
        'produit_id' => $request->get('produit_id'),
            'rating' =>$rating,
        ]);
        // dd($reviews);
        $reviews ->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->back();
    }
}
