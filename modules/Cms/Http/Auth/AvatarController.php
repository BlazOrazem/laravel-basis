<?php

namespace Cms\Http\Auth;

use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AvatarController
{
    /**
     * Avatar filename.
     *
     * @var string
     */
    protected static $avatarFileName;

    /**
     * Get avatar filename.
     *
     * @return string
     */
    public static function getAvatarFileName()
    {
        return self::$avatarFileName;
    }

    /**
     * Set avatar filename.
     *
     * @param string $avatarFileName
     */
    public static function setAvatarFileName($avatarFileName)
    {
        self::$avatarFileName = $avatarFileName;
    }

    /**
     * Create avatar image from uploaded file.
     *
     * @param UploadedFile $file
     * @return string
     */
    public static function makeAvatarFromFile(UploadedFile $file)
    {
        $image = Image::make($file);

        self::setAvatarFileName(sha1(time() . $file->getClientOriginalName()));

        return self::saveAvatarFile($image);
    }

    /**
     * Create avatar image from given image URL.
     *
     * @param $avatarUrl
     * @return string
     */
    public static function makeAvatarFromUrl($avatarUrl)
    {
        $avatarUrl = fix_avatar_url($avatarUrl);

        $image = Image::make(file_get_contents($avatarUrl));

        self::setAvatarFileName(sha1(time() . $avatarUrl));

        return self::saveAvatarFile($image);
    }

    /**
     * Save avatar image file.
     *
     * @param $image
     * @return string
     */
    public static function saveAvatarFile($image)
    {
        $image->resize(config('login.avatar_width'), config('login.avatar_height'), function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg', 100);

        $filePath = config('login.avatar_path') . '/' . self::getAvatarFileName() . '.jpg';

        $image->save($filePath);

        return $filePath;
    }

    /**
     * Delete avatar image file.
     *
     * @param $avatarFileName
     * @return void
     */
    public static function deleteAvatarFile($avatarFileName = null)
    {
        unlink(config('login.avatar_path') . '/' . $avatarFileName);
    }


    public static function getAvatarImageUrl($avatarFileName, $width, $height)
    {
        $img = Image::cache(function($image) use ($avatarFileName, $width, $height) {
            return $image->make($avatarFileName)->resize($width, $height);
        });

        return $img;
    }
}
