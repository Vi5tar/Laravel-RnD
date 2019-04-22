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
      $file = \Storage::get($this->creative->originalFile_Loc);
      dd($file);
      //get contents of uploaded file as a string
      $stringVersionOfFile = file_get_contents($file);
      //dd($stringVersionOfFile);

      //inline CSS
      $stringVersionOfFileCssInline = app('Emogrifier')->parse($file);
      //file_put_contents('creatives-inlinedCss/CssInlined-' . time() . '-' . $file->getClientOriginalName(), app('Emogrifier')->parse($stringVersionOfFile));
      //dd($modifiedFile);



      Storage::put('creatives-inlinedCss/CssInlined-' . time() . '-' . $file->getClientOriginalName());

      //stores file with inlinedCSS
      $file->storeAs('creatives-inlinedCss', 'CssInlined-' . time() . '-' . $file->getClientOriginalName());
    }
}
