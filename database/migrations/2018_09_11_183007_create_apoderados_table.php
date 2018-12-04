<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApoderadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoderados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->enum('nivelEducacional', [
            'Se desconoce',
            'Sin estudios', 
            'Pre-Kínder', 
            'Kínder',
            '1 ° Básico',
            '2 ° Básico',
            '3 ° Básico',
            '4 ° Básico',
            '5 ° Básico',
            '6 ° Básico',
            '7 ° Básico',
            '8 ° Básico',
            '1 ° Medio',
            '2 ° Medio',
            '3 ° Medio Científico-Humanista',
            '3 ° Medio Técnico-Profesional',
            '4 ° Medio Científico-Humanista',
            '4 ° Medio Técnico-Profesional',
            'Técnico Nivel Superior',
            'Técnico Nivel Superior Incompleto',
            'Profesional',
            'Bachiller',
            'Licenciatura',
            'Magíster',
            'Doctorado',
            'PostDoctorado'

            ])->default('Pre-Kínder')->nullable($value = true);

            $table->string('profesion')->nullable($value = true);

            $table->string('participacionCargo')->nullable($value = true);
            $table->integer('participacionAnio')->nullable($value = true);
            $table->string('participacionObservacion')->nullable($value = true);

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

            ])->default('Chile')->nullable($value = true);

        $table->integer('idPersona')->unsigned()->unique();
        $table->foreign('idPersona')->references('id')->on('personas');

        $table->string('estado', 45)->nullable();
         
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
        Schema::dropIfExists('apoderados');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
