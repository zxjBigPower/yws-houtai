<?php

$login_name = session('admin.name');
$admins = \Illuminate\Support\Facades\DB::table('admins')
    ->join('admin_roles','admins.role_id','=','admin_roles.id')
    ->where('admins.name',$login_name)
    ->select('admin_roles.perm_id')
    ->get()->toArray();
$perm=explode(',',$admins[0]->perm_id);
foreach ($perm as $val){
    $permi = DB::table('permissions')->where('id',$val)->get()->toArray();
    $perdata[] = $permi[0];
}
?>
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-admin">
            @foreach($perdata as $value)
                @if($value->uid==0)
                    <dt>{{ $value->name }}<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                    <dd>
                        <ul>
                            @foreach($perdata as $values)
                                @if($values->uid==$value->id)
                                    <li style="    width: 100%;"><a href=" {{url($values->route) }}" title="管理员列表">{{ $values->name }}</a></li>
                                @endif
                            @endforeach
                            <div style="clear: both"></div>
                        </ul>
                    </dd>
                @endif
            @endforeach
        </dl>

    </div>
</aside>
{{--菜单开启--}}
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>