@include('frontend.header')
<div class="showresult-container border">
    <div class="inner">
    <h1>Quiz Result</h1>
    <p>You Got <strong>{{$quiz->score}} </strong> out of 10.</p>
    <span>Questions Attempted: <strong>{{$quiz->question_attempted}}</strong></span>&nbsp;
    <a style="margin-left: 160px;color:rgb(18, 185, 236)" href="{{route('index')}}">Go to Home Page</a>
</div>
</div>
@include('frontend.footer')