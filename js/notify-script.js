
// for notification
var notification = document.querySelector('.notification');

if (notification) {
  setTimeout(function () {
    notification.classList.add('hidden', 'ease-out');
  }, 1800);
}