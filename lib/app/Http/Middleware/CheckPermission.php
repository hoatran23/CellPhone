<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use App\Models\Permission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {
        // ==> Bước 1
        // 1 Lấy tất cả các role (vai tro) của user thong qua role_id
        $listRoleOfUser = DB::table('hnl_user')
                            ->join('hnl_role_user', 'hnl_user.id', '=', 'hnl_role_user.user_id')
                            ->join('hnl_role', 'hnl_role_user.role_id', '=', 'hnl_role.id')
                            ->where('hnl_user.id', auth()->id())
                            ->select('hnl_role.*')
                            ->get()->pluck('id')->toArray();
        // dd($listRoleOfUser);
        
        // 2 Lấy tất cả các permission (quyen) của user thong qua permission_id
        $listPermissionOfUser = DB::table('hnl_role')
                            ->join('hnl_role_permission', 'hnl_role.id', '=', 'hnl_role_permission.role_id')
                            ->join('hnl_permission', 'hnl_permission.id', '=', 'hnl_role_permission.permission_id')
                            ->whereIn('hnl_role.id', $listRoleOfUser)
                            ->select('hnl_permission.*')
                            ->get()->pluck('id')->unique();
        // dd($listPermissionOfUser);
        // ==> Đã lấy được tất cả các quyền User Login vào hệ thống ==> Xong bước 1

        // ==> Bước 2
        // Lấy ra mã màn hình tương ứng để check phân quyền
        $checkPermission = Permission::where('name', $permission)->value('id');
        // dd(Permission::get());
        // Kiểm tra user được phép vào route này không
        if($listPermissionOfUser->contains($checkPermission)) {
            return $next($request);
        }
        return abort(401);
    }
}
