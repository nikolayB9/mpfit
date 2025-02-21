<x-app-layout>
    <div class="mx-5 my-3">
        <a href="{{ route('main') }}">Главная</a>&nbsp;/
        <a href="{{ route('products.index') }}">Товары</a>&nbsp;/
        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>&nbsp;/ Редактировать
    </div>
    <div class="mx-5 my-3 w-50">
        <form action="{{ route('products.update') }}" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="name" class="mb-1">Название</label>
                    <input type="text"
                           class="form-control @error('name') 'is-invalid' @enderror"
                           name="name"
                           value="{{ old('name') ?? $product->name }}"
                           id="name"
                           required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price" class="mb-1">Цена</label>
                    <input type="number"
                           class="form-control @error('price') 'is-invalid' @enderror"
                           name="price"
                           value="{{ old('price') ?? $product->price }}"
                           id="price"
                           step="0.01"
                           min="0"
                           required>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="mb-1">Описание</label>
                    <textarea
                        class="form-control @error('description') 'is-invalid' @enderror"
                        name="description"
                        id="description"
                        rows="5">{{ old('description') ?? $product->description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="category_id" class="mb-1">Категория</label>
                    <select name="category_id"
                            class="form-select @error('category_id') 'is-invalid' @enderror"
                            id="category_id">
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                @selected(old('category_id') == $category->id || $product->category_id == $category->id)>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Редактировать</button>
            </div>
        </form>
    </div>
</x-app-layout>
