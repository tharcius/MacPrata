<script>
  $("#date").mask("99/99/9999");
</script>

<script>
  $(document).ready(function () {
    var max = 10;
    var initial = 2;
    $('#add_field').click(function (e) {
      e.preventDefault();
      if (initial < max + 1) {
        $('#itens').append('<div class="row col-sm-12">\
                                    <div class="form-group col" id="itens">\
                                        <label>Produto/Serviço:</label>\
                                        <select class="form-control select2 preco" required="" id="' + initial + '" name="d[product][name]">\
                                        <option selected="selected" value="">Selecione um produto...</option>\
                                        @foreach($products as $product)\
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>\
                                            <option value="{{ $product->value }}" id="product{{ $product->id }}" hidden="hidden">{{ $product->value }}</option>\
                                        @endforeach\
                                        </select>\
                                    </div>\
                                    <div class="form-group col">\
                                        <label">Quantidade</label>\
                                        <input type="text" class="form-control" id="productAmount' + initial + '" name="d[product][amount]" value="1">\
                                    </div>\
                                    <div class="form-group col">\
                                        <label>Valor</label>\
                                        <input type="text" class="form-control" id="productValue' + initial + '" name="d[product][value]">\
                                    </div>\
                                    <a href="#" class="delete">Remover</a>\
                                </div>');
        initial++;
      }
    });

    $('#itens').on("click", ".delete", function (e) {
      e.preventDefault();
      $(this).parent('div').remove();
      initial--;
    });
  });
</script>

<script>
  $('.preco').on('change', function () {
    var num = $(this).attr('id');
    var plan = $("#product" + $(this).val()).val();
    $("input[id=productValue" + num + "]").val(plan);
    console.log("input[id=productValue" + num + "]");
    console.log("Num: " + num + ", Plan: " + plan);
  })
</script>
