

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Revisar Contrato Matricula
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       
       <form method="POST" action="/profile">
    @csrf
    ...
</form>
@endsection