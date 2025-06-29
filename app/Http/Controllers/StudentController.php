<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::select()
            ->orderby('created_at', 'DESC')
            ->paginate(15);
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $cities = City::all(); 
        return view('students.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string',
        'adress' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email|unique:students',
        'birth_date' => 'required|date',
        'city_id' => 'required|numeric'
    ],[], [
        'name' => trans('lang.name'),
        'adress' => trans('lang.adress'),
        'phone' => trans('lang.phone'),
        'email' => trans('lang.email'),
        'birth_date' => trans('lang.birth_date'),
        'city_id' => trans('lang.city')
        ]);

        $student=Student::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'city_id' => $request->city_id,
        ]);

    return redirect()->route('student.show', $student->id)->with('success', trans('lang.message_success_create_student'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {   
        
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {   
        $cities = City::all();
        return view('students.edit', ['student' => $student,'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
        'name' => 'required|string',
        'adress' => 'required|string',
        'phone' => 'required|string',
        'birth_date' => 'required|date',
        'city_id' => 'required|numeric'
    ]);

        $student->update([
            'name' => $request->name,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'city_id' => $request->city_id,
        ]);

        return redirect()->route('student.show', $student->id)->with('success', 'You just update a student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted.');
    }
}
