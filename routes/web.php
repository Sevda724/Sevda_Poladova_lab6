<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
	DB:: insert("insert into Students(name, date_of_birth, GPA, advisor) values('Luydmila', '2001-12-11',3.6,'Zhangir Rayev')");
});

Route::get('/select', function(){
	$results = DB::select('select * from Students where id=?',[1]);
	foreach ($results as $Students) {
		echo "Name is: ".$Students->name;
		echo "<br>";
		echo "Date of birth is: ".$Students->date_of_birth;
		echo "<br>";
		echo "GPA: ".$Students->GPA;
		echo "<br>";
		echo "Advisor: ".$Students->advisor;
	}
});

Route::get('/update', function () {
	DB:: update('update Students set GPA = 4.0 where id=?',[2]);
});

Route::get('/delete', function () {
	DB:: delete('delete from Students where id=?',[3]);
});

Route::get('/select2', function(){
	$Students=Student::find(1);
		echo "Name is: ".$Students->name;
		echo "<br>";
		echo "Date of birth is: ".$Students->date_of_birth;
		echo "<br>";
		echo "GPA: ".$Students->GPA;
		echo "<br>";
		echo "Advisor: ".$Students->advisor;
});

Route::get('/insert2', function(){
	$Students=new Student;
	$Students->name="Aruzhan";
	$Students->date_of_birth="1986-11-26";
	$Students->GPA=3.4;
	$Students->advisor="Aigul";
	$Students->save();
});
//here i update date_of_birth, we also can update another values, for example name: $Students->name="Aidana"; 
//by this way:  $nameOfTable->nameOfColumn=value;
Route::get('/update2', function(){
	$Students=Student::find(4);
	//$Students->name="Aruzhan";
	$Students->date_of_birth="1996-11-26";
	//$Students->GPA=3.4;
	//$Students->advisor="Aigul";
	$Students->save();
});

Route::get('/delete2', function () {
	$Student=Student::find(2);
	$Student->delete();
});


