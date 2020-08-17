<?php

namespace App\Repositories;

use App\Model\Todo;
use App\Repositories\Interfaces\TodoRepositoryInterface;

class TodoRepository implements TodoRepositoryInterface
{

    public function checkExistDate($date)
    {
        return Todo::where('do_at', $date)->first();
    }

    public function getAll()
    {
        return Todo::all();
    }

    public function getAllGroupByDate()
    {
        return Todo::select([
                'do_at',
                \DB::raw('COUNT(id) as total')
            ])
            ->groupBy('do_at')
            ->orderBy('do_at', 'DESC')
            ->get();
    }

    public function getById($id)
    {
        return Todo::find($id);
    }

    public function getAllByDate($date)
    {
        return Todo::whereDoAt($date)->get();
    }

    public function create(array $data)
    {
        return Todo::create($data);
    }

    public function update($id, array $data)
    {
        return Todo::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return Todo::find($id)->delete();
    }

    public function deleteByDate($date)
    {
        return Todo::where('do_at', $date)->delete();
    }
}
