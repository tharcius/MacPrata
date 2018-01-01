<div class="form-group col">
    <label for="productName[]">Produto/Serviço:</label>
    <select class="form-control select2 preco" required="" id="1" name="d[product][name]">
        <option selected="selected" value="">Selecione um produto...</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            <option value="{{ $product->value }}" id="product{{ $product->id }}" hidden="hidden">{{ $product->value }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col">
    <label for="productAmount[]">Quantidade</label>
    <input type="text" class="form-control" id="productAmount1" name="d[product][amount]" value="1">
</div>
<div class="form-group col">
    <label for="productValue[]">Valor</label>
    <input type="text" class="form-control" id="productValue1" name="d[product][value]">
</div>
