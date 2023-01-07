<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeRatingRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Return a listing of all employees.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // check if any employee exist
            $employeeExist = Employee::exists();
            if (! $employeeExist) {
            return $this->apiResponse(false, "No employee exist on the employee table, Add employee to view",  Response::HTTP_OK);
            };

            // return list of all added employees
            $employee = Employee::all();
            return $this->apiResponse(false, "Get all employee fetched successfully",  Response::HTTP_OK, $employee);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a new employee data in database.
     *
     * @param  \App\Http\Requests\EmployeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $data = $request->all();

            // insert employee data into database
            $addEmployee = Employee::create($data);
            
            return $this->apiResponse(false, "New Employee added successfully",  Response::HTTP_OK, $addEmployee);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            // check if employee with ID exist
            $employeeExist = Employee::where('id', $id)->exists();
            if (! $employeeExist) {
                return $this->apiResponse(false, "No employee with this ID exist on the employee table",  Response::HTTP_NOT_FOUND);
                };
            
            // find employee by id
            $employee = Employee::find($id);

            // delete specific employee
            $employee->delete();
            return $this->apiResponse(false, "Employee data deleted successfully",  Response::HTTP_OK, $employee);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Adding rating for specific employee by the employee ID.
     *
     * @param  \App\Http\Requests\EmployeeRatingRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rating(EmployeeRatingRequest $request, $id)
    {
        try {
            // check if employee with ID exist
            $employeeExist = Employee::where('id', $id)->exists();
            if (! $employeeExist) {
                return $this->apiResponse(false, "No employee with this ID exist on the employee table",  Response::HTTP_NOT_FOUND);
                };
            
            $data = $request->all();
            
            // find employee by id
            $employee = Employee::find($id);

            // insert employee data into database
            $addRating = $employee->update($data);
            
            return $this->apiResponse(false, "Employee rating added successfully",  Response::HTTP_OK, $employee);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

   
}
