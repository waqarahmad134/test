<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;

class AutocompleteController extends Controller
{
    //
    function index()
    {
     return view('autocomplete');
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = Cases::where('court_name', 'LIKE', "%{$query}%")->select('court_name')
      ->groupBy('court_name')->get();
      $output = '<ul class="dropdown-menu" style="display:block;">';
      foreach($data as $row)
      {
       $output .= '
       <p><a href="#" style="color:black">'.$row->court_name.'</a></p>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

}
