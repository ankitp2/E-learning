@include('frontend.header')
<div class="showquiz-container">
    @session('success')
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endsession
@session('error')
    <div class="alert alert-error" id="error-alert">
        {{ session('error') }}
    </div>
@endsession
    <table class="table table-bordered">
        @php
            $count=1;
        @endphp
        <form action="{{route('quiz.result',['course_id'=>$quizzes[0]->course_id,"lesson_id"=>$quizzes[0]->lesson_id])}}" method="POST">
            @csrf
        @foreach ($quizzes as $quiz)
        <tr>
            <td>
                <p>{{$count++}}.{{$quiz->question}}</p>
                <input type="radio" value="{{$quiz->option1}}" name="answer[{{$quiz->id}}][]"> {{$quiz->option1}}<br>
                <input type="radio" value="{{$quiz->option2}}" name="answer[{{$quiz->id}}][]"> {{$quiz->option2}}<br>
                <input type="radio" value="{{$quiz->option3}}" name="answer[{{$quiz->id}}][]"> {{$quiz->option3}}<br>
                <input type="radio" value="{{$quiz->option4}}" name="answer[{{$quiz->id}}][]"> {{$quiz->option4}}
            </td>
        </tr>
        @endforeach
    </table>
    <input type="submit" class="btn btn-primary" value="Submit your answer">
</form>
</div>
@include('frontend.footer')
