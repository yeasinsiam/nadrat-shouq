<?php

namespace App\Admin\Form;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class RichFileField
{

    public static function registerTemporaryFileUploadRoute($url = 'temporary-store/media', $name = 'temporary-store-media')
    {
        Route::post($url,  function (Request $request) {

            $path = storage_path('tmp/uploads');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file = $request->file('file');

            $name = uniqid() . '_' . trim($file->getClientOriginalName());

            $file->move($path, $name);

            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        })->name($name);
    }





    public static function syncMedia($requestedMedia,  $model, $mediaModels, $collectionName = '')
    {
        if ($mediaModels &&  !$mediaModels instanceof EloquentCollection) {
            $mediaModels = collect([$mediaModels]);
        }

        $requestFilesCollection = collect($requestedMedia);

        // Deleting Media that not exist in request
        $requestFileNamesCollection = $requestFilesCollection->keys();
        $mediaModelsFileNameCollection  = $mediaModels ? $mediaModels->pluck('file_name') : collect([]);
        $deletableMediaModelsCollection = $mediaModelsFileNameCollection->diff($requestFileNamesCollection);
        if ($deletableMediaModelsCollection->isNotEmpty())
            $mediaModels->whereIn('file_name', $mediaModelsFileNameCollection->diff($requestFileNamesCollection)->toArray())->each->delete();



        $order_position = 1;
        foreach ($requestedMedia ?? [] as $file_name => $data) {

            $mediaModel = $mediaModels ? $mediaModels->first(fn ($item) => $item->file_name == $file_name) : null;
            $additional_fields = isset($data['additional_fields']) && !empty($data['additional_fields']) && is_array($data['additional_fields']) ?
                $data['additional_fields']
                : [];

            if (!$mediaModel) {
                // Adding new that not exist in mediaModels
                $mediaModel = $model->addMedia(storage_path('tmp/uploads/' . $file_name))
                    ->usingName($data['original_name'])
                    ->usingFileName($file_name)
                    ->withCustomProperties($additional_fields)->toMediaCollection($collectionName);
            } else {
                $mediaModel->name = $data['original_name'];

                // Sync additional data
                foreach ($additional_fields as $name => $value) {
                    $mediaModel->setCustomProperty($name, $value ?? '');
                }
            }


            $mediaModel->order_column = $order_position;
            $mediaModel->save();

            $order_position++;
        }
    }
}
