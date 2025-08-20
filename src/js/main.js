document.addEventListener("DOMContentLoaded", function () {
    const burger = document.getElementById("burger");
    const menu = document.getElementById("menu");
	const menuLinks = document.querySelectorAll(".site-menu__list a");
    const body = document.body;

    burger.addEventListener("click", function () {
		this.classList.toggle("active");
		menu.classList.toggle("active");
        body.classList.toggle("lock");
	});

	menuLinks.forEach((link) => {
		link.addEventListener("click", function () {
			burger.classList.remove("active");
			menu.classList.remove("active");
            body.classList.remove("lock");
		});
	});


	const swiper = new Swiper('.slider', {
		slidesPerView: 'auto',
		spaceBetween: 32,
		speed: 1000,
		loop: true,
		grabCursor: true,
		navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
		},
		pagination: {
		  el: '.swiper-pagination',
		  clickable: true,
		},
  	});

	// button scroll to top
	const scrollToTop = document.getElementById("scrollToTop");

	window.addEventListener("scroll", function () {
		if(window.scrollY > 300) {
			scrollToTop.classList.add("visible");
		} else {
			scrollToTop.classList.remove("visible");
		}
	});

	scrollToTop.addEventListener("click", function () {
		window.scrollTo({
			top: 0
		});
	});
});