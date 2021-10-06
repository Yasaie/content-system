<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public const TYPE='category';

    protected $table='nested';

    protected $fillable=['parent_id','title','label','slug','order','type','published_at'];

	protected $casts=[
		'parent_id'=>'integer',
		'order'=>'integer',
		'published_at'=>'datetime',
	];

	public static function boot()
	{
		parent::boot();

		static::addGlobalScope('type',function(Builder $builder){
			$builder->where('type', '=', self::TYPE)
					->orderBy('nested.order','ASC');
		});
	}

	public function published(){
		return $this->published_at!==null;
	}

	public function notPublished(){
		return $this->published_at===null;
	}

	public function markAsPublished(){
		$this->forceFill(['published_at'=>Carbon::now()])->save();
		return $this;
	}

	public function markAsNotPublished(){
		$this->forceFill(['published_at'=>null])->save();
		return $this;
	}

    public function blogs()
    {
        return $this->morphedByMany('App\Models\Blog', 'nestable','nestedables','nested_id','nestable_id');
    }

	// Recursive function that builds the menu from an array or object of items
	// In a perfect world some parts of this function would be in a custom Macro or a View
	public function buildMenu($menu, $parentid = null)
	{
		$result = null;
		foreach ($menu as $item){
			if ($item->parent_id == $parentid) {
				$result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
				<div class='dd-handle nested-list-handle'>
					<span class='glyphicon glyphicon-move'></span>
					<span>{$item->label}</span>
				</div>
				<div class='row nested-list-content'>
					<div class='pull-right text-right m-r-5'>
						<form method='POST' action='".route('panel.category.destroy',$item)."'>
							<input name='_token' type='hidden' value='".csrf_token()."'>
							
							<a class='btn btn-sm btn-info text-info' href='".route('panel.category.edit',$item->id)."'>
								<span class='fa fa-edit'></span>
							</a>
							<button class='btn btn-sm text-danger btn-danger m-r-5 m-l-5' type='submit' rel='{$item->id}'>
								<span class='fa fa-trash'></span>
							</button>
							
						</form>
					</div>
				</div>
				"
				.$this->buildMenu($menu, $item->id)."</li>";
			}
		}
		return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
	}

	// Getter for the HTML menu builder
	public function getHTML($items)
	{
		return $this->buildMenu($items);
	}

}
