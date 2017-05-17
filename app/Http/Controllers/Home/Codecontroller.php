<?php

namespace App\Http\Controllers\Home;

use App\ajaxModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Codecontroller extends Controller
{
    function virify(Request $request)
    {
        $length = 4;

        //根据字符的个数，得到画布的长度
        $width = 4 * 20 + 5;
        //得到画布的高度
        $height = 20 * 2;
        //创建画布
        $resouce = imagecreatetruecolor($width, $height);
        //分配颜色
        $white = imagecolorallocate($resouce, 255, 255, 255);
        $black = imagecolorallocate($resouce, 0, 0, 0);
        //为画布填充颜色
        Imagefill($resouce, 1, 1,$white);
        //定义一个 英文字符串
        $str = "ABCDFGHJKLMNP78QRSTUVWXY3435abcdefjhkmnpqrstuvwxy269";
        //定义中文字符串
        $strZh = "赵钱孙李周吴郑王冯陈楮卫蒋沈韩杨朱秦尤许何吕施张孔曹严华金魏陶姜戚谢邹喻柏水窦章云苏潘葛奚范彭郎鲁韦昌马苗凤花方俞任袁柳酆鲍史唐费廉岑薛雷贺倪汤乐于时傅皮卞齐康";
        //填充字符
        $font = 'static/fonts/googlefont.ttf';
        //判断是否采用中文
        if (false) {
            //中文验证码
            for ($i = 0; $i < $length; $i++) {
                $code[$i] = mb_substr($strZh, mt_rand(0, mb_strlen($strZh, 'utf-8') - 1), 1, 'utf-8');
                imagettftext($resouce, 20, mt_rand(-20, 20), $i * 20 + 10, $height / 2 + 10, $black,$font, $code[$i]);
            }
        } else {
            //英文字符验证码
            //循环输出字符
            for ($i = 0; $i < $length; $i++) {
                //随机得到字符
                $code[$i] = $str{mt_rand(0, strlen($str) - 1)};
                imagettftext($resouce, 20, mt_rand(-20, 20), $i * 20, 25, $black, $font, $code[$i]);
            }
        }
        //保存数据到session中
        $request->session()->put('resgister.code',strtolower(implode($code))) ;
        //绘制杂点
        for ($i = 0; $i < 50; $i++) {
            //随机颜色
            $color = imagecolorallocate($resouce, mt_rand(0, 155), mt_rand(0, 155), mt_rand(0, 155));
            //绘制点
            imagesetpixel($resouce, mt_rand(0, $width), mt_rand(0, $height), $color);
        }
        //绘制杂线
        for ($i = 0; $i < 5; $i++) {
            //随机颜色
            $color = imagecolorallocate($resouce, mt_rand(0, 155), mt_rand(0, 155), mt_rand(0, 155));
            //绘制点
            imageline($resouce, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $color);
        }
        //输出画布
        header('Content-type:image/jpeg');
        imagejpeg($resouce);
    }

    //验证验证码
    public function pcode(Request $request)
    {
        $reponse = new ajaxModel();
        $code = $request->session()->get('resgister.code');
        $pcode = $request->pcode;
        if($code==$pcode){
            $reponse->msg = '验证码正确';
            $reponse->status = 200;
            return $reponse->tojson();
        }else{
            $reponse->msg = '验证码错误';
            $reponse->status = 400;
            return $reponse->tojson();
        }
        //dd($code,$pcode);
    }
}