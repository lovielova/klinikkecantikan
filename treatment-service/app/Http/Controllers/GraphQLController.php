<?php
namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class GraphQLController extends Controller
{
    public function query(Request $request)
    {
        $query = $request->input('query');

        if (str_contains($query, 'treatments')) {
            $treatments = Treatment::all();
            return response()->json([
                'data' => [
                    'treatments' => $treatments
                ]
            ]);
        }

        return response()->json(['data' => null, 'errors' => [['message' => 'Unknown query']]]);
    }
}
