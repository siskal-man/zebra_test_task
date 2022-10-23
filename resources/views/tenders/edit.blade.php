@extends('layout.main')

@section('content')
    <form method="POST" action="{{ route("tenders.update", $tender->id) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="outer_code" class="form-label">Внешний код</label>
            <input type="text" class="form-control" name="outer_code" value="{{ $tender->outer_code }}">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Номер</label>
            <input type="text" class="form-control" name="number" value="{{ $tender->number }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select class="form-select" name="status">
                <option value="Закрыто">Закрыто</option>
                <option value="Отменено">Отменено</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" name="name" value="{{ $tender->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Изменить данные</button>
    </form>
@endsection
