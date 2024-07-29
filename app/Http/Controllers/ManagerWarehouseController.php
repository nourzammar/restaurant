<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Item;
use Illuminate\Support\Facades\Log;;

class ManagerWarehouseController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('dashboard.ManagerWarehous', ['items' => $items]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'quantity' => 'required|numeric',
            'type' => 'required|in:food,drink',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        try {
            $name = $request->input('name');
            $quantity = $request->input('quantity');
            $type = $request->input('type');
            $mines = $request->input('mines');

            $existingItem = Item::where('name', $name)->first();

            if ($existingItem) {
                if ($existingItem->type !== $type) {
                    return response()->json(['error' => 'error_type_mismatch'], 400);
                }

                $existingItem->quantity += $quantity;
                $existingItem->save();

                return response()->json(['message' => 'quantity_updated']);
            } else {
                $newItem = new Item();
                $newItem->name = $name;
                $newItem->quantity = $quantity;
                $newItem->type = $type;
                $newItem->mines = $mines;
                $newItem->save();

                return response()->json(['message' => 'new_item_added']);
            }
        } catch (\Exception $e) {
            Log::error('Error saving item: ' . $e->getMessage());
            return response()->json(['error' => 'unknown_error'], 500);
        }
    }
}
