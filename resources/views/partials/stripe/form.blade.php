<form action="{{ route('subscriptions.process_subscripton') }}" method="POST">
    @csrf
    <input class="form-control" name="coupon" placeholder="{{ __("Tienes un cupón?") }}">
    <input type="hidden" name="type" value="{{ $product['type'] }}">
    <hr />
    <stripe-form
        stripe_key="pk_test_tokeZeYzrwlSaPgQeossj9r600Acoq1vrq"
        name="{{ $product['name'] }}"
        amount="{{ $product['amount'] }}"
        description="{{ $product['description'] }}">
    </stripe-form>
</form>