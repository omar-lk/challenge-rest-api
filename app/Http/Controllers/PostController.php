<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\CreatePost;
use App\Http\Requests\DeletePost;
use App\Http\Requests\UpdatePost;
use App\Http\Traits\ResponseTrait;
use App\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    use ResponseTrait;

    public function index($id)
    {
       
     
        $result=Post::with('creator')->where('id',$id)->get();
       
        if(count($result) !=0)
        return $this->success('post',$result);   
        else
            return $this->failure('post not exist');
        

    }
    public function create(CreatePost $request)
    {
        $data = $request->all();
        $badWordExist = $this->badWordsValidate($data['content']);
        if ($badWordExist) {
            return $this->failure("you can not add content with bad word");
        }
        $result = Post::create(
            [
                'content' => $data['content'],
                'group_id' => $data['group_id'],
                'creator_id' => $data['user_id']
            ]
        );

        if ($result)
            return $this->success('post added with succes', null);
        else
            return $this->failure('post not  added');
    }

    public function update(UpdatePost $request)
    {
        $data = $request->all();

        //bad word validation
        $badWordExist = $this->badWordsValidate($data['content']);
        if ($badWordExist) {
            return $this->failure("you can not add content with bad word");
        }
        //

        //post owner validation
        if (!$this->isPostOwner($data['post_id'], $data['user_id'])) {
            return $this->failure('only post owner can edit or delete this post');
        }
        //
        $result = Post::where('id', $data['post_id'])
            ->update(['content' => $data['content']]);

        if ($result)
            return $this->success('post updated', null);
        else
            return $this->failure('post not  updated');
    }

    public function delete(DeletePost $request)
    {
        $data = $request->all();

        //post owner validation
        if (!$this->isPostOwner($data['post_id'], $data['user_id'])) {
            return $this->failure('only post owner can edit or delete this post');
        }
        //
        $result = Post::where('id', $data['post_id'])->delete();

        if ($result)
            return $this->success('post deleted', null);
    }


    public function badWordsValidate($content)
    {
        $words = array('bad_1', 'bad_2', 'bad_3');
        foreach ($words as $word) {
            // dd($word,Str::contains($content,$word));
            if (Str::contains($content, $word))
                return true;
        }
        return false;
    }

    public function getPostByGroup($groupId)
    {

        $group=Group::find($groupId);
        $result= Cache::remember('posts',72*60*60,function() use($group){
                  return  $group->posts()->latest()->get();
                }); 
       
        return $this->success('posts',$result); 

    }

    public function isPostOwner($post_id, $user_id)
    {
        return Post::where('id', $post_id)->where('creator_id', $user_id)->exists();
    }
}
