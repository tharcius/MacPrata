@extends('main.main')
@section('content')
    <section class="box box-success with-border">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-body">
                    <div class="col-xs-4 col-lg-2 col-sm-4 col-md-2">
                        <a href="/admin/produtos/novo" class="btn btn-success bg-green-gradient">Novo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Controle de Produtos</h3>
                    </div>
                    <div class="box-body">
                        <table id="produtos" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="sorting">OS</th>
                                <th class="sorting">Cliente</th>
                                <th class="sorting">Data</th>
                                <th class="sorting">Valor</th>
                                <th class="text-center" width="40px">Ações</th>
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
                                        <a href="/admin/produtos/{{ $product->id }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="/admin/produtos/apagar/{{ $product->id }}"
                                           onclick="return confirm('Deseja realmente apagar o produto {{ $product->name }}?')">
                                            <span class="glyphicon glyphicon-trash"> </span>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <td>Nenhum produto cadastrado</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(count($products)>0)
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