@extends('layout.main')

@push('title')
    <title>EMS | Create</title>
    <style>
        #login_box,#persional,#educational,#experience,#family {
display:grid;
        }
        #detail{
            padding-left: 25px;


        }
        #allhead{
text-align: center;
font-size: 30px;
color: red;
        }
    </style>
@endpush
@section('main-section')
@php
     $arr=array("HS","SHS","UG","PG");
     $arr2=array("NO","YES");
     $family=array("mother","father","sister","brother","whif/husbend","son","daughter");
@endphp
    <div id="detail">
    <div id="persional">
        <div id="allhead">Persional</div>
        <p>id - {{$employe[0]->id}}</p>
        <p>name - {{$employe[0]->name}}</p>
        <p>email -  {{$employe[0]->email}}</p>
        <p>salary -  {{$employe[0]->salary}}</p>
        <p>desigination -  {{$employe[0]->desigination}}</p>
        <p>dob -  {{$employe[0]->dob}}</p>
        <p>address -  {{$employe[0]->address}}</p>
    </div>

    <div id="educational">
        <div id="allhead">educational</div>
@php
$i =1;
    foreach ($edus as $edu){
        $i +=1;
         $edudi = '<div id="edudiv">
        <p>educational level - '. $arr[$edu->edu_level] .'</p>
        <p>course - '. $edu->course_n .'</p>
        <p>board or university-'. $edu->place .'</p>
        <p>Percentag - '. $edu->percent .'</p>
        <hr>
        </div>';
        echo $edudi;
    } 
    if ($i==1) {
        echo "No educational data found";
    }
@endphp
    </div>
    <div id="experience">
        <div id="allhead">experience</div>
        @php
$i =1;
    foreach ($exps as $exp){
        $i +=1;
         $expui = '<div id="expdiv">
        <p>Company name - '. $exp->company .'</p>
        <p>Desigination - '. $exp->desigiation .'</p>
        <p>Last salary-'. $exp->last_salary .'</p>
        <p>Experience (in months) - '. $exp->experience .'</p>
        <hr>
        </div>';
        echo $expui;
    } 
    if ($i==1) {
        echo "No educational data found";
    }
@endphp 
    </div>
    <div id="family">
        <div id="allhead">family</div>
        @php
        $i =1;
            foreach ($fams as $fam){
                $i +=1;
                 $famui = '<div id="expdiv">
                <p>Name - '. $fam->name .'</p>
                <p>Relation - '. $family[$fam->relation] .'</p>
                <p>Age-'. $fam->age .'</p>
                <p>Employeed - '. $arr2[$fam->employeed] .'</p>
                <hr>
                </div>';
                echo $famui;
            } 
            if ($i==1) {
                echo "No educational data found";
            }
        @endphp 
        </div>
    </div>
        
    </div>
    <script src="jquary.js">
        </script> 

    <script>
    </script>
@endsection
