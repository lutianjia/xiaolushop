<?php


namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class History_login extends Model
{
    protected $table = 'history_login';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $fillable = ['id', 'admin_id','username','ip','content','created_at', 'updated_at'];

    //写入信息
    public function insertIntoTable($data){
        History_login::create($data);
    }
}