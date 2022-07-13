// Add event listener to the close button
document.getElementById("close-modal").addEventListener("click", closeModal);

// Add event listeners to all the images
var images = document.getElementsByClassName("deliverable-img");
for(let i = 0; i < images.length; i++) {
  let img = images[i];
  img.addEventListener("click", showImage);
}

/** Declare event handlers **/
// Close the modal
function closeModal(e) {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

// Open the modal and show an image
function showImage(e) {
  var img = e.currentTarget;
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("img01");
  modalImg.src = img.src;
  modal.style.display = "block";
}