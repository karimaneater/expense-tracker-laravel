<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExpenseCategory extends Model
{
    use HasFactory;

    public $table = "expense_category";

    protected $fillable = [
        'expense_category',
        'expense_description',
    ];

    public function expenses(): HasMany
    {
        return $this->hasMany(Expenses::class, 'expense_category_id');
    }
}
