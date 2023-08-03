@extends('student.layout.app')

@section('style')
    <style>
        /* Style the tab */
        .tab {
            width: fit-content;
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            margin: auto;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc !important;
            border-top: none;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        h3 {
            text-align: center;
            margin: 30px 0px;
        }

        p {
            width: 100%;
            text-align: center;
            font-size: 20px;
            color: black
        }

        .card-video {
            width: 33%;
        }

        video {
            width: 100%;
            height: 240px;
            border: 2px solid black;
            background-color: black
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-5" style="min-height: 82.2vh;">
        <h2 class="mt-5 mb-4 text-center">تشاهد الان مادة<span class="text-primary"> {{ $title }}
            </span></h1>
            <div class="tab">
                <button class="tablinks" onclick="openTabs(event, 'labs')">المعامل</button>
                <button class="tablinks" onclick="openTabs(event, 'sections')">السكاشن</button>
                <button class="tablinks active" onclick="openTabs(event, 'lectures')">المحاضرات</button>
            </div>

            <div id="labs" class="tabcontent border">
                <h3>المعامل</h3>
                <div class="row m-auto" style="width: 100%;" dir="rtl">
                    @forelse ($labVideos as $lab)
                        <div class="card-video m-1">
                            <video src="{{ asset('upload/video/' . $lab->file_path) }}" controls
                                onplay="stopOtherVideos(this, event)"></video>
                            <p>{{ $lab->title }}</p>
                        </div>
                    @empty
                        <p>لا توجد فيديوهات حتي الان</p>
                    @endforelse
                </div>
            </div>

            <div id="sections" class="tabcontent border">
                <h3>السكاشن</h3>
                <div class="row m-auto justify-content-between" style="width: 100%;" dir="rtl">
                    @forelse ($sectionVideos as $section)
                        <div class="card-video mb-1">
                            <video src="{{ asset('upload/video/' . $section->file_path) }}" controls
                                onplay="stopOtherVideos(this, event)"></video>
                            <p>{{ $section->title }}</p>
                        </div>
                    @empty
                        <p>لا توجد فيديوهات حتي الان</p>
                    @endforelse
                </div>
            </div>

            <div id="lectures" class="tabcontent border" style="display: block">
                <h3>المحاضرات</h3>
                <div class="row m-auto" style="width: 100%;" dir="rtl">
                    @forelse ($lectureVideos as $lecture)
                        <div class="card-video m-1">
                            <video src="{{ asset('upload/video/' . $lecture->file_path) }}" controls
                                onplay="stopOtherVideos(this, event)"></video>
                            <p>{{ $lecture->title }}</p>
                        </div>
                    @empty
                        <p>لا توجد فيديوهات حتي الان</p>
                    @endforelse
                </div>
            </div>
    </div>
@endsection

@section('script')
    <script>
        function openTabs(evt, videoTypes) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                let allVideos = tabcontent[i].querySelectorAll('video');

                for (let j = 0; j < allVideos.length; j++)
                    stopVideo(allVideos[j]);
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(videoTypes).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function stopOtherVideos(el, event) {
            let allVideos = el.parentElement.parentElement.querySelectorAll('video');
            for (let i = 0; i < allVideos.length; i++)
                if (allVideos[i] !== el)
                    stopVideo(allVideos[i]);
        }

        function stopVideo(video) {
            video.pause();
            video.currentTime = 0;
        }
    </script>
@endsection
