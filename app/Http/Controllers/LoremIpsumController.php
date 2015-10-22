<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremIpsumController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
     * Responds to requests to GET /lorem-ipsum
     */
    public function getCreate() {
        return view('LoremIpsum.show');
    }

    /**
     * Responds to requests to POST /lorem-ipsum
     */
    public function postCreate(Request $request) {
        $this->validate(
           $request,
           ['paragraphs' => 'integer|min:2|max:50']
      );
      $paragraphs = $request->input('paragraphs');
         return view('LoremIpsum.show')->with('paragraphs', $paragraphs);
    }
}
