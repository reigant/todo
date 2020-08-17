<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Repositories\Interfaces\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    private $todoRepo;

    public function __construct(TodoRepositoryInterface $todoRepo)
    {
        $this->todoRepo = $todoRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $args = [
            'todos' => $this->todoRepo->getAllGroupByDate()
        ];
        return view('todo.index', $args);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($date = '')
    {
        $todo = $this->todoRepo;
        return view('todo.create', compact('todo', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $this->todoRepo->create($request->validated());
        return redirect()->route('todo.showByDate', $request->do_at)
            ->with('success', 'Todo Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TodoRequest $request)
    {
        $todo = $this->todoRepo->getById($id);
        $date = $todo->do_at;
        $this->todoRepo->update($id, $request->validated());
        return redirect()->route('todo.showByDate', $date)
            ->with('success', 'Todo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = $this->validateId($id);
        $date = $todo->do_at;
        $this->todoRepo->delete($id);
        return redirect()->route('todo.showByDate', $date)
            ->with('success', 'Todo Deleted Successfully');
    }

    /**
     * Private method to validate id
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    private function validateId($id)
    {
        $todo = $this->todoRepo->getById($id);
        if (!$todo) {
            abort(404);
        }
        return $todo;
    }
}
