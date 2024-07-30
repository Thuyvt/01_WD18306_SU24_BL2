<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        $arr = [
            'status' => true,
            'message' => 'Lấy danh sách thành công',
            'data' => StudentResource::collection($students)
        ];

        return response()->json($arr, 200);

//         return StudentResource::collection($students); // return list collection

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        // validate
        $validator = Validator::make($request->all(), [
            'ten' => ['required', 'max:50'],
            'email' => ['required', 'email']
        ]);
        if ($validator->fails()) {
            $arr = [
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }

        $student = Student::query()->create([
            'name' => $request->ten,
            'it_id'=> $request->maNganh,
            'email'=> $request->email,
            'dob' => $request->ngaySinh,
        ]);

        return response()->json(new StudentResource($student), 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::query()->where('id', $id)->first();
//        return $student->toArray();
        if (!$student) {
            $arr = [
                'status' => false,
                'message' => 'Không tìm thấy sinh viên này',
//                'data' => []
            ];
        } else {
            $arr = [
                'status' => true,
                'message' => 'Chi tiết thông tin sinh viên',
                'data' => new StudentResource($student)
            ];
        }
        return response()->json($arr, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $student = Student::query()->where('id', $id)->first();
        // validate $request
        $validator = Validator::make($request->all(), [
            'ten' => ['required', 'max:50'],
            'email' => ['required', 'email']
        ]);
        if ($validator->fails()) {
            $arr = [
                'status' => false,
                'message' => 'Lỗi kiểm tra dữ liệu',
                'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
        }
        // update thông tin student
        // C1:
//        $student->name = $request->ten;
//        $student->it_id = $request->maNganh;
//        // ....
//        $student->save();
        // C2:
        $student->update([
            'name' => $request->ten,
            'it_id' => $request->maNganh,
            'email' => $request->email,
            'dob' => $request->ngaySinh,
        ]);
        $arr = [
            'status' => true,
            'message' => 'Cập nhật thông tin thành công',
            'data' => new StudentResource($student)
        ];
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::query()->where('id', $id)->first();
        if (!$student) {
            $arr = [
                'status' => false,
                'message' => 'Không tìm thấy sinh viên cần xóa',
            ];
        } else {
            $student->delete();
            $arr = [
                'status' => true,
                'message' => 'Xóa thành công',
            ];
        }
        return response()->json($arr, 200);
    }
}
