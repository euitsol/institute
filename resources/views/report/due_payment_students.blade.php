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
                        <h4> <span class="text-danger">Due</span> Report </h4>
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

                        <h5 class="mb-4">Course Type : <span class="font-weight-normal">{{$course_type}}</span></h5>

                        @if (count($students) > 0)
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th rowspan="2" class="align-middle">SL</th>
                                        <th rowspan="2" class="align-middle">Name</th>
                                        <th rowspan="2" class="align-middle">Phone</th>
                                        <th colspan="4" class="align-middle">Details</th>
                                    </tr>
                                    <tr>
                                        <th>Course</th>
                                        <th>Batch</th>
                                        <th>Due</th>
                                        <th>Paid</th>
                                    </tr>
                                    @php($total_paid = 0)
                                    @php($total_due = 0)
                                    @foreach ($students as $sk => $student)
                                        <tr>
                                            <td rowspan="{{$student->courses->count()}}" class="align-middle">{{ ++$sk }}</td>
                                            <td rowspan="{{$student->courses->count()}}"
                                                class="align-middle">{{ $student->name }}</td>
                                            <td rowspan="{{$student->courses->count()}}"
                                                class="align-middle">{{$student->phone}}</td>
                                            @foreach($student->courses as $course)
                                                @if ($course->due_status)
                                                    @if ($loop->first)

                                                        @php($total_paid += $course->paid_amount)
                                                        @php($total_due += $course->due_amount)

                                                        <td>{{$course->title}}</td>
                                                        <td>{{$course->batch}}</td>
                                                        <td>{{$course->due_amount}}</td>
                                                        <td>{{$course->paid_amount}}</td>
                                        </tr>
                                        @else

                                            @php($total_paid += $course->paid_amount)
                                            @php($total_due += $course->due_amount)

                                            <tr>
                                                <td>{{$course->title}}</td>
                                                <td>{{$course->batch}}</td>
                                                <td>{{$course->due_amount}}</td>
                                                <td>{{$course->paid_amount}}</td>
                                            </tr>
                                        @endif
                                        @endif
                                    @endforeach
                                    @endforeach
                                </table>

                                <p class="text-right">
                                    <b>Total Paid :</b> {{$total_paid}} <br>
                                    <b>Total Due :</b> {{$total_due}}
                                </p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
