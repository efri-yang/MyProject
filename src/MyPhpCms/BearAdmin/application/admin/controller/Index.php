<?php
/**
 * 后台首页
 * @author yupoxiong <i@yufuping.com>
 * @version 1.0
 */

namespace app\admin\controller;

use app\api\controller\Api;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Parsedown;
use tools\Sysinfo;

class Index extends Base
{
    public function index()
    {
      
       
        $sysinfo  = new Sysinfo();
        $sys_info = [
            'lang'    => $sysinfo->getLang(),
            'browser' => $sysinfo->getBrowser(),
            'ip'      => $sysinfo->getIp(),
            'city'    => $sysinfo->getCity(),
            'os'      => $sysinfo->getOS(),
            'date'    => date('Y-m-d')
        ];

        $Parsedown = new Parsedown();

        $this->assign([
            'readme'=> $Parsedown->text(file_get_contents(ROOT_PATH.'README.md')),
            'sys'      => $sys_info,
        ]);
        return $this->fetch();
    }


    //萌萌哒的打赏功能
    public function reward()
    {
        $domain = $this->request->domain();
        $url = $domain.'/index/index/reward';
        $qrcode  = new QrCode($url);
        $qrcode
            ->setWriterByName('png')
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH)
            ->setLogoPath(ROOT_PATH.'public'.'/favicon-96x96.png');

        $qrcode->writeFile(ROOT_PATH.'public'.'/reward.png');
        $this->assign([
            'reward_qrcode'=>$domain.'/reward.png',
        ]);
        return $this->fetch();
    }
}