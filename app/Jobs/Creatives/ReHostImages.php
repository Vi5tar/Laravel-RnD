<?php

namespace App\Jobs\Creatives;

use \App\Creative;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReHostImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $creative;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Creative $creative)
    {
        $this->creative = $creative;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = \Storage::get($this->creative->processingFile_Loc);

        //get urls from img src attribute of submitted .html file
        $dom = new \DOMDocument;
        $dom->loadHTML($file);
        $images = $dom->getElementsByTagName('img');
        $imageUrls = [];

        foreach ($images as $image) {
          array_push($imageUrls, $image->getAttribute('src'));
        }

        //store images
        foreach ($imageUrls as $url) {
            $this->creative->addMediaFromUrl($url)->toMediaCollection();
        }

        $mediaItems = $this->creative->getMedia();

        //dd($mediaItems);

        for ($i=0; $i < $images->length; $i++) {
          $images[$i]->setAttribute('src', $mediaItems[$i]->getPath());
          //dd($images[$i]->getAttribute('src'));
          //dd($images);
          // code...
        }

        $fileWithUpdatedImgSrc = $dom->saveHTML();

        \Storage::put('creatives-updatedSrc/SrcUpated-' . str_replace("creatives-original/", "", $this->creative->originalFile_Loc), $fileWithUpdatedImgSrc);
        \Storage::put($this->creative->processingFile_Loc, $fileWithUpdatedImgSrc);
    }
}
