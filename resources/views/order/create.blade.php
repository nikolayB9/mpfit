<x-app-layout>
    <div class="mx-5 my-3">
        <a href="{{ route('main') }}">Главная</a>&nbsp;/
        <a href="{{ route('orders.index') }}">Заказы</a>&nbsp;/ Добавить заказ
    </div>
    <div class="mx-5 my-3 w-50">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="full_user_name" class="mb-1">Фамилия Имя Отчество</label>
                    <input type="text"
                           class="form-control @error('full_user_name') is-invalid @enderror"
                           name="full_user_name"
                           value="{{ old('full_user_name') }}"
                           id="full_user_name"
                           required>
                    @error('full_user_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="product_id" class="mb-1">Товар</label>
                    <select name="product_id"
                            class="form-select @error('product_id') is-invalid @enderror"
                            id="product_id">
                        @foreach($products as $product)
                            <option
                                value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="qty" class="mb-1">Количество, штук</label>
                    <input type="number"
                           class="form-control @error('qty') is-invalid @enderror"
                           name="qty"
                           value="{{ old('qty') ?? 1 }}"
                           id="qty"
                           step="1"
                           min="1"
                           required>
                    @error('qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="comment" class="mb-1">Комментарий</label>
                    <textarea
                        class="form-control @error('comment') is-invalid @enderror"
                        name="comment"
                        id="comment"
                        rows="5">{{ old('comment') }}</textarea>
                    @error('comment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Добавить</button>
            </div>
        </form>
    </div>
</x-app-layout>
