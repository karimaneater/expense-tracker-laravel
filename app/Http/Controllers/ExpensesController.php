<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseCategory = ExpenseCategory::all()->toArray();
        $expenses = Expenses::all()->toArray();

        return view('expenses.index', compact('expenseCategory','expenses'));
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
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'amount' => 'required|min:1',
            'entry_date' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                    'status'  => 404,
                    'message' => 'Please input all fields!',
            ]);
        }else{
            Expenses::insert([
                'expense_category_id' => $request->id,
                'amount' => $request->amount,
                'entry_date' => $request->entry_date,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]);

            return response()->json([
                    'status'  => 200,
                    'message' => 'Saved Successfully!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
