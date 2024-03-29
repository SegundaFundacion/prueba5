@extends('app')

@section('content')
<section id="main-content">
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <div class="head-table">
                            <h4>Listado de Docentes<a href="/docentes/create" style="position: absolute; right: 30px" class="btn btn-default">Agregar Docente</a>
                            </h4>
                          </div>
                            <hr>
                              <thead>
                              <tr>
                                  <th> Departamento</th>
                                  <th> RUT</th>
                                  <th> Nombres</th>
                                  <th> Apellidos</th>
                                  <th></th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($docentes as $docente)
                              <tr>
                                  <td>{{ $docente->departamento->nombre }}</td>
                                  <td>{{ $docente->rut }}</td>
                                  <td>{{ $docente->nombres }}</td>
                                  <td>{{ $docente->apellidos }}</td>
                                  <td>{!! Html::link(route('docentes.show', $docente->id), 'Detalles', array('class' => 'btn btn-xs btn-success')) !!}</td>
                                  <td>{!! Html::link(route('docentes.edit', $docente->id), 'Modificar', array('class' => 'btn btn-xs btn-primary')) !!}</td>
                                  <td>
                                        {!! Form::open(array('route' => array('docentes.destroy', $docente->id), 'method' => 'DELETE')) !!}
                                        <button class="btn btn-xs btn-danger">Eliminar</button>
                                        {!! Form::close() !!}
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
              <p>
  @if(Session::has('message'))
    <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
</p>
              </section>
              </section>
<div class="page-header">
        
      </div>
      <p>
        
      </p>
      <p>
        
      </p>
      <p>
        
      </p>
      <p>
        
      </p>


      <div class="page-header">
@endsection

      
  </body>
</html>