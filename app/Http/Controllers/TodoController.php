<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Support\Str;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todo', [
            'todos' => Todo::loadFromSession(),
            'health_check_interval' => config('session.activity_pulse_time')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = new Todo([...$request->validated(), 'uuid' => Str::uuid()]);
        $todo->save();

        return view('todo', [
            'todos' => Todo::loadFromSession(),
            'health_check_interval' => config('session.activity_pulse_time')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $todos = Todo::loadFromSession();
        $todos->filter(function ($todo, $key) use ($uuid) {
            if ($todo->uuid === $uuid) {
                Todo::deleteOne($key);
                return true;
            }

            return false;
        });

        return view('todo', [
            'todos' => Todo::loadFromSession(),
            'health_check_interval' => config('session.activity_pulse_time')
        ]);
    }
}
