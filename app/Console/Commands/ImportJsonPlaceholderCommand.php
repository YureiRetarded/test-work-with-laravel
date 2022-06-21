<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\ImportDataClient;
use App\Models\Post;

class ImportJsonPlaceholderCommand extends Command
{
    protected $signature = 'import:jsonplaceholder';
    protected $description = "Get data from jsnoplaceholder";

    public function handle()
    {
        $import= new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        $data=json_decode($response->getBody()->getContents());
        foreach ($data as $item){
            Post::firstOrCreate(
                [
                    'title'=>$item->title
                ],
                [
                    'title'=>$item->title,
                    'post_content'=>$item->body,
                    'category_id'=>2,
                ]
            );   
        }
        dd('finish');
    }
}