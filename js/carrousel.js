function exibirPreview(event) {
  const input = event.target;
  const carousel = document.getElementById('imagemCarousel');
  carousel.innerHTML = ''; // Limpar carrossel

  if (input.files.length === 0) {
    carousel.style.display = 'none';
  } else {
    carousel.style.display = 'block';
  }

  for (const file of input.files) {
    const reader = new FileReader();

    reader.onload = function (e) {

      const imgElement = document.createElement('a');
      imgElement.href = "#";
      imgElement.classList.add('carousel-item');
      carousel.appendChild(imgElement);

      const img = document.createElement('img');
      img.classList.add('responsive-img');
      img.src = e.target.result;
      imgElement.appendChild(img);


      // Inicializar o carrossel do Materialize
      var elems = document.querySelectorAll('.carousel');
      var instances = M.Carousel.init(elems, { indicators: true });
    };

    reader.readAsDataURL(file);
  }
}