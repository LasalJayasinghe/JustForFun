var pages = document.querySelectorAll('.page');
		var links = document.querySelectorAll('.nav a');

		for (var i = 0; i < links.length; i++) {
			links[i].addEventListener('click', function(e) {
				e.preventDefault();
				var target = this.getAttribute('href').replace('#', '');

				for (var j = 0; j < pages.length; j++) {
					pages[j].classList.remove('active');
				}

				document.getElementById(target).classList.add('active');

				for (var k = 0; k < links.length; k++) {
					links[k].classList.remove('active');
				}

				this.classList.add('active');
			});
		}