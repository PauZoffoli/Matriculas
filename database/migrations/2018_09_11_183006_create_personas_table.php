<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();

            $table->string('PNombre');
            $table->string('SNombre')->nullable($value = true);
            $table->string('TNombre')->nullable($value = true);
            $table->string('ApPat');
            $table->string('ApMat')->nullable($value = true);

            $table->integer('fonoFijo')->nullable($value = true);
            $table->integer('fonoCelu')->nullable($value = true);

            $table->integer('idUser')->unsigned()->nullable($value = true)->unique();
            $table->foreign('idUser')->references('id')->on('users');

            $table->string('rut')->nullable($value = true);

            /*$table->enum('tipoPersona', [
                'Apoderado', 
                'Alumno',
                'Revisor',
                'Secretariado',
                'Administrador',
                'Padre',
                'Madre',
                'PrimerContacto',
                'SegundoContacto',
                'Otro'])->default('Apoderado');*/

            $table->enum('genero', [
                'Mujer',
                'Hombre'])->default('Mujer')->nullable($value = true);

            $table->string('email')->nullable($value = true);

            $table->dateTime('fechaNacimiento')->nullable($value = true);
            $table->dateTime('fechaDefuncion')->nullable($value = true);

            $table->enum('estadoCivil', [
                'No Aplica', 
                'Se Desconoce', 
                'Soltero/a', 
                'Casado/a',
                'Viudo/a',
                'Divorciado/a',
                'Separado/a',
                'Conviviente'])->nullable($value = true)->default('Soltero/a')->nullable($value = true);

            $table->integer('idDireccion')->unsigned()->nullable($value = true);
            $table->foreign('idDireccion')->references('id')->on('direcciones');

            
            $table->enum('nivelEducacional', [
            'Se Desconoce',
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
        Schema::dropIfExists('personas');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
