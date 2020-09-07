<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    /**
	 * The name of the table
	 * @var string
	 */
    protected $table = 'marks';
    
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
