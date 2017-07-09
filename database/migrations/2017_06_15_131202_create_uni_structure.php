<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(config('database.connections.mysql.database') == env('DB_DATABASE', 'forge')){
            
            Schema::create('records', function (Blueprint $table) {
                $table->string('EmplID');
                $table->string('RecDate');
                $table->string('RecTime');
                $table->string('OperDate');
                $table->string('oper_uni');
                $table->timestamps();
            }); 
        }
        DB::unprepared(Storage::get('migration.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables =['asignatura','asignaturalab','carreras','clases_creadas','dias','estado','estatus','horarios','horarios_creados','horarios_creados_linear','horas','profesores','reposiciones','tiposhorariosnombres','records'];
        foreach($tables as $table){
            Schema::dropIfExists($table);
        }
        
    }
}
