<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','cat_id','tag_id','photourl','status'
    ];
	
	 
	public function Category(){
		
	 return $this->belongsTo(Category::class, 'cat_id');
	 
	}
	public function Tag(){
		
	 return $this->belongsTo(Tag::class, 'tag_id');
	 
	}

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}