var APPLICATION = {};

APPLICATION.url = window.location.hostname + ':' + window.location.port;
APPLICATION.currentUrl = window.location.href;
APPLICATION.protocol = window.location.protocol;

APPLICATION.showModal = {               // init
  init: function() {
    $('.tilt').click(function() {
      fullPath = 'http://' + APPLICATION.url + '/get-description'; // бд
      $.ajax({
            url: fullPath,
            type: 'GET',
            data: {
              id: $(this).attr('id'),
            }, // id и csrf-token
            success: function(result) {
              $('#good-modal .modal-title').text(result.title);
              $('#good-modal .modal-body>p').text(result.description);
              $('.modal-footer .btn-success').attr('data-id', result.id);
            },
          }
      );
    });
  },
};
APPLICATION.showModal.init();
/////////////////////////////
APPLICATION.addToCart = {
  init: function() {
    $('#good-modal .btn-success').click(function() {
      console.log($(this).attr('data-id'));
      fullPath = 'http://' + APPLICATION.url + '/add-to-cart';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {
              id: $(this).attr('data-id'),
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(result) {
              console.log(result);
              $('#success-modal').modal('toggle');
              $('#success-modal .modal-content p').
                  text('Вы успешно добавили ' + result.good.title + ' в корзину!');
              $('span.badge').text(result.good_count_in_cart);
            },
          }
      );
    });
  },
};
APPLICATION.addToCart.init();
//////////////////////////////////
APPLICATION.openCart = {
  init: function() {
    $('li[data-target="#cart-modal"]').click(function() {
      fullPath = 'http://' + APPLICATION.url + '/show-cart';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function(result) {
              $('#cart-modal .modal-body p').text('Ваши товары:');
              $('#cart-modal .modal-body p').append('<ul>');
              console.log(result);
              $.each(result, function(key, value) {
                console.log(value);
                $('#cart-modal .modal-body p').
                    append('<li>' + value.title + ' ' + value.price + ' руб.' +
                        ' - ' + value.cnt + 'шт.</li>');
              });
              $('#cart-modal .modal-body p').append('</ul>');
            },
          }
      );
    });
  },
};
APPLICATION.openCart.init();
/////////////////////////////////
APPLICATION.sendOrder = {
  init: function() {
    $('#cart-modal-step-2 .btn-success').click(function() {
      fullPath = 'http://' + APPLICATION.url + '/send-order';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              name: $('#usr').val(),
              email: $('#email').val(),
              social: $('#social').val(),
            },
            success: function(result) {
              location.reload();
            },
          }
      );
    });
  },
};
APPLICATION.sendOrder.init();
///////////////////////////////////
APPLICATION.deleteCart = {
  init: function() {
    $('#cart-modal .btn-danger').click(function() {
      fullPath = 'http://' + APPLICATION.url + '/delete-cart';
      $.ajax({
            url: fullPath,
            type: 'POST',
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function(result) {
              location.reload();
            },
          }
      );
    });
  },
};
APPLICATION.deleteCart.init();
