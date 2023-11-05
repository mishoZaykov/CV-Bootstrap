<?php

namespace App\Http\Controllers\API;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Cars;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;

class CarsController extends BaseController
{
    public function getAllCars(): JsonResponse {
        $getAllCars = Cars::select('id', 'brand', 'model', 'year')->get();

        if($getAllCars->isEmpty()) {
            return $this->sendResponseNoDataFound('No results were found.');
        }

        return $this->sendResponsData($getAllCars, 'List of all cars.');
    }

    public function getCarById($id): JsonResponse {
        $getCar = Cars::select('id','brand', 'model', 'year')->where('id', $id)->get();

        if($getCar->isEmpty()) {
            return $this->sendResponseNoDataFound('No results were found.');
        }

        return $this->sendResponsData($getCar, 'List of all cars.');
    }
    public function addCar(Request $request): JsonResponse {

        $newCar = new Cars;
        $newCar->user_id = $request->user_id;
        $newCar->brand = $request->brand;
        $newCar->model = $request->model;
        $newCar->year = $request->year;
        $newCar->save();

        if($newCar) {
            return $this->sendResponseMessage('Car added successfully.');
        }

        return $this->sendError('Something went wrong.');

    }
}
