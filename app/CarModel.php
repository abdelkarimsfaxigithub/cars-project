<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
     /**
	 * The name of the table
	 * @var string
	 */
    protected $table = 'car_models';
    
    /**
	 * The fillable columns
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * Hidden columns
	 * @var array
	 */
	protected $hidden = ['created_at', 'updated_at'];
}
