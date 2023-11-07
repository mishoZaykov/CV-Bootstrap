<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a list of cars in the dashboard.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cars = Car::with('user')->orderBy('id', 'desc')->paginate(10);

        return view('cars.dashboard', ['cars' => $cars,]);
    }

    /**
     * Display the car creatino form.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a new car record in the database.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateCarRequest($request);

        $car = new Car($request->only('make', 'model', 'year'));
        $car->user()->associate(auth()->user());
        $car->save();

        return redirect()->route('admin.car.index')->with('success', 'Car created successfully');
    }

    /**
     * Display the form for editing a car.
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $car = Car::find($id);

        return view('cars.edit', [ 'car' => $car ]);
    }

    /**
     * Update an existing car record in the database.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
    {

        $this->validateCarRequest($request);

        $car = Car::find($id);
        $car->fill($request->only('make', 'model', 'year'));
        $car->save();

        return redirect()->route('admin.car.index')->with('success', 'Car was updated successfully');
    }

    /**
     * Delete a record from the database.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect()->route('admin.car.index')->with('success', 'Car was deleted successfully');
    }

    /**
     * Validate the car request data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateCarRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

}
