<?php
namespace App\Http\Controllers;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index() {
        return response()->json(Treatment::all());
    }
    public function store(Request $request) {
        $treatment = Treatment::create($request->all());
        return response()->json($treatment, 201);
    }
    public function show($id) {
        return response()->json(Treatment::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $treatment = Treatment::findOrFail($id);
        $treatment->update($request->all());
        return response()->json($treatment);
    }
    public function destroy($id) {
        Treatment::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
