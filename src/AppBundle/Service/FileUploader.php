<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 26.7.18
 * Time: 11:44
 */

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    public function __construct()
    {
    }

    public function upload(UploadedFile $file, $targetDirectory)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($targetDirectory, $fileName);

        return $fileName;
    }
}