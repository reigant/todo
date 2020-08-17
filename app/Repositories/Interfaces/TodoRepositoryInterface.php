<?php

namespace App\Repositories\Interfaces;

use App\todo;

interface TodoRepositoryInterface
{

    public function checkExistDate($date);

    public function getAll();

    public function getAllGroupByDate();

    public function getById($id);

    public function getAllByDate($date);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function deleteByDate($date);
}
