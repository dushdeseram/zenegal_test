<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','company_id','email','phone' 
    ];
    protected $primaryKey = 'id';

    
    function get_all_employees_by_asc(){
        return DB::table('employees')->select('*')->orderBy("employees.id", "asc")->get();

    }
    function get_employee_by_employee_id($employee_id){
        return DB::table('employees')->select("*")->where('id', $employee_id)->first();

    }
}
