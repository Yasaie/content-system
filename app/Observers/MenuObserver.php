<?php

namespace App\Observers;

use App\Models\Menu;

class MenuObserver
{

	/**
	 * Handle the menu "creating" event
	 *
	 * @param Menu $menu
	 */
	public function creating(Menu $menu){
		$menu->type=Menu::TYPE;
	}

    /**
     * Handle the menu "created" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function created(Menu $menu)
    {
        //
    }

    /**
     * Handle the menu "updating" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function updating(Menu $menu){
		$menu->type=Menu::TYPE;
    }

    /**
     * Handle the menu "updated" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function updated(Menu $menu)
    {
        //
    }

    /**
     * Handle the menu "deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function deleted(Menu $menu)
    {
        //
    }

    /**
     * Handle the menu "restored" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function restored(Menu $menu)
    {
        //
    }

    /**
     * Handle the menu "force deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function forceDeleted(Menu $menu)
    {
        //
    }
}
