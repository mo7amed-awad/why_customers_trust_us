//===== Back to top =====//
//Get the button
let mybutton = document.querySelector(".back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// loader 
document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".loader-bg")) {
    window.addEventListener("load", function () {
      const loader = document.querySelector(".loader-bg");
      loader.style.display = "flex";

      setTimeout(function () {
        loader.style.display = "none";
        document.body.style.visibility = "visible";

        AOS.init({
          once: true,
          duration: 1000,
        });
      }, 1500);
    });
  } else {
    AOS.init({
      once: true,
      duration: 1000,
    });
  }
});


//  pure counter
new PureCounter();


// tooltip
  document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});


// profile offcanvas
document.addEventListener("DOMContentLoaded", function () {
  let offcanvasElement = document.querySelector(".offcanvas");
  let offcanvasLinks = document.querySelectorAll(".offcanvas-body .nav-link");

  offcanvasLinks.forEach(link => {
    link.addEventListener("click", function (event) {
      let targetId = this.getAttribute("href");

      if (targetId.startsWith("#")) {
        event.preventDefault(); 
        let targetSection = document.querySelector(targetId);

        if (targetSection) {
          let sectionPosition = targetSection.offsetTop;

          let offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);
          if (offcanvasInstance) {
            offcanvasInstance.hide();
          }

          setTimeout(() => {
            window.scrollTo({
              top: sectionPosition,
              behavior: "smooth"
            });
          }, 300); 
        }
      }
    });
  });
});


  //  Initiate glightbox
  const glightbox = GLightbox({
    selector: ".glightbox",
  }); 



  // Toggle password 
document.addEventListener("DOMContentLoaded", function() {
  var togglePasswordElements = document.querySelectorAll(".toggle-password");

  togglePasswordElements.forEach(function(togglePasswordElement) {
      togglePasswordElement.addEventListener("click", function() {
          // Toggle the icon classes
          togglePasswordElement.classList.toggle("fa-eye");
          togglePasswordElement.classList.toggle("fa-eye-slash");

          // Find the associated input field
          var input = togglePasswordElement.parentElement.querySelector("input");

          // Toggle the input field type between password and text
          if (input.type === "password") {
              input.type = "text";
          } else {
              input.type = "password";
          }
      });
  });
});


  const buttons = document.querySelectorAll('.filters .btn');
    const filters = document.querySelector('.filters');

    buttons.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const target = document.querySelector(btn.dataset.target);
        if (target) {
          const offsetTop = target.offsetTop - 70;
          window.scrollTo({ top: offsetTop, behavior: 'smooth' });
        }

        const btnRect = btn.getBoundingClientRect();
        const containerRect = filters.getBoundingClientRect();

        if (btnRect.left < containerRect.left + 100) {
          filters.scrollBy({ left: -150, behavior: 'smooth' });
        } else if (btnRect.right > containerRect.right - 100) {
          filters.scrollBy({ left: 150, behavior: 'smooth' });
        }
      });
    });



  document.querySelectorAll('.test-card').forEach(card => {
        card.addEventListener('click', function(e) {
      
          if (e.target.classList.contains('form-check-input')) return;

          const checkbox = this.querySelector('.test-check');
          checkbox.checked = !checkbox.checked;
          this.classList.toggle('selected', checkbox.checked);
        });

        
        const checkbox = card.querySelector('.test-check');
        checkbox.addEventListener('change', function() {
          card.classList.toggle('selected', this.checked);
        });
      });



        const cards = document.querySelectorAll('.option-card');
    const radios = document.querySelectorAll('input[name="visitOption"]');

  
    radios.forEach(radio => {
      radio.addEventListener('change', () => {
        cards.forEach(card => {
          const slide = card.querySelector('.slide-section');
          if (card.contains(radio) && radio.checked) {
            card.classList.add('active');
            if (slide) slide.style.maxHeight = slide.scrollHeight + 'px';
          } else {
            card.classList.remove('active');
            if (slide) slide.style.maxHeight = '0';
          }
        });
      });
    });

  
    document.querySelectorAll('.quantity').forEach(qtyBox => {
      const countEl = qtyBox.querySelector('.qty');
      const increase = qtyBox.querySelector('.increase');
      const decrease = qtyBox.querySelector('.decrease');
      let count = 1;
      increase.addEventListener('click', () => {
        count++;
        countEl.textContent = count;
      });
      decrease.addEventListener('click', () => {
        if (count > 1) count--;
        countEl.textContent = count;
      });
    });