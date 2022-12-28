<?php
namespace App\Utils;
use App\Models\StarStory;

class HelperStory{
 
    public static function isStarStory(int | string $story_id,int $user_id):bool
    {
      $response= StarStory::where('user_id',$user_id)->where('story_id',$story_id)->get();
      return $response->count()>0 ? true:false;
    }
    
}