<?php declare(strict_types=1);

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Article $article)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->admin || $user->can_guest_post;
    }

    public function update(User $user, Article $article)
    {
        return $user->id === $article->submitted_by_user_id || $user->admin;
    }

    public function delete(User $user, Article $article)
    {
        return $user->id === $article->submitted_by_user_id || $user->admin;
    }

    public function restore(User $user, Article $article)
    {
        return $user->admin;
    }

    public function forceDelete(User $user, Article $article)
    {
        return $user->admin;
    }
}
