<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table = 'dachboard';
        $messages = Message::all();
        return view('Backend.messages.index',compact('table','messages'));
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
        public function store(Request $request)
        {
            // Validate form data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'mes' => 'required',
            ]);
    
            // Create message
            Message::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->mes,
            ]);
    
            return redirect()->back()->with('success', 'Message sent successfully!');
        }
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = 'dachboard';
        $message = Message::findOrFail($id);
        
            $message->read_at = now();
            $message->save();
        return view('Backend.messages.show',compact('message','table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success','Message removed successfully');
    }
}
