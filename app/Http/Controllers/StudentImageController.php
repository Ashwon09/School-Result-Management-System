<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class StudentImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(Student $student, StudentImage $image)
    {
        $this->student = $student;
        $this->image = $image;
    }


    public function index()
    {
        $student_images = $this->image::orderBy('created_at', 'asc')->get();
        return view('admin.studentimage.index', compact('student_images'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = $this->student::orderBy('created_at', 'asc')->get();
        return view('admin.studentimage.create', compact('students'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|unique:student_images',
            'student_image' => 'required|image',
        ], [
            'student_id.required' => 'Student Name is Required',
            'student_id.unique' => 'Student Name Should be Unique',

            'student_image.required' => 'Student Image is Required',
            'student_image.image' => 'Stuent Image must be Image'
        ]);
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $file = $request->file('student_image');
            $newImageName = time() . '_' . $file->getClientOriginalName();
            $dest = public_path('/images');
            $upload = $request->file('student_image')->move($dest, $newImageName);
            if ($upload) {
                $this->image::create([
                    'student_id' => $request->student_id,
                    'student_image' => $newImageName,
                ]);
                return response()->json(['code' => 1, 'msg' => 'Student Image Uploaded!!']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student_image = $this->image::find($id);
        $students = $this->student::orderBy('created_at', 'asc')->get();
        // dd($student_image);
        return view('admin.studentimage.edit', compact('student_image', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student_image = $this->image::find($id);
        $request->validate(
            [
                'student_id' => 'required',
                'student_image' => 'image',
            ],
            [
                'student_id.required' => 'Student Name is Required',
                'student_image.image' => 'Stuent Image must be Image'
            ]
        );
        $student_image->student_id = $request->student_id;
        if ($request->student_image != null) {
            $destination = public_path('images/' . $student_image->student_image);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('student_image');
            $newImageName = time() . '_' . $file->getClientOriginalName();
            $dest = public_path('/images');
            $request->file('student_image')->move($dest, $newImageName);
            $student_image->student_image = $newImageName;
        }
        $student_image->student_image = $student_image->student_image;
        $student_image->update();
        return redirect()->route('image.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_image = $this->image::find($id);

        $destination = public_path('images/' . $student_image->student_image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $student_image->delete();
        return redirect()->route('image.index');
    }
}
