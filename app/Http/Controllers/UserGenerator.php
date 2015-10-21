<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory;
#require_once '/path/to/Faker/src/autoload.php';

class UserGenerator extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }


    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        return view('UserGenerator.show');
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate(Request $request) {
      $this->validate(
         $request,
         ['users' => 'integer|min:2|max:50']
      );
      $faker = Factory::create();
      $requests = $request->all();
      $num = $requests['users'];
      $users = array();
      for ($i = 0; $i < $num; $i++) {
        $users[$i] = $faker->name;
        if (isset($requests['address'])) {
          $users[$i] = $users[$i] . '<p>' .$faker->address;
        }
        if (isset($requests['text'])) {
          $users[$i] = $users[$i] . '<p>' . $faker->text;
        }
      }
      $request->flash();
      return view('UserGenerator.show')->with('users', $users);
    }
}
