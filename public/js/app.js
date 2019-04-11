const APPLICATION = {};

APPLICATION.url = window.location.hostname + ':' + window.location.port;
APPLICATION.currentUrl = window.location.href;
APPLICATION.protocol = window.location.protocol;

APPLICATION.showModal = {
  init: function() {
    $('.tilt').click(function() {
      let fullPath = 'http://' + APPLICATION.url + '/get-description';
      $.ajax({
            url: fullPath,
            type: 'GET',
            data: {
              id: $(this).attr('id'),
            },
            success: function(result) {
              $('#good-modal .modal-title').text(result.title);
              $('#good-modal .modal-body>p').text(result.description);
              $('#good-modal .modal-body>p').
                  append(`<hr><p>Стоимость: ${result.price} руб.</p>`);
              $('.modal-footer .btn-success').attr('data-id', result.id);
            },
          },
      );
    });
  },
};
APPLICATION.showModal.init();
/////////////////////////////
APPLICATION.addToCart = {
  init: function() {
    $('#good-modal .btn-success').click(function() {
      let fullPath = 'http://' + APPLICATION.url + '/add-to-cart';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {
              id: $(this).attr('data-id'),
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(result) {
              $('#success-modal').modal('toggle');
              $('#success-modal .modal-content p').
                  text(`
          Вы;
          успешно;
          добавили;
          ${result.good.title}
          в;
          корзину;
          !`);
              $('span.badge').text(result.good_count_in_cart);
            },
          },
      );
    });
  },
};
APPLICATION.addToCart.init();
//////////////////////////////////
APPLICATION.openCart = {
  init: function() {
    $('li[data-target="#cart-modal"]').click(function() {
      let fullPath = 'http://' + APPLICATION.url + '/show-cart';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function(result) {
              const p = $('#cart-modal .modal-body p');
              let sum = 0;
              p.text('Ваши товары:');
              p.append('<ul class="cart_list">');
              $.each(result, function(key, value) {
                sum = sum + value.price * value.cnt;
                $('#cart-modal .cart_list').
                    append(
                        `<li> ${value.title} по цене ${value.price} руб. – ${value.cnt} eд. </li>`);
              });
              p.append('</ul>');
              p.append(`<b>Итого: ${sum} руб.</b>`);
            },
          },
      )
      ;
    })
    ;
  },
}
;
APPLICATION.openCart.init();
/////////////////////////////////
APPLICATION.sendOrder = {
  init: function() {
    $('#cart-modal-step-2 .btn-success').click(function() {
      let fullPath = 'http://' + APPLICATION.url + '/send-order';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              name: $('#usr').val(),
              email: $('#email').val(),
              social: $('#social').val(),
            },
            success: function() {
              location.reload();
            },
          },
      );
    });
  },
};
APPLICATION.sendOrder.init();
///////////////////////////////////
APPLICATION.deleteCart = {
  init: function() {
    $('#cart-modal .btn-danger').click(function() {
      let fullPath = 'http://' + APPLICATION.url + '/delete-cart';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function() {
              location.reload();
            },
          },
      );
    });
  },
};
APPLICATION.deleteCart.init();
