<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseCategory = ExpenseCategory::all()->toArray();
        $user = auth()->user();

        if ($user->isAdmin()) {
            $expenses = Expenses::all()->toArray();
        }
        else{
            $expenses = Expenses::all()->where('created_by_id', auth()->user()->id)->toArray();
        }


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
            'exp_cat_id' => 'required',
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
                'expense_category_id' => $request->exp_cat_id,
                'created_by_id' => auth()->user()->id,
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
        $expenses = Expenses::find($id);
        return response()->json($expenses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'exp_cat_id'=> 'required',
            'amount' => 'required|min:1|integer',
            'entry_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                    'status'  => 404,
                    'message' => 'Please input valid data only!',
            ]);
        }else{

            DB::table('expenses')->where('id', $request->id)->update([
                'expense_category_id' => $request->exp_cat_id,
                'created_by_id' => auth()->user()->id,
                'amount' => $request->amount,
                'entry_date' => $request->entry_date,
                'updated_at' => Carbon::now(),
            ]);


            return response()->json([
                'status'  => 200,
                'message' => 'Updated Successfully!',
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $Expenses = Expenses::find($id);
        $Expenses->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ]);
    }
}
