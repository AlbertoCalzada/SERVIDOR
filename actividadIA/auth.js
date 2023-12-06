function signIn() {
  const username = $('#signin-username').val();
  const password = $('#signin-password').val();

  $.ajax({
    type: 'POST',
    url: '/signin',
    data: { username, password },
    success: function(response) {
      if (response === 'ok') {
        window.location.href = '/welcome?username=' + username;
      } else {
        $('#signin-error').text('El usuario o la contraseña son incorrectas');
        $('#signin-password').val('');
      }
    },
    error: function() {
      console.error('Error en la solicitud AJAX');
    }
  });
}

function signUp() {
  const username = $('#signup-username').val();
  const password = $('#signup-password').val();
  const confirmPassword = $('#confirm-password').val();

  if (password !== confirmPassword) {
    $('#signup-error').text('Las contraseñas no coinciden');
    return;
  }

  $.ajax({
    type: 'POST',
    url: '/signup',
    data: { username, password },
    success: function(response) {
      if (response === 'ok') {
        alert('Registro exitoso. Ahora puedes iniciar sesión.');
      } else {
        $('#signup-error').text('Error en el proceso de registro');
      }
    },
    error: function() {
      console.error('Error en la solicitud AJAX');
    }
  });
}
