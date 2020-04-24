<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
//    public function update(User $user, Topic $topic)
//    {
//        // return $topic->user_id == $user->id;
//        return true;
//    }
//    public function update(User $user, Topic $topic)
//    {
//        //只允许作者编辑
//        return $topic->user_id == $user->id;
//    }
//    public function destroy(User $user, Topic $topic)
//    {//只允许作者删除
//        return $topic->user_id == $user->id;
//    }

    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }
}