<x-app-layout>
    <div class="mx-5 my-3">
        <a href="{{ route('main') }}">Главная</a>&nbsp;/ Заказы
    </div>
    <div class="mx-5 my-3">
        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            Добавить заказ
        </a>
    </div>
    <div class="mx-5 my-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Дата создания</th>
                <th scope="col">ФИО покупателя</th>
                <th scope="col">Статус</th>
                <th scope="col">Итоговая цена</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->full_user_name }}</td>
                    <td>{{ \App\Enums\Order\StatusEnum::getDescription($order->status) }}</td>
                    <td>{{ $order->getTotalPrice() }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}"
                           class="btn btn-sm btn-primary me-2">
                            Просмотр
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
