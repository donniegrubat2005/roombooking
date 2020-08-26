<?php

namespace App\Http\Controllers\ManageFacility;

use App\Http\Controllers\Controller;
use App\Repositories\ManageFacility\ManageFacilityInterface;
use Illuminate\Http\Request;

class ManageFacilityController extends Controller
{

    protected $manageFacilityRepo;

    public function __construct(ManageFacilityInterface $manageFacility)
    {
        $this->manageFacilityRepo = $manageFacility;
    }

    public function index()
    {
        return $this->manageFacilityRepo->getAll();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->manageFacilityRepo->create($request->all());
        return response()->json('successfully added!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->manageFacilityRepo->findById($id);
    }


    public function update(Request $request, $id)
    {
        $this->manageFacilityRepo->update($id, $request->all());

        return response()->json('successfully updated');
    }


    public function destroy($id)
    {
        $this->manageFacilityRepo->delete($id);

        return response()->json('successfully deleted');
    }
}
