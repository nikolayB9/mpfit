<x-app-layout>
    <div class="mx-5 my-3">
        <a href="{{ route('main') }}">Главная</a>&nbsp;/
        <a href="{{ route('products.index') }}">Товары</a>&nbsp;/ {{ $product->name }}
    </div>

    <div class="mx-5 my-3">
        <a href="{{ route('products.edit', $product->id) }}"
           class="btn btn-sm btn-primary me-2">
            Редактировать
        </a>
        <!-- Button trigger modal delete product -->
        <button class="btn btn-danger btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#modal-delete-product{{ $product->id }}">
            Удалить
        </button>

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
    </div>

    <div class="mx-5 my-3">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ID: {{ $product->id }}</li>
                <li class="list-group-item">Название: {{ $product->name }}</li>
                <li class="list-group-item">Цена: {{ $product->price }}</li>
                <li class="list-group-item">Категория: {{ $product->category->title }}</li>
                <li class="list-group-item">Описание: {{ $product->description }}</li>
            </ul>
        </div>
    </div>
</x-app-layout>
