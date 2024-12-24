<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de un post">
    </div>

    @if ($transactions->count())        
    <div class="card-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Fecha - Hora</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{$transaction->nombre}}</td>
                        <td>{{$transaction->correo}}</td>
                        <td>{{$transaction->monto}}</td>
                        <td>{{$transaction->estado}}</td>
                        <td>{{date('d-m-Y H:i', strtotime($transaction->fecha))}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.transactions.edit', $transaction)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.transactions.destroy', $transaction)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Desea borrar?')" class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $transactions->links() }}
    </div>
    @else
    <div class="card-body">
        <strong>No hay ningún registro ...</strong>
    </div>
    @endif

</div>