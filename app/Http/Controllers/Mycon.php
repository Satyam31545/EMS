<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Session;

use App\Models\employee;
use App\Models\emp_fam;
use App\Models\emp_edu;
use App\Models\emp_exp;

use Barryvdh\DomPDF\Facade\Pdf;

use Excel;
use App\Exports\EmpExport;
use App\Imports\EmpImport;

class Mycon extends Controller
{
   public function login(){
      return  view('login');
     } 


     public function login_p(request $req){
      // validator
         $val =  Validator::make($req->all(),[
              'email'=> 'required|email',
              'password'=> 'required'
      ],
      $messages= [
          'required'=> 'The field must be filled.'
      ])->validate();
  
      // validator
  
//       $users = DB::table('myusers')->where('email', $req['email'])->where('password', $req['password'])->get();
//   if( $users->count() != 0){
   $users=employee::where('email', $req['email'])->where('password',$req['password'])->get();
  
  
   if( $users->count() != 0){
     Session::put('role', $users[0]->role);
         Session::put('id', $users[0]->id);


     return 1;
   }else{
   return 0; 
  }
   
       } 
       public function logout(){
         session()->flush();
         return redirect('/');
        } 


    public function create(){
        return  view('create');
       } 
    public function create_p(request $req){
       

            // validator
            $val =  Validator::make($req->all(),[
                'name'=> 'required',
                'email'=> 'required|email',
                'password'=> 'required',
                'salary'=> 'required',
                'desigination'=> 'required',             
                'dob'=> 'required',
                'address'=> 'required'
        ])->validate();
        
        // validator
        

            $Employee = new employee;
            $Employee->name=$req['name'];
            $Employee->email=$req['email'];
            $Employee->password=$req['password'];
            $Employee->salary=$req['salary'];
            $Employee->desigination=$req['desigination'];
            $Employee->address=$req['address'];
            $Employee->role=$req['role'];
            $Employee->dob=$req['dob'];
            $Employee->save();

         } 

           public function family(){
            return  view('family');
           } 
           public function family_p(request $req){
    
 $emp_id_g=$req['emp_id'];
            for( $i=1;$i<$req['add'];$i++){

            $Emp_fam = new emp_fam;
            $Emp_fam->emp_id=$emp_id_g;
            $Emp_fam->name=$req['name'.$i];
            $Emp_fam->age=$req['age'.$i];
            $Emp_fam->relation=$req['relation'.$i];
            $Emp_fam->employeed=$req['employed'.$i];
            $Emp_fam->save();
            }

return '1';
         } 


         public function education(){
            return  view('education');
           } 
           public function education_p(request $req){
    
 $emp_id_g=$req['emp_id'];
            for( $i=1;$i<$req['add'];$i++){

            $Emp_fam = new emp_edu;
            $Emp_fam->emp_id=$emp_id_g;
            $Emp_fam->edu_level=$req['edu_level'.$i];
            $Emp_fam->course_n=$req['course_n'.$i];
            $Emp_fam->place=$req['place'.$i];
            $Emp_fam->percent=$req['percent'.$i];
            $Emp_fam->save();
            }

return '1';
         } 

         public function experience(){
            return  view('experience');
           } 
           public function experience_p(request $req){
    
 $emp_id_g=$req['emp_id'];
            for( $i=1;$i<$req['add'];$i++){

            $Emp_exp = new emp_exp;
            $Emp_exp->emp_id=$emp_id_g;
            $Emp_exp->compony=$req['compony'.$i];
            $Emp_exp->last_salary=$req['last_salary'.$i];
            $Emp_exp->desigiation=$req['desigiation'.$i];
            $Emp_exp->experience=$req['experience'.$i];
            $Emp_exp->save();
            }

return '1';
         } 

         public function delete(){
            return  view('delete');
           } 
           public function delete_p(request $req){
            $res1=employee::where('id',$req['id'])->delete();
            $res2=emp_fam::where('emp_id',$req['id'])->delete();
            $res3=emp_exp::where('emp_id',$req['id'])->delete();
            $res4=emp_edu::where('emp_id',$req['id'])->delete();
      
return '1';
         } 

         public function s_update(){
            $emp = employee::find( Session::get('id'))->get();
                $data = compact('emp');

                // echo $emp[0]->name;


            return  view('s_update')->with($data);
           } 
           public function s_update_p(request $req){
            $emp = employee::find(1);
 
            $emp->dob = $req['dob'];
            $emp->address = $req['address'];
             
            $emp->save();
            
            
      
return '1';
         } 


         public function a_update(){
            return  view('a_update');
           } 


           public function a_update_g_p(request $req){
           
            $emp = employee::where('id',$req['id'] )->get();
            return   $emp;
         } 

         public function a_o_update(request $req){
            // echo "jhv";
            $emp = employee::find($req['myid']);
            if ($req['name']!='') {
              $emp->name=$req['name'];
            }
           
            if ($req['email']!='') { $emp->email=$req['email']; }
            if ($req['password']!='') { $emp->password=$req['password']; }
            if ($req['salary']!='') { $emp->salary=$req['salary']; }
            if ($req['desigination']!='') { $emp->desigination=$req['desigination']; }
            if ($req['address']!='') { $emp->address=$req['address']; }
            if ($req['role']!='') { $emp->role=$req['role']; }
            if ($req['dob']!='') { $emp->dob=$req['dob']; }
            $emp->save();
      
return '1';
         } 
         public function view(){
            // $emp = employee::find(1)->get();
            //     $data = compact('emp');

                // echo $employe[0]->name;
                $employe=employee::where('id', Session::get('id'))->get();
                $fams=emp_fam::where('emp_id', Session::get('id'))->get();
                $exps=emp_exp::where('emp_id', Session::get('id'))->get();
                $edus=emp_edu::where('emp_id', Session::get('id'))->get();
                $data = compact('employe','fams','exps','edus');  
            return  view('view')->with($data);
           } 

           public function goto_view(){
            return  view('goto_view');
           } 
           public function all_view($id){
            $employe=employee::where('id',$id)->get();
            $fams=emp_fam::where('emp_id',$id)->get();
            $exps=emp_exp::where('emp_id',$id)->get();
            $edus=emp_edu::where('emp_id',$id)->get();
            $data = compact('employe','fams','exps','edus');  
               if(sizeof($employe)==0){
echo "No Data Found";
               }else {
                  return  view('view')->with($data);
               }
            
           } 

           public function pdf($id){
            $employe=employee::where('id',$id)->get();
            $edus=emp_edu::where('emp_id',$id)->get();
            $data = compact('employe','edus'); 
            $pdf = Pdf::loadView('pdf',$data);
            return $pdf->stream();
           } 
           public function all_pdf(){
            return  view('all_pdf');
           } 

           public function error(){
            return  view('error');
           } 

           public function excel_export(){
            return Excel::download(new EmpExport, 'empexcel.xlsx');
           } 
           public function excel_import(){
            return  view('excel_import');
           } 

           public function excel_import_p(request $req){

      Excel::import(new EmpImport,$req->file('myfile'));
      return 1;
              }

}
