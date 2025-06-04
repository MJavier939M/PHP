const toastLive = document.getElementById('liveToast');
if (toastLive) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLive);
  toastBootstrap.show();
}