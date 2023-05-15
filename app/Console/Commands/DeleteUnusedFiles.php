<?php

namespace App\Console\Commands;

use App\Models\Document;
use App\Models\Picture;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DeleteUnusedFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete unused files local storage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Deleting files');
        $images_to_delete = Picture::query()
            ->where([
            'curriculum_vitae_id' => null,
            'news_id' => null,
            'ugg_form_id' => null,
//            'user_id' => null,
            ])
            ->where('created_at', '<', Carbon::now()->subHours(24)->toDateTimeString())
            ->get();

        $documents_to_delete = Document::query()
            ->where([
            'curriculum_vitae_id' => null,
            'news_id' => null,
            'ugg_form_id' => null,
            'user_id' => null,
            ])
            ->where('created_at', '<', Carbon::now()->subHours(24)->toDateTimeString())
            ->get();

        if (isset($images_to_delete[0])) {
            foreach ($images_to_delete as $image) {
                $this->deleteFile($image, 'avatars');
            }
        }

        if (isset($documents_to_delete[0])) {
            foreach ($documents_to_delete as $document) {
                $this->deleteFile($document, 'documents');
            }
        }

        $this->info('Files deleted');

        return Command::SUCCESS;
    }

    private function deleteFile($file_to_remove, $file_type): void
    {
        $folder = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $file_type . DIRECTORY_SEPARATOR . $file_to_remove->folder);

        $file = $folder . DIRECTORY_SEPARATOR . $file_to_remove->filename;

        if (unlink($file) && rmdir($folder)) {
            $file_to_remove->delete();
        }
    }
}
