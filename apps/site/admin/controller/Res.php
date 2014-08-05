<?php
namespace apps\site\admin\controller;
use glosea\controller\AbstractAdmin;
class Res extends AbstractAdmin {
	
	protected $rest = true;
	
	function __construct($app, $request){
		$res = array(
			array(
				'id'   => '1',
				'name' => '商品',
				'code' => 'food',
				'icon' => 'glyphicon-leaf',
				'type' => 'catalog',
				'legend' => '',
				'url'  => '',
				'childs' => array(
					array(
						'id'   => '11',
						'name' => '商品',
						'code' => 'food',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.food',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '12',
						'name' => '分类',
						'code' => 'category',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.foodcate',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '13',
						'name' => '库存',
						'code' => 'stock',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.foodstock',
						'childs' => array(),
						'sort' => 0
					)
				),
				'sort' => 0
			),
			array(
				'id'   => '2',
				'name' => '订单',
				'code' => 'order',
				'icon' => 'glyphicon-list-alt',
				'type' => 'catalog',
				'legend' => '',
				'url'  => '',
				'childs' => array(
					array(
						'id'   => '21',
						'name' => '订单',
						'code' => 'order',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.order',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '22',
						'name' => '配送管理',
						'code' => 'batch',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.batch',
						'childs' => array(),
						'sort' => 0
					)
				),
				'sort' => 0
			),
			array(
				'id'   => '9',
				'name' => '内容',
				'code' => 'content',
				'icon' => 'glyphicon-file',
				'type' => 'catalog',
				'legend' => '',
				'url'  => '',
				'childs' => array(
					array(
						'id'   => '91',
						'name' => '文章',
						'code' => 'article',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '92',
						'name' => '分类',
						'code' => 'category',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '93',
						'name' => '页面',
						'code' => 'page',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'childs' => array(),
						'sort' => 0
					),array(
						'id'   => '94',
						'name' => '文件',
						'code' => 'file',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'childs' => array(),
						'sort' => 0
					)
				),
				'sort' => 0
			),
			array(
				'id'   => '10',
				'name' => '用户',
				'code' => 'user',
				'icon' => 'glyphicon-user',
				'type' => 'catalog',
				'legend' => '',
				'url'  => '',
				'childs' => array(
					array(
						'id'   => '101',
						'name' => '会员',
						'code' => 'member',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.member',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '105',
						'name' => '设备',
						'code' => 'device',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.device',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '102',
						'name' => '收货地址',
						'code' => 'inbox-address',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.inbox',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '103',
						'name' => '用户',
						'code' => 'user',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'childs' => array(),
						'sort' => 0
					),array(
						'id'   => '104',
						'name' => '角色',
						'code' => 'role',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'childs' => array(),
						'sort' => 0
					)
				),
				'sort' => 0
			),
			array(
				'id'   => '11',
				'name' => '系统',
				'code' => 'system',
				'icon' => 'glyphicon-cog',
				'type' => 'catalog',
				'legend' => '',
				'url'  => '',
				'childs' => array(
					array(
						'id'   => '111',
						'name' => '区域',
						'code' => 'area',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'action' => '/order/admin.area',
						'childs' => array(),
						'sort' => 0
					),
					array(
						'id'   => '112',
						'name' => '参数',
						'code' => 'var',
						'icon' => 'glyphicon-file',
						'type' => 'catalog',
						'legend' => '',
						'url'  => '',
						'childs' => array(),
						'sort' => 0
					)
				),
				'sort' => 0
			),
			array(
				'id'   => '12',
				'name' => '注销',
				'code' => 'signout',
				'icon' => 'glyphicon-off',
				'type' => 'catalog',
				'legend' => '',
				'url'  => '',
				'childs' => array()
			)
	   );
	   echo json_encode($res);
	}
	
	public function get(){
		
	}
}
	