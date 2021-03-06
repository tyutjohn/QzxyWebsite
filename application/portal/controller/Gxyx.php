<?php
/**
 *      [Starsriver] (C)2014-2099.
 *      This is NOT a freeware, follows Apache2.0 licence
 *
 *      Author: 张宇
 *      Email:  starsriver@yahoo.com
 *      CreateDate:   2017-10-02
 *
 */
namespace app\portal\Controller;

use app\Base;
use app\Log;
use app\Chunk;
use app\Thread;
use app\common\controller\Template;
use think\Controller;

class Gxyx extends Controller{
	function _initialize() {
		new \app\Start();
	}
	
    public function main(){
        Log::visit("portal","gxyx","");
        $chunk = [
            'id'         =>   7,
            'name'       =>   '清泽心雨 - 国学研习',
            'template'   =>   'portal/gxyx/gxyx',
        ];
        $this->loader($chunk['id']);
        $this->assign([
            'title' => $chunk['name'],
            'base' => Base::baseinfo(),
        ]);

        return Template::view($chunk['template']);
    }

    public function loader($chunkid){
        $threadlist = Thread::loadlist([
            'top'=>7,
            'new'=>26,
            'start'=>27,
            'dictionary'=>28,
            'history'=>29,
            'websource'=>30,
            'civilize'=>31,
            'forum'=>32,
            'dispute'=>33,
            'cr'=>34
        ]);
        $this->assign([
            'threadlist' => $threadlist,
            'banners' => Chunk::loadbanner($chunkid),
        ]);
    }
}