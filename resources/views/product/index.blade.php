<x-app-layout>
    <div class="mx-5 my-3">
        <a href="{{ route('main') }}">Главная</a>&nbsp;/ Товары
    </div>
    <div class="mx-5 my-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            Добавить товар
        </a>
    </div>
    <div class="mx-5 my-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Категория</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn btn-sm btn-primary me-2">
                            Редактировать
                        </a>
                        <!-- Button trigger modal delete product -->
                        <button class="btn btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#modal-delete-product{{ $product->id }}">
                            Удалить
                        </button>
                    </td>
                </tr>

                <!-- Modal delete product -->
                <div class="modal fade" id="modal-delete-product{{ $product->id }}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Удалить продукт
                                    "{{ $product->name }}" ?
                                </h5>
                            </div>

                            <form action="{{ route('products.destroy', $product->id) }}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">
                                        Отмена
                                    </button>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
