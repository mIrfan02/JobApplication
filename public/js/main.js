var fileInput = document.getElementById('file-input');
var dragDropArea = document.getElementById('drag-drop-area');
var fileNameElement = document.getElementById('file-name');

dragDropArea.addEventListener('dragover', function(e) {
  e.preventDefault();
  dragDropArea.classList.add('drag-over');
});

dragDropArea.addEventListener('dragleave', function() {
  dragDropArea.classList.remove('drag-over');
});

dragDropArea.addEventListener('drop', function(e) {
  e.preventDefault();
  dragDropArea.classList.remove('drag-over');
  var file = e.dataTransfer.files[0];
  handleFile(file);
});

fileInput.addEventListener('change', function(e) {
  var file = e.target.files[0];
  handleFile(file);
});

function handleFile(file) {
  // Perform necessary actions with the file
  console.log('Selected file:', file.name);
  fileNameElement.textContent = file.name;
}

var browseButtonCV = document.getElementById('browse-button-cv');
browseButtonCV.addEventListener('click', function(e) {
  e.preventDefault(); // Prevent form submission
  fileInput.click();
});


var alertMessage=document.getElementById("alertMessage");
  alertMessage.setTimeout(function () {
      alertMessage.classList.add('hidden');
      alertMessage.classList.remove('show');
  }, 5000);


