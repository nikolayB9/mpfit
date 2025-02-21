<x-app-layout>
    <div class="mx-5 my-3">
        <a href="{{ route('main') }}">Главная</a>&nbsp;/
        <a href="{{ route('orders.index') }}">Заказы</a>&nbsp;/ {{ $order->id }}
    </div>

    <div class="mx-5 my-3 w-50">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <form action="{{ route('orders.update_status', $order->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group mb-2">
                            <label for="status" class="mb-1">Статус</label>
                            <select name="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    id="status">
                                @foreach($statuses as $status)
                                    <option
                                        value="{{ $status['value'] }}"
                                        @selected(old('status') == $status['value'] || $order->status->value == $status['value'])>
                                        {{ $status['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-sm float-right">Изменить статус</button>
                        </div>
                    </form>
                </li>
                <li class="list-group-item">ID: {{ $order->id }}</li>
                <li class="list-group-item">Дата создания: {{ $order->created_at }}</li>
                <li class="list-group-item">ФИО покупателя: {{ $order->full_user_name }}</li>
                <li class="list-group-item">
                    Товар: <a href="{{ route('products.show', $order->product->id) }}">{{ $order->product->name }}</a>
                </li>
                <li class="list-group-item">Цена товара: {{ $order->getProductPrice() }}</li>
                <li class="list-group-item">Количество товаров: {{ $order->qty }}</li>
                <li class="list-group-item">Итоговая цена: {{ $order->getTotalPrice() }}</li>
                <li class="list-group-item">Комментарий: {{ $order->comment }}</li>
            </ul>
        </div>
    </div>
</x-app-layout>
