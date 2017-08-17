jQuery.each( [ "put", "delete" ], function( i, method ) {
  jQuery[ method ] = function( url, data, callback, type ) {
    if ( jQuery.isFunction( data ) ) {
      type = type || callback;
      callback = data;
      data = undefined;
    }

    return jQuery.ajax({
      url: url,
      type: method,
      dataType: type,
      data: data,
      success: callback
    });
  };
});

var headerAxios = {
  headers: {
    "token" : document.querySelector('#token').getAttribute('value'),
    'X-Requested-With': 'XMLHttpRequest'
  },
  auth: {
    username: 'janedoe',
    password: 's00pers3cret'
  },
};
$.ajaxSetup({
  headers: {
      'token': document.querySelector('#token').getAttribute('value')
  }
});