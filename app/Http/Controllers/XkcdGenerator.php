<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory;

class XkcdGenerator extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }


    /**
     * Responds to requests to GET /xkcd-generator
     */
    public function getCreate() {
        return view('XkcdGenerator.show');
    }

    /**
     * Responds to requests to POST /xkcd-generator
     */
    public function postCreate(Request $request) {
      $this->validate(
         $request,
         ['number_of_words' => 'integer|min:1|max:9'],
         ['number_of_symbols' => 'integer|min:1|max:3']
      );
      $requests = $request->all();
      #echo implode('<p>', $requests);
      $password_segments = array();
      $number_of_words = $requests["number_of_words"];
      $number_of_symbols = $requests["number_of_symbols"];
      $files = array("http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html",
                     "http://www.paulnoll.com/Books/Clear-English/words-03-04-hundred.html");
      $content = file_get_contents($files[0]) . file_get_contents($files[1]);
      preg_match_all("|<li>\s*\n\s*(\w*)\s*\n\s*</li>|U", $content, $out, PREG_PATTERN_ORDER);
      $word_list = $out[1];
      $symbol_list = array("!", "@", "#", "$", "%", "^", "&", "*");
      for ($i = 0; $i < $number_of_words; $i++) {
        $temp = $word_list[rand(0, sizeof($word_list)-1)];
        array_push($password_segments, $temp);
      }
      for ($i = 0; $i < $number_of_symbols; ++$i) {
        $password_segments[$number_of_words - 1] = $password_segments[$number_of_words - 1] . $symbol_list[rand(0,7)];
      }
      if (isset($requests['add_number'])) {
        $password_segments[$number_of_words - 1] = $password_segments[$number_of_words - 1] . rand(0,9);
      }
      $password = implode("-", $password_segments);
      return view('XkcdGenerator.show')->with('password', $password);
    }
}
