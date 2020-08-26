<?php

namespace App\Repositories\ManageFacility;

interface ManageFacilityInterface
{

    public function getAll();
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function findById($id);
    public function delete($id);
}
