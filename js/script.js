document.querySelector('form').addEventListener('submit', function (event) {
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  if (password !== confirmPassword) {
    alert('Konfirmasi password tidak sama dengan password awal.');
    event.preventDefault(); // Menghentikan pengiriman formulir jika konfirmasi password tidak cocok
  }
});


