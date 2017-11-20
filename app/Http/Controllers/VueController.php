<?php
/**
 * Created by PhpStorm.
 * User: Faan Veldhuijsen
 * Date: 19-Nov-17
 * Time: 16:43
 */

namespace App\Http\Controllers;


class VueController extends Controller {
	
	public function index() {
		return view('Vue');
	}
}