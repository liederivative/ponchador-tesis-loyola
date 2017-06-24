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
        DB::unprepared(Storage::get('migration.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables =['asignatura','asignaturalab','carreras','clases_creadas','dias','estado','estatus','horarios','horarios_creados','horarios_creados_linear','horas','profesores','reposiciones','tiposhorariosnombres'];
        foreach($tables as $table){
            Schema::dropIfExists($table);
        }
    }
}
