<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Erecords;
use App\Irecords;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        
        
        $schedule->call(function () {
            
            $unis = array_keys( config('database.connections'));
            $codePhrase = 'ponche_';
            
            foreach($unis as $uniName){
                if(strpos($uniName, $codePhrase) === 0){
                    $irecords = new Irecords;
                    $erecords = new Erecords;
                    
                    $identifier = substr($uniName, strlen($codePhrase), strlen($uniName));
                    
                    
                    $internal = $irecords->all();
                    $internal = ($internal->isEmpty())?[]:$internal->toArray();
                    $erecords->setConnection($uniName); //'ponche_uni_intec');// 
                    $external = $erecords->where('EmplID','>','00000000')->get();
                    $external = $external->toArray();
//                    echo $internal;
//                    dd($internal);
                    

                    
                    $newInfo = array_diff(array_map('json_encode', $external), array_map('json_encode', $internal));
                    $newInfo = array_map(function($arr) use ($identifier){
                                                $arr = (array)json_decode($arr);
                                                return $arr + ['oper_uni' => $identifier];
                                            }, $newInfo);
                    
                    foreach($newInfo as $record){
                        $irecords->updateOrCreate($record);
                    }
                    
                }
            }
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
