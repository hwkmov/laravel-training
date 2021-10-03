<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Pageview;

use Analytics;
use Spatie\Analytics\Period;

class UpdatePageview extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pageview:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update pageviews';

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
        $analyticsData = Analytics::fetchMostVisitedPages(Period::days(7));
        $pageviews = [];
        foreach($analyticsData->all() as $item)
        {
            $pageview =
            [
                'url' => $item['url'],
                'slug' => Str::afterLast($item['url'], '/'),
                'pagetitle' => $item['pageTitle'],
                'pageviews' => $item['pageViews'],
            ];
            $pageviews[] = $pageview;
        }
        DB::table('pageviews')->delete();
        DB::table('pageviews')->insert($pageviews);
        var_dump($pageviews);
        return 0;
    }
}
