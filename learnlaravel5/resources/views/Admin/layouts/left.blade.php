@section('left')
	<div class="menu_dropdown bk_2">
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
				<!-- 	<li><a data-href="product-brand.html" data-title="品牌管理" href="javascript:void(0)">品牌管理</a></li> -->
					<li><a data-href="../admin/product/category" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
					<li><a data-href="../admin/product/lists" data-title="产品管理" href="javascript:void(0)">产品管理</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="../../admin/member/lists" data-title="会员列表" href="javascript:;">会员列表</a></li>
					<li><a data-href="../../admin/member/del" data-title="删除的会员" href="javascript:;">删除的会员</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="../../admin/rbac/role" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
					<li><a data-href="../../admin/rbac/permission" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>
					<li><a data-href="../../admin/rbac/admin_list" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-footer">
			<dt><i class="Hui-iconfont">&#xe64d;</i> 投资计划<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="../../admin/lc/uplan" data-title="U计划" href="javascript:void(0)">U计划</a></li>
					<li><a data-href="../../admin/lc/uxplan" data-title="优选计划" href="javascript:void(0)">优选计划</a></li>
					<li><a data-href="../../admin/lc/xplan" data-title="薪计划" href="javascript:void(0)">薪计划</a></li>
			</ul>
		</dd>
	</dl>	
</div>
@show