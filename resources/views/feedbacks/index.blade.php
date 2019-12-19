@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2 class="mt-2">Student's Feedback</h2>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Course</th>
                <th>Feedback</th>
                <th>Vote</th>
                <!-- <th>Time</th> -->
                <th></th>
            </thead>

            <tbody>
                @auth
                @foreach($feedbacks as $feedback)
                <tr>
                    <td>
                        {{ $title = \App\Course::where(['id' => $feedback->course_id])->value('title')  }}
                    </td>
                    <td>
                        {{ $feedback->feedback }}
                    </td>
                    <td>
                        {{ $feedback->star }}
                    </td>
                    <!-- <td>
                        {{ $feedback->created_at }}
                    </td> -->
                    @auth
                    <!-- @if(!auth()->user()->isStudent())   -->
                    <td>
                        <a href="{{ route('courses.show', $feedback->course_id) }}" class="btn btn-success btn-sm">Enter Course</a>
                    </td>
                    <!-- @endif -->
                    @endauth
                </tr>
                @endforeach
                @endauth
            </tbody>
        </table>

        
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        var form = document.getElementById('deleteSubjectForm')
        form.action = '/lessons/' + id
        $('#deleteModal').modal('show')
    }
</script>
@endsection