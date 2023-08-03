<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; // for query builder

use App\Models\Video;
use App\Models\Course;

class VideoController extends Controller
{
    public function list()
    {
        $videos = DB::table('video')
            ->join('course', 'video.course_id', '=', 'course.id')
            ->where('video.uploader_id', $_SESSION['instructor']->id)
            ->select(
                'video.*',
                'course.title as course_title',
            )
            ->get();
        return view('instructor.pages.listvideos', compact('videos'));
    }

    public function create()
    {
        $courses = Course::where('instructor_id', $_SESSION['instructor']->id)
            ->orWhere('TA_id', $_SESSION['instructor']->id)->get();
        return view('instructor.pages.addvideo', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string',
            'file_path' => 'file|mimetypes:video/mp4',
        ], [
            'file_path.file' => 'يجب أن يكون الملف فيديو' . ' mp4 ',
            'file_path.mimetypes' => 'يجب أن يكون الملف فيديو من نوع' . ' mp4 '
        ]);

        $video = new Video();

        $video->title      = $request->title;
        $video->course_id  = $request->course_id;
        $video->video_type = $request->video_type;
        $video->uploader_id = $_SESSION['instructor']->id;

        $file_name = '__' . $video->title . time() . '__.' . $request->file_path->getClientOriginalExtension();
        $request->file_path->move(public_path('upload\video'), $file_name);
        $video->file_path  = $file_name;

        $video->save();

        return redirect()->back()->with('message', 'تم إضافة الفيديو بنجاح.');
    }

    public function destroy($id)
    {
        $video = Video::find($id);

        unlink(public_path('upload/video/' . $video->file_path));

        $video->delete();

        return redirect()->back()->with("message", "تم حذف الفيديو بنجاح");
    }
}
