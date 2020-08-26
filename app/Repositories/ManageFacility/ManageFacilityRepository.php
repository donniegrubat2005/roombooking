<?php

namespace App\Repositories\ManageFacility;

use App\Models\ManageFacility;

class ManageFacilityRepository implements ManageFacilityInterface
{
    protected $manageFacilityRepository;

    public function __construct(ManageFacility $manageFacility)
    {
        $this->manageFacilityRepository = $manageFacility;
    }

    public function getAll()
    {
        return $this->manageFacilityRepository->all();
    }


    public function create(array $attributes)
    {
        return $this->manageFacilityRepository->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->manageFacilityRepository->findOrFail($id)->update($attributes);
    }

    public function findById($id)
    {
        return $this->manageFacilityRepository->findOrFail($id);
    }


    public function delete($id)
    {
        return $this->manageFacilityRepository->destroy($id);
    }
}
