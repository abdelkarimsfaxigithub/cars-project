<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
	 * The name of the table
	 * @var string
	 */
    protected $table = 'cars';
    
    /**
	 * The fillable columns
	 * @var array
	 */
	protected $fillable = ['mark_id', 'model_id', 'name'];

	/**
	 * Hidden columns
	 * @var array
	 */
	protected $hidden = ['mark_id', 'model_id', 'created_at', 'updated_at'];

	/**
	 * Retrieve related mark
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function mark()
	{
		return $this->belongsTo('App\Mark', 'mark_id');
	}

	/**
	 * Retrieve related model
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function team()
	{
		return $this->belongsTo('App\CarModel', 'model_id');
	}
}
