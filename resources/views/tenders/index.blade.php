@extends('layout.main')

@section('content')
    <div class="row my-2">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Внешний код</th>
                        <th scope="col">Номер</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Название</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenders as $tender)
                        <tr>
                            <th scope="row">{{ $tender->outer_code }}</th>
                            <td>{{ $tender->number }}</td>
                            <td>{{ $tender->status }}</td>
                            <td>{{ $tender->name }}</td>
                            <td>
                                <a type="button" class="btn btn-success" href="{{ route('tenders.edit', $tender->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('tenders.destroy', $tender->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Удалить тендер" class="btn btn-danger far fa-trash-alt">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $tenders->withQueryString()->links() }}
@endsection
