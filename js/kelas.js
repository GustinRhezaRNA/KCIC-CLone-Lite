document.addEventListener('DOMContentLoaded', () => {
  let radioBtns = document.querySelectorAll("input[name='kelas']");
  let ticketPriceElement = document.getElementById('ticket-price');

  let findSelected = () => {
    let selected = document.querySelector("input[name='kelas']:checked").value;
    console.log(selected);
    if (selected == 1) {
      ticketPriceElement.textContent = 'Rp. 300.000';
    } else if (selected == 2) {
      ticketPriceElement.textContent = 'Rp. 450.000';
    } else if (selected == 3) {
      ticketPriceElement.textContent = 'Rp. 600.000';
    }
  };

  radioBtns.forEach((radio) => {
    radio.addEventListener('change', findSelected);
  });
});

// document.getElementById('overlayButton').addEventListener('click', function() {
//   var overlay = document.getElementById('overlay');
//   overlay.style.display = 'block';
// });

// document.getElementById('close').addEventListener('click', function() {
//   this.style.display = 'none';
// });