<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\PngEncoder;
use Intervention\Image\ImageManager;

class AvatarService
{
    public function upload(
        UploadedFile $file,
        string $oldAvatar,
        int $size
    ): string {
        $manager = new ImageManager(new Driver);
        $image = $manager
            ->decode($file)
            ->cover(300, 300)
            ->encode(new PngEncoder);

        $newName = 'avatars/'.uniqid().'.png';

        Storage::disk('public')->put($newName, (string) $image);

        $this->delete($oldAvatar);

        return $newName;
    }

    protected function delete(string $oldAvatar)
    {
        if ($oldAvatar && ! str_starts_with($oldAvatar, 'http') && Storage::disk('public')->exists($oldAvatar)) {
            Storage::disk('public')->delete($oldAvatar);
        }
    }
}
