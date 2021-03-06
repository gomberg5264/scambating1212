<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /**
     * be explicit, yes means yes.
     * @var string
     */
    protected $table = 'banks';

    /**
     * columns that are fillable via the ::create()
     * method using normal eloquent setters
     * @var array
     */
    protected $fillable = [
        'name',
        'caption',
        'trolls',
        'settings'
    ];

    /**
     * casting of trolls and settings back to array
     * from json store in the mariadb column.
     * @var array
     */
    protected $casts = [
        'trolls' => 'array',
        'settings' => 'array'
    ];

    public function accounts(){
        return $this->hasMany(Account::class);
    }
}
