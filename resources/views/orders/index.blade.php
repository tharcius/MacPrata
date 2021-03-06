@extends('main.main')
@section('content')
    <section class="content">
        <div class="box-header">
            <h3 class="box-title">Controle de Produtos</h3>
        </div>
        <div class="box-body">
            <table id="produtos" class="table">
                <thead class="thead-inverse">
                <tr>
                    <th class="sorting">OS</th>
                    <th class="sorting">Cliente</th>
                    <th class="sorting">Data</th>
                    <th class="sorting">Valor</th>
                    <th class="text-center"">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td> {{ $order->id }} </td>
                        <td> {{ $order->person->name }} </td>
                        <td> {{ $order->date }} </td>
                        <td> {{ $order->total }} </td>
                        <td class="text-center">
                            <a href="/ordens/{{ $order->id }}" title="Exibir"><i class="fa fa-search" aria-hidden="true"></i></a>
                            <a href="/ordens/{{ $order->id }}/editar" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="/ordens/{{ $order->id }}/apagar" title="Apagar" onclick="return confirm('Deseja realmente apagar?')">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>

                        </td>
                    </tr>
                @empty
                    <td>Nenhum produto cadastrado</td>
                @endforelse
                </tbody>
            </table>
        </div>
        <div>
            <a class="btn btn-success" href="/ordens/novo" role="button">Nova Ordem de Serviço</a>
        </div>
    </section>
    @if(count($orders)>0)
        <script>
          $(function () {
            $('#produtos').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": true
            });
          });
        </script>
    @endif
@endsection