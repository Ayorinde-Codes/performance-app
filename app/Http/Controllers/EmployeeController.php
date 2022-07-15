<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserSupervisor;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    public function index()
    {
        $export = '';

        $account = User::query();

        $employees = $account->paginate(200);

        $roles = Role::all(); 

        return view('employee', compact('employees', 'roles', 'export'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [

        ]);
        
    }

    public function show($id)
    {
        $employee = User::findorfail($id);

        if ($employee) {
            
            return view('employee', compact('employee'));
        }

        return redirect()->back()->with([
            'status' => 'danger',
            'message' => 'key result area not created'
        ]);
    }

    public function editEmployee(Request $request)
    {
        $this->validate($request, [
            'firstname'  =>  'required|min:6',
            'lastname'  =>  'required|min:6',
            'email'  =>  'required|email',
        ]);

        $employee = User::findorfail($request->employee_id);

        if(!$employee) {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'employee not found'
            ]);
        }

        $data = array_filter($request->only('firstname', 'lastname', 'email'));

        $employee->update($data);

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Successfully updated employee'
        ]);
    }
}