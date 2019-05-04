<?php
/**
 * File name: File.php
 * Author: 杨庆贤
 * Description:
 * Others:
 * History:
 *   Date: 2019-05-01
 *   Author:
 *   Modification
 */

namespace OwnCloudeSDK\Operate;


class File
{
    public $filePath;// 文件路径
    public $fileType;// 文件类型
    public $createTime;// 创建时间
    public $fileName;// 文件名
    public $usedBytes=0;// 文件大小/目录已使用大小
    public $availableBytes=0;// 目录剩余大小
    public $isFolder=true;// 是否为文件夹
    public function toArray(){
        return array(
            'file_path'=>$this->filePath,
            'file_type'=>$this->fileType,
            'create_time'=>$this->createTime,
            'file_name'=>$this->fileName,
            'used_bytes'=>$this->usedBytes,
            'available_bytes'=>$this->availableBytes,
            'is_folder'=>$this->isFolder
        );
    }
}