<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'reputation' => 'string|max:255|in:excellent,good,average,poor',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $item = Companies::create($request->all());
            return response()->json(['message' => 'Company created successfully', 'link' => route('companies.one', $item->id)], 201);
        } else {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()]);
        }
    }

    public function show($id)
    {
        $record = Companies::findOrFail($id);
        return response()->json($record);
    }

    public function index($page)
    {
        $companies = Companies::paginate(15, ['*'],'page',$page);
        return response()->json($companies);
    }

    public function items($id)
    {
        $company = Companies::findOrFail($id);
        $items = $company->items();
        return response()->json($items);
    }

    public function destroy($id)
    {
        $record = Companies::findOrFail($id);
        $record->delete();
        return response()->json(['message' => 'Companies deleted successfully']);
    }
}
