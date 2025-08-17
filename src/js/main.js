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
		slidesPerView: 'auto',     // как на скрине — видно следующий слайд
		spaceBetween: 32,       // отступы между слайдами
		speed: 1000,            // скорость анимации
		loop: true,             // зациклен
		grabCursor: true,       // "рука" при наведении
		navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
		},
		pagination: {         // если нужна точечная пагинация
		  el: '.swiper-pagination',
		  clickable: true,
		},
		// breakpoints: {
		// 768: { slidesPerView: 2 },
		// 1024: { slidesPerView: 2.5 }
		// }
  	});
});