<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public $items=
    [
        '1'=>'Item 1',
        '2'=>'Item 2',
        '3'=>'Item 3',
        '4'=>'Item 4',
        '5'=>'Item 5',
    ];
    public function displayData($id,$details=null)
    {
        return $this->items[$id];
    }
}
