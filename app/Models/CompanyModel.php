<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class CompanyModel extends Model
{
    use HasFactory;

    protected $table = 'companies';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','logo','website' 
    ];
    protected $primaryKey = 'id';

    
    function get_all_companies_by_asc(){
        return DB::table('companies')->select('*')->orderBy("companies.id", "asc")->get();

    }
    function get_company_by_company_id($company_id){
        return DB::table('companies')->select("*")->where('id', $company_id)->first();

    }
}
