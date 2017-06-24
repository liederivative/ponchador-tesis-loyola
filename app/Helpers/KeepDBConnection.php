<?php

if (!function_exists('keepConnection')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setDefaultDBConfig($name){
        config(['database.default'=>$name ]);
    }
    function setSessionDBConfig($name=false){
        $nameDB = ($name)?$name:session('selected_database');
        $config_dbs = config('database.connections');
        $array_db = config('database.connections.mysql');
        $array_db['database'] = $nameDB;
        $config_dbs[$nameDB] = $array_db;
        config(['database.connections'=>$config_dbs ]);
        setDefaultDBConfig($nameDB);
    }
    function keepConnection($self)
    {
        if(session('selected_database')){
            setSessionDBConfig();
//            $self->connection = session('selected_database');
        }
        
//        dd(request());
    }
    
}
