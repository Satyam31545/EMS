<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
#head{
    text-align: center;
    font-size: 40px;
    color: red;
}
#eduhead{
    text-align: center;
    font-size: 25px;
    color: red;
}
#edu_level{
    color: purple;
}
    </style>
</head>
<body>
    @php
        $arr=array("HS","SHS","UG","PG");
    @endphp
<div id="head">BIODATA</div>
 <p>name - {{$employe[0]->name}}</p>
 <p>email - {{$employe[0]->email}}</p>
 <p>salary - {{$employe[0]->salary}}</p>
 <p>desigination - {{$employe[0]->desigiation}}</p>
 <p>dob - {{$employe[0]->dob}}</p>
 <p>address - {{$employe[0]->address}}</p>
 <div id="eduhead">educational detail</div>

@foreach ($edus as $edu)
    <p id="edu_level">{{ $arr[$edu->edu_level]}}</p>
    @if ($edu->course_n !='')
        <p>course name -{{$edu->course_n}}</p>
    @endif
    @if ($edu->edu_level>1)
       <p> University - {{$edu->place}}</p>
        @else
      <p>  Board - {{$edu->place}}</p>
    @endif
    <p>Percentage - {{$edu->percent}}</p>
@endforeach


</body>
</html>