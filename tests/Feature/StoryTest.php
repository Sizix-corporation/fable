<?php

namespace Tests\Feature;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\User;
use App\Models\Story;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_user_creates_story()
    {
          

        $user=User::Factory()->create();
        $tag=Tag::Factory()->create();
        $response = $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
       
        $response1 = $this->postJson('/api/story',[
            'title'=>'App fable testing',
            'content'=>'gfhfdghduj',
            'user_id'=>$user->id,
            'tag_id'=>$tag->id
        ]);
        $response1->assertOk();
    }
}