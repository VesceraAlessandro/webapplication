<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenze extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Stato', 'idUtenti'];
	
	
	/**
     * The attribute that is single assignable.
     *
     * @var string
     */
	protected $table = 'presenze';
	
	/**
     * The attribute that is single assignable.
     *
     * @var string
     */
	protected $primaryKey = 'idPresenze';
}
