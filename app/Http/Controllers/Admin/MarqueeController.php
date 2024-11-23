<?php

namespace App\Http\Controllers\admin;

use App\Models\Marquee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarqueeController extends Controller
{
    public function index(){

        $text = Marquee::where('id' , 1)->select('text')->first()->text;

        return view('backEnd.marquee.marquee',['text'=>$text]);
    }
    public function update(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'text' => 'required|string|max:255', // Adjust the rules as needed
    ]);

    // Find the specific Marquee record by ID
    $marquee = Marquee::find(1);

    // Update the text field
    $marquee->update([
        'text' => $request->text,
        'updated_at' => Carbon::now(),
    ]);

    // Redirect with a success message
    return redirect()->route('marquee.index')->with('success', 'Marquee updated successfully!');
}

}
