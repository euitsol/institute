@extends('layouts.master')

@section('title', 'Students - European IT Solutions Institute')

@push('css')

@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Institute Students Report </h4>
                    </div>

                    <div class="card-body">

                        @if(session('success'))
                            <p class="alert alert-success text-center">
                                {{ session('success') }}
                            </p>
                        @elseif(session('error'))
                            <p class="alert alert-danger text-center">
                                {{ session('error') }}
                            </p>
                        @endif

                        <div class="clearfix mb-3">
                            <div class="float-left">
                                <button type="button" onclick="printT('print_content', '{{$institute->name}}')"
                                        class="btn btn-dark">
                                    <i class="fa fa-print"></i>
                                </button>
                            </div>
                            <div class="float-right">
                                <h4 class="font-weight-normal">
                                    @if ($students->count() > 0)
                                        <span class="text-success">{{$students->count()}}</span> Students found
                                    @else
                                        <span class="text-danger">{{$students->count()}}</span> Student found
                                    @endif
                                </h4>
                            </div>
                        </div>

                        <div id="print_content">
                            @if ($students->count() > 0)
                                <div style="margin-top: 40px">

                                    <div class="row mb-5">
                                        <div class="col-md-7">
                                            <img src="{{asset('images/EUITSols Institute New.png')}}" width="300"
                                                 alt="">
                                            <p class="mt-2">An EUITSols undertaking</p>
                                        </div>
                                        <div class="col-md-5">
                                            <h5>European IT Solutions Institute</h5>
                                            Noor Mansion (3rd Floor), Plot#04, Main Road#01, Mirpur-10, Dhaka-1216
                                        </div>
                                    </div>

                                    <h4 class="mb-4 text-center">{{$institute->name}}</h4>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Board Roll</th>
                                                <th>Phone</th>
                                                <th>Courses</th>
                                            </tr>
                                            @foreach ($students as $sk => $student)
                                                <tr>
                                                    <td>{{++$sk}}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->board_roll ?? '---'}}</td>
                                                    <td>{{$student->phone}}</td>
                                                    <td>
                                                        @if ($student->courses->count() > 0)
                                                            @foreach($student->courses as $ck => $course)
                                                                <span class="">({{++$ck}})</span>
                                                                <span class="mr-2">{{$course->title}}</span>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function printT(el, title = '') {
            var rp = document.body.innerHTML;
            var pc = document.getElementById(el).innerHTML;
            document.body.innerHTML = pc;
            document.title = title ? title : '';
            window.print();
            document.body.innerHTML = rp;
        }
    </script>
@endpush
