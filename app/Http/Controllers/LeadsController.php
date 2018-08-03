<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Lead;
use App\Phone;

class LeadsController extends Controller
{

    public function index() {
        $leads = DB::table('leads')
            ->select('leads.lead_id', 'leads.fname', 'leads.lname', 'leads.email', 'leads.postal_code', 'phones.phone_number')
            ->join('phones', 'leads.lead_id', '=', 'phones.lead_id')
            ->get();

        return view('leads.index', compact('leads'));
    }

    public function create() {
        return view('leads.create');
    }

    public function store(Request $request) {
        $this->validate(
            request(), [
                'fname' => 'required|alpha',
                'lname' => 'required|alpha',
                'email' => 'required|email',
                'phone' => 'required',
                'postal' => 'required|alpha_num'
            ]
        );

        // Create a new lead with the request data
        $lead = new Lead;
        $phone = new Phone;

        // Create a new lead using the request data
        $leads = ([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'postal_code' => $request->input('postal')
        ]);


        Phone::create([
            'lead_id' => Lead::create($leads)->id,
            'phone_number' => $request->input('phone')
        ]);

        // Redirect to home page
        return view('/');
    }

    public function destroy(Request $request) {
        $this->validate(request(), ['lead_id']);
        DB::table('leads')->where('lead_id', '=', $request->input('lead_id'))->delete();

        return back();
    }
}
