<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ExpenseCategory = ExpenseCategory::all();

        return view('expense_category.index', compact('ExpenseCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:expense_category,expense_category,'.$request->id,
            'description' => 'required|max:255',
        ]);


        if ($validator->fails()) {
            return response()->json([
                    'status'  => 404,
                    'message' => 'Category name already exists!',
            ]);
        }else{
            ExpenseCategory::insert([
                'expense_category' => $request->name,
                'expense_description' => $request->description,
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
    public function edit( $id)
    {

        $expenseCategory = ExpenseCategory::find($id);
        return response()->json($expenseCategory);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:expense_category,expense_category,'.$request->id,
            'description' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                    'status'  => 404,
                    'message' => 'Category name already exists!',
            ]);
        }else{

            DB::table('expense_category')->where('id', $request->id)->update([
                'expense_category' => $request->name,
                'expense_description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);


            return response()->json([
                'status'  => 200,
                'message' => 'Saved Successfully!',
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
