<?php

namespace App\Http\UseCases\Media;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

final class MediaStoreUseCase
{
    /**
     * @param UploadedFile $file - загружаемый файл
     * @param Model $model - модель (Post, Article и т.д.)
     * @param string $type - тип файла ('video', 'image' и т.д.)
     * @param bool $isMain - основной файл для модели
     */
    public function execute(
        UploadedFile $file,
        Model $model,
        string $type = 'file',
        bool $isMain = false
    ): Media {
        $path = $file->store('media', 'public');

        $media = $model->medias()->create([
            'disk' => 'public',
            'path' => $path,
            'type' => $type,
            'size' => $file->getSize(),
            'is_main' => $isMain,
        ]);

        return $media;
    }
}
