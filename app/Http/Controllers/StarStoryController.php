<?php

namespace App\Http\Controllers;

use App\Models\StarStory;
use App\Utils\HelperStory;
use Illuminate\Http\Request;
use App\Events\StarStoryEvent;
use Illuminate\Support\Facades\Auth;

class StarStoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
      $user_id=Auth::user()->id;
      if (HelperStory::isStarStory($id,$user_id)) {
          $getItems= StarStory::where('user_id',$user_id)->where('story_id',$id)->get('id'); 
          $response=StarStory::destroy($getItems);
      }else{
          $response= StarStory::create([
            'user_id'=>$user_id,
            'story_id'=>$id
          ]);
      }
       return response()->json($response);
    }
    
}