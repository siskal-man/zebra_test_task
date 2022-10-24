@extends('layout.main')

@section('content')
    <?php 
        if (isset($test)) {
            echo $test;
        }
    ?>
    <form method="POST" action="{{ route("tenders.store") }}">
        @csrf
        <div class="mb-3">
            <label for="outer_code" class="form-label">Внешний код</label>
            <input type="text" class="form-control" name="outer_code" required>
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Номер</label>
            <input type="text" class="form-control" name="number" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select class="form-select" name="status">
                <option value="Открыто">Открыто</option>
                <option value="Закрыто">Закрыто</option>
                <option value="Отменено">Отменено</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать тендер</button>
    </form>
@endsection
