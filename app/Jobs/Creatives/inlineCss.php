<?php

namespace App\Jobs\Creatives;

use \App\Creative;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class inlineCss implements ShouldQueue
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
      //get contents of uploaded file as a string
      $file = \Storage::get($this->creative->processingFile_Loc);

      //inline CSS
      $fileWithInlinedCss = app('Emogrifier')->parse($file);

      //stores file with inlined CSS
      \Storage::put('creatives-inlinedCss/CssInlined-' . str_replace("creatives-processing/", "", $this->creative->processingFile_Loc), $fileWithInlinedCss);

      \Storage::put($this->creative->processingFile_Loc, $fileWithInlinedCss);
    }
}
