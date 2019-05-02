<?php
/**
 * File name: UploadFileTest.php
 * Author: 杨庆贤
 * Description:
 * Others:
 * History:
 *   Date: 2019-05-02
 *   Author:
 *   Modification
 */

namespace OwnCloudeSDK\test;

use OwnCloudeSDK\Exception\UnlegalName;
use OwnCloudeSDK\Operate\UploadFile;

require_once __DIR__."/Base.php";
require_once __DIR__."/../Operate/UploadFile.php";

class UploadFileTest extends Base
{
    private $uploadFile="";
    private $fileName="UploadFile.html";
    protected function setUp(): void
    {
        $this->uploadFile=__DIR__."/".$this->fileName;
    }

    public function testUpload(){
        $config=$this->getConfigData();
        $uploadFile=new UploadFile(
            $config['domain'],
            $config['user_name'],
            $config['password'],
            $config['is_https']
        );
        try{
            $fileEnd=time();
            $uploadFile->upload("/",$this->uploadFile,$this->fileName.$fileEnd);// 测试上传唯一的文件
            $uploadFile->upload("/",$this->uploadFile,$this->fileName.$fileEnd,true);// 测试上传重名的文件
            $this->assertTrue(true);
        }catch (UnlegalName $e){
            $this->assertTrue(false,"文件名中存在非法字符");
        }
        catch (\Exception $e){
            $this->assertTrue(false,$this->getException($e));
        }
    }
}