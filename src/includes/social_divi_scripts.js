document.addEventListener("DOMContentLoaded", function() {
  const starWrapper = document.getElementsByClassName(
    "social-divi-star-rating"
  )[0];
  const stars = Array.prototype.slice.call(
    starWrapper.getElementsByTagName("a")
  );

  // Register mouseenter listener for every star
  stars.forEach(function(star) {
    star.addEventListener("mouseenter", function(event) {
      socialDiviLightenUpStars(star.dataset["rating"]);
    });
  });

  // Lightens up the stars up and until a certain number
  function socialDiviLightenUpStars(numberOfStars) {
    stars.forEach(function(star) {
      const icon = star.getElementsByClassName("dashicons")[0];

      // Still in, so remove empty class and add filled
      if (star.dataset["rating"] <= numberOfStars) {
        icon.classList.add("dashicons-star-filled");
        icon.classList.remove("dashicons-star-empty");
        return;
      }

      // Not included in the 'amount' hovered, so remove filled, and add empty
      icon.classList.remove("dashicons-star-filled");
      icon.classList.add("dashicons-star-empty");
      return;
    });
  }
});
