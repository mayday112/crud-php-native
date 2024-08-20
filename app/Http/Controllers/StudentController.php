<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::latest()->get();

        return view('home', ['title' => 'Siswa' ,'students' => $students, 'no' => 1]);
    }

    public function create() {
        return view('add',['title' => 'Tambah Data Siswa']);
    }

    public function store(Request $request) {
        $request->validate([
            'nisn' => 'required|numeric|max_digits:10',
            'nama_lengkap' => 'required|string|max:50',
            'alamat' => 'required'
        ]);

        $data = $request->all();

        Student::create($data);

        return redirect()->route('student.index');
    }

    // public function show($id) {
    //     return redirect()->back();

    // }
    public function edit(Student $student) {
        return view('edit', ['title' => 'Edit Data Siswa', 'student' => $student]);
    }

    public function update(Request $request, Student $student) {
        $request->validate([
            'nisn' => 'required|numeric|max_digits:10',
            'nama_lengkap' => 'required|string|max:50',
            'alamat' => 'required'
        ]);

        $data = $request->all();

        $student->update($data);

        return redirect()->route('student.index');
    }

    public function destroy(Student $student) {
        $student->delete();
        return redirect()->route('student.index');
    }
}
