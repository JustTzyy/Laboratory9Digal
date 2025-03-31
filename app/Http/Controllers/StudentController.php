<?php

namespace App\Http\Controllers;
use App\Http\Requests\studentrequest;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student() 
    {

        $users = Student::all();

        return view('student', ['users' => $users]);

    }

    public function store(studentrequest $request)
    {

        try {
        //add Student
        $user = Student::create([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');

        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }

    }


}
