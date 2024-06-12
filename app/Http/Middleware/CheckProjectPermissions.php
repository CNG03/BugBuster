<?php

namespace App\Http\Middleware;

use App\Exceptions\CustomQueryException;
use App\Models\Project;
use App\Models\ProjectMember;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckProjectPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $project = $request->route('project');

        if ($user->role === 'ADMIN') {
            return $next($request);
        }

        $projectMember = ProjectMember::where('project_id', $project->id)
            ->where('user_id', $user->id)
            ->whereIn('role_in_project', $roles)
            ->exists();

        throw_if(!$projectMember, CustomQueryException::class, 'You do not have permission to perform this action.');

        return $next($request);
    }
}