<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        function getRandomColor() {
            $letters = str_split('0123456789ABCDEF');
            $color = '#';
            for ($i = 0; $i < 6; $i++) {
                $color .= $letters[rand(0, 15)];
            }
            return $color;
        }
        if (isset($user)) {
            if ($user->isAdmin()) {
                $expenses = Expenses::query()
                        ->select('expense_category_id', DB::raw('SUM(amount) as total_amount'))
                        ->groupBy('expense_category_id')
                        ->get()->toArray();
            }else {
                $expenses = Expenses::query()
                        ->where('created_by_id', $user->id)
                        ->select('expense_category_id', DB::raw('SUM(amount) as total_amount'))
                        ->groupBy('expense_category_id')
                        ->get()->toArray();
            }




        $datas = [];
        $labels = [];


        foreach ($expenses as $key => $expense) {
            $expense_cat = ExpenseCategory::first()->where('id',$expense['expense_category_id'])->pluck('expense_category');

            if(isset($expense_cat[0])){
                array_push($labels, $expense_cat[0]);
            };

            if(isset($expense['total_amount'])){
                array_push($datas, $expense['total_amount']);
            };
        }

         // Generate random background colors
         $backgroundColor = [];
         foreach ($expenses as $item) {
             $backgroundColor[] = getRandomColor();
         }




        return view('home.index', compact('expenses','datas','labels','backgroundColor'));
        }
        return view('home.index');
    }
}
