var today = new Date()
var curHr = today.getHours()

if (curHr < 12) {
  document.getElementById('welcome').innerHTML = 'Good Morning ';
} else if (curHr < 18) {
  document.getElementById('welcome').innerHTML = 'Good Afternoon ';
} else {
  document.getElementById('welcome').innerHTML = 'Good Evening ';
}
