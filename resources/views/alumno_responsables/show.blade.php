@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumno Responsable
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('alumno_responsables.show_fields')
                    <a href="{!! route('alumnoResponsables.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
