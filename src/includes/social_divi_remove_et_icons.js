document.addEventListener("DOMContentLoaded", function() {
  const iconLists = Array.prototype.slice.call(
    document.getElementsByClassName("et-social-icons")
  );

  iconLists.forEach(function(list) {
    if (!list.classList.contains("social-divi-icons")) {
      list.remove();
    }
  });
});
