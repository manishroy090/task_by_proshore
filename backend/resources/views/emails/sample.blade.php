<p>Hello Mr/Ms.{{$name}}</p>
<p>Follow this this link for Exam</p>
@php
use Illuminate\Support\Str;
$lastSegment = Str::afterLast($unique_url, '/');
@endphp
<a href="{{ route('email_link', ['code' => $lastSegment, 'questionnaireId' =>$questionnaireId]) }}">{{ $unique_url }}</a>