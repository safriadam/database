<?php
/**
 * Created by Armadius.
 * User: Safri Adam
 * Date: 28/02/2017
 * Time: 11.16 PM
 */



//namespace App;
namespace App\Http\Model;

use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $fillable = array('username','password','email','fullname');

    protected $hidden = [
        'password', 'remember_token',
    ];

}


// class User extends Authenticatable
// {
//     use Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'name', 'email', 'password',
//     ];

//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];
// }


