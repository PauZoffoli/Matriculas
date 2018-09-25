<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();            
            $table->enum('parentesco', [ //Referente al parentesco con el apoderado
                'Padre', 
                'Madre',
                'Padrastro',
                'Madrastra',
                'Tutor/Tutura Legal',
                'Hermano/Hermana',
                'Tío/Tía',
                'Tío Abuelo/Tía Abuela',
                'Primo/Prima',
                'Abuelo/Abuela',
                'Bisabuelo/Bisabuela',
                'Tatarabuelo/Tatarabuela',
                'Otro'])->default('Padre');
            $table->string('otroParentesco', 40)->nullable($value = true);

            $table->tinyInteger('repitencias')->default(0);

          
             $table->enum('condicion', [
                'nuevo', 
                'antiguo'])->nullable($value = true)->default('nuevo');

            $table->enum('estado', [
                'MatriculaRevisadaPorApoderado',
                'Revisar', 
                'Revisado',
                'Aprobado',
                'Rechazado',
                'Otro'])->nullable($value = true)->default('Revisar');

            
            $table->enum('estadoCivilPadres', [
                'Solteros/as', 
                'Casados/as',
                'Viudo/a',
                'Divorciados/as',
                'Separados/as',
                'Convivientes'])->nullable($value = true)->default('Casados/as');

            $table->integer('idPersona')->unsigned()->unique();
            $table->foreign('idPersona')->references('id')->on('personas')->onDelete('cascade');

            $table->integer('idApoderado')->unsigned();
            $table->foreign('idApoderado')->references('id')->on('apoderados')->onDelete('cascade');

            $table->integer('idCursoActual')->unsigned()->nullable($value = true);
            $table->foreign('idCursoActual')->references('id')->on('cursos')->onDelete('cascade');

            $table->integer('idCursoPostu')->unsigned()->nullable($value = true);
            $table->foreign('idCursoPostu')->references('id')->on('cursos')->onDelete('cascade');

            $table->enum('paisDeOrigen', [
'Afganistán',
'Albania',
'Alemania',
'Andorra',
'Angola',
'Antigua y Barbuda',
'Arabia Saudita',
'Argelia',
'Argentina',
'Armenia',
'Australia',
'Austria',
'Azerbaiyán',
'Bahamas',
'Bangladés',
'Barbados',
'Baréin',
'Bélgica',
'Belice',
'Benín',
'Bielorrusia',
'Birmania',
'Bolivia',
'Bosnia y Herzegovina',
'Botsuana',
'Brasil',
'Brunéi',
'Bulgaria',
'Burkina Faso',
'Burundi',
'Bután',
'Cabo Verde',
'Camboya',
'Camerún',
'Canadá',
'Catar',
'Chad',
'Chile',
'China',
'Chipre',
'Ciudad del Vaticano',
'Colombia',
'Comoras',
'Corea del Norte',
'Corea del Sur',
'Costa de Marfil',
'Costa Rica',
'Croacia',
'Cuba',
'Dinamarca',
'Dominica',
'Ecuador',
'Egipto',
'El Salvador',
'Emiratos Árabes Unidos',
'Eritrea',
'Eslovaquia',
'Eslovenia',
'España',
'Estados Unidos',
'Estonia',
'Etiopía',
'Filipinas',
'Finlandia',
'Fiyi',
'Francia',
'Gabón',
'Gambia',
'Georgia',
'Ghana',
'Granada',
'Grecia',
'Guatemala',
'Guyana',
'Guinea',
'Guinea ecuatorial',
'Guinea-Bisáu',
'Haití',
'Honduras',
'Hungría',
'India',
'Indonesia',
'Irak',
'Irán',
'Irlanda',
'Islandia',
'Islas Marshall',
'Islas Salomón',
'Israel',
'Italia',
'Jamaica',
'Japón',
'Jordania',
'Kazajistán',
'Kenia',
'Kirguistán',
'Kiribati',
'Kuwait',
'Laos',
'Lesoto',
'Letonia',
'Líbano',
'Liberia',
'Libia',
'Liechtenstein',
'Lituania',
'Luxemburgo',
'Madagascar',
'Malasia',
'Malaui',
'Maldivas',
'Malí',
'Malta',
'Marruecos',
'Mauricio',
'Mauritania',
'México',
'Micronesia',
'Moldavia',
'Mónaco',
'Mongolia',
'Montenegro',
'Mozambique',
'Namibia',
'Nauru',
'Nepal',
'Nicaragua',
'Níger',
'Nigeria',
'Noruega',
'Nueva Zelanda',
'Omán',
'Países Bajos',
'Pakistán',
'Palaos',
'Panamá',
'Papúa Nueva Guinea',
'Paraguay',
'Perú',
'Polonia',
'Portugal',
'Reino Unido',
'República Centroafricana',
'República Checa',
'República de Macedonia',
'República del Congo',
'República Democrática del Congo',
'República Dominicana',
'República Sudafricana',
'Ruanda',
'Rumanía',
'Rusia',
'Samoa',
'San Cristóbal y Nieves',
'San Marino',
'San Vicente y las Granadinas',
'Santa Lucía',
'Santo Tomé y Príncipe',
'Senegal',
'Serbia',
'Seychelles',
'Sierra Leona',
'Singapur',
'Siria',
'Somalia',
'Sri Lanka',
'Suazilandia',
'Sudán',
'Sudán del Sur',
'Suecia',
'Suiza',
'Surinam',
'Tailandia',
'Tanzania',
'Tayikistán',
'Timor Oriental',
'Togo',
'Tonga',
'Trinidad y Tobago',
'Túnez',
'Turkmenistán',
'Turquía',
'Tuvalu',
'Ucrania',
'Uganda',
'Uruguay',
'Uzbekistán',
'Vanuatu',
'Venezuela',
'Vietnam',
'Yemen',
'Yibuti',
'Zambia',
'Zimbabue'

            ])->default('Chile');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('alumnos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
