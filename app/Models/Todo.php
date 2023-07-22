<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'todo'
    ];

    public function save(array $options = []): bool
    {
        if (!session()->has('todos')) {
            session()->put('todos', []);
        }

        session()->push('todos', $this->toJson());

        return true;
    }

    public static function deleteOne(int $index)
    {
        if (!session()->has('todos')) {
            session()->put('todos', []);
        }

        session()->pull("todos.$index");

        return true;
    }

    public static function loadFromSession()
    {
        return collect(session()->get('todos'))->map(function ($todo) {
            return json_decode($todo, false);
        })->reverse();
    }
}
