<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Story;
use App\Utils\HelperStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data= DB::table('stories')
            ->join('users','users.id','=','stories.user_id')
            ->join('tags','tags.id','=','stories.tag_id')
            ->select('stories.*','tags.name as tagName','users.name as userName')
            ->orderBy('stories.created_at','desc')
            ->paginate(6);
            
        $dataCollection=collect($data);

        collect($dataCollection['data'])->filter(function($val,$key){
            $val->isStarStory=HelperStory::isStarStory($val->id,Auth::user()->id);
            $val->star_stories_count=Story::where('id',$val->id)->withCount('star_stories')->get()[0]->star_stories_count;
            $date=strtotime($val->created_at);
            return $val->created_at= Carbon::parse($date)->locale('FR_fr')->diffForHumans() ;
        });
    
        return response()->json($dataCollection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response=$request->validate([
            'title'=>['string','required','max:70','min:8'],
            'content'=>['string','required','min:200'],
            'tag_id'=>['integer','required','gte:1'],
        ]);
        $response['user_id']=Auth::user()->id;
        Story::create($response);
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        return response()->json(['data'=>$story]);
    }
}