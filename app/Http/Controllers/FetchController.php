<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\TicketPurchaseHistory;

class FetchController extends Controller
{
    //fetch the list of persons
    public function fetchPersons()
    {
        $person = Person::all();
        return response()->json([
            'message' => 'Persons retrieved successfully',
            'data' => $person,
        ], 200);
    }

    //fetch the ticket_purchase_history for a given person
    public function fetchTicket($id)
    {
        $ticket_history = TicketPurchaseHistory::where('purchased_by_id', $id)->first();
        if (is_null($ticket_history)) {
            return response()->json([
                'message' => 'Ticket purchase history not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Ticket purchase history retrieved successfully',
            'data' => $ticket_history,
        ], 200);
    }
}
