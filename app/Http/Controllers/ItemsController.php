<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'status' => 'string|max:255|nullable',
            'name' => 'required|string|max:255',
            'customer_description' => 'string|max:255|nullable',
            'inside_description' => 'string|max:255|nullable',
            'date_of_return' => 'string|max:255|nullable',
            'company_id' => 'nullable|exists:companies,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $item = Items::create($request->all());
            return response()->json(['message' => 'Item created successfully', 'link' => route('items.one', $item->id)], 201);
        } else {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()]);
        }

    }

    public function show($id)
    {
        $item = Items::findOrFail($id);
        return response()->json($item);
    }

    public function index($page)
    {
        $items = Items::paginate(15, ['*'],'page',$page);
        return response()->json($items);
    }

    public function showAll()
    {
        $records = Items::all();
        return response()->json($records);
    }

    public function destroy($id)
    {
        $record = Items::findOrFail($id);
        $record->delete();
        return response()->json(['message' => 'Items deleted successfully']);
    }
}
