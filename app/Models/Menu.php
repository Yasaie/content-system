<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public const TYPE='menu';

    protected $table='nested';

    protected $fillable=['parent_id','title','label','url','order','type','published_at'];

	protected $casts=[
		'parent_id'=>'integer',
		'order'=>'integer',
		'published_at'=>'datetime',
	];

	public static function boot()
	{
		parent::boot();

		static::addGlobalScope('type',function(Builder $builder){
			$builder->where('type', '=', self::TYPE);
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

	public function children(){
		return $this->hasMany('App\Models\Menu','parent_id','id');
	}

	public function parent(){
		return $this->belongsTo('App\Models\Menu','parent_id','id');
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
						<form method='POST' action='".route('panel.menu.destroy',$item)."'>
							<input name='_token' type='hidden' value='".csrf_token()."'>
							
							<a class='btn btn-sm btn-info text-info' href='".route('panel.menu.edit',$item->id)."'>
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

	public function buildMainMenu($menu,$depth=null){
		$result = null;

		foreach ($menu as $item) {
			if($item->children->isNotEmpty()) {
				if(empty($depth)) {
                    $result.='<li class="nav-item dropdown">';
				    $result.='<a class="nav-link dropdown-toggle text-right" title="'.htmlentities($item->title).'" href="'.$item->url.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.htmlentities($item->label).'</a>';
                    $result.='<div class="dropdown-menu">';
                    $result.=$this->buildMainMenu($item->children,1);
                    $result.='</div>';
                    $result.='</li>';
				} else {
				    // next depth sub menu
                    $result.='<li class="nav-item dropdown">';
                    $result.='<a class="nav-link dropdown-toggle text-right" title="'.htmlentities($item->title).'" href="'.$item->url.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.htmlentities($item->label).'</a>';
                    $result.=$this->buildMainMenu($item->children,1);
                    $result.='</li>';
				}
			} else {
				if ($item->parent) {
                    $result.='<a class="dropdown-item text-right" title="'.htmlentities($item->title).'" href="'.$item->url.'">'.htmlentities($item->label).'</a>';
                    $result.=$this->buildMainMenu($item->children,1);
				} else {
                    $result.='
                        <li class="nav-item">
                            <a class="nav-link text-right" title="'.htmlentities($item->title).'" href="'.$item->url.'" aria-haspopup="true" aria-expanded="false">'.htmlentities($item->label).'</a>
                        </li>
                    ';
				}
			}
		}

		return $result;
	}

	//Getter for the HTML menu builder in main page
	public function getMainMenu($items){
		$htmlMenu=$this->buildMainMenu($items);

		if(!empty($htmlMenu)){
			return $htmlMenu;
		}
	}

}
