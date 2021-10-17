<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Exception;
use Log;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    public $data=[];
    public $path='';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Will Generate Sitemap For Your Website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $fileName='sitemap.xml';
            $this->path=public_path(path: '/sitemap/');

            // ini_set(varname: "memory_limit", newvalue:"-1");
            // ignore_user_abort(value:true);
            
            if(file_exists(filename:$this->path.$fileName)){
                chmod($this->path,0777);
                chmod(filename:$this->path.$filename,mode:0777);
                rename(oldname:$this->path.$filename,newname:$this->path.'sitemap-old-'.date(format:'D-d-M-Y h-s').'.xml');
            }
            SitemapGenerator::create(urlToBeCrawled:'https://www.word-meaning.com')
            ->hasCrawled(function(Url $url){
            //    $priorityUrl =[
            //      'translate',
            //      'archive',
            //      'blog',
            //      'topic',
            //      'kb_article',
            //    ];

            //    if(
            //        $url->segment(index:1) ==$priorityUrl[0] ||
            //        $url->segment(index:1) ==$priorityUrl[1] ||
            //        $url->segment(index:1) ==$priorityUrl[2] ||
            //        $url->segment(index:1) ==$priorityUrl[3] ||
            //        $url->segment(index:1) ==$priorityUrl[4] 
            //    ){
                   $url->setPriority(priority:'1.0')
                   ->setLastModificationDate(Carbon::now());
            //    }else{
            //         $url->setPriority(priority:'0.8')
            //         ->setLastModificationDate(Carbon::now());
            //    }
               return $url;
            })->writeToFile(path:$this->path.$fileName);

            $sitemapUrl=public_path('sitemap/').$filename;
            function myCrul($url){
                $ch=curl_init($url);
                curl_setopt($ch, option:CURLOPT_HEADER,value:0);
                curl_exec($ch);
                $httpCode=curl_getinfo($ch, opt:CURLINFO_HTTP_CODE);
                curl_close($ch);
                return $httpCode;
            }

            $url="http://www.google.com/webmasters/sitemaps/ping?sitemap=".$sitemapUrl;
            $returnCode=myCrul($url);
            echo "<p>Google Sitemaps has been pinged ( return code: $returnCode)</p>";
            
            $url="http://www.bing.com/ping?siteMap=".$sitemapUrl;
            $returnCode=myCrul($url);
            echo "<p>Bing / MSN Sitemaps has been pinged ( return code: $returnCode)</p>";

            $url="http://submissions.ask.com/ping?sitemap=".$sitemapUrl;
            $returnCode=myCrul($url);
            echo "<p>Ask.com Sitemaps has been pinged ( return code: $returnCode)</p>";

        } catch (Exception $e) {
            Log::error($e); 
        }   
    }
}
