<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Activities extends Model
{
    protected $fillable = [
    	'amount1',
    	'amount2',
    	'notes',
    	'type',
    	'saved_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'saved_at'];

    public function setSavedAtAttribute( $value )
    {

        if ( strlen($value) < 12 ) {

            $value = Carbon::createFromTimestamp( strtotime($value) );
        }

        $this->attributes['saved_at'] = $value;
    }
    //
}
