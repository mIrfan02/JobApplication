var transcriptFileInput = document.getElementById('transcript');
var transcriptDragDropArea = document.getElementById('drag-drop-areaa');
var transcriptFileNameElement = document.getElementById('file-nameee');

transcriptDragDropArea.addEventListener('dragover', function(e) {
  e.preventDefault();
  transcriptDragDropArea.classList.add('drag-over');
});

transcriptDragDropArea.addEventListener('dragleave', function() {
  transcriptDragDropArea.classList.remove('drag-over');
});

transcriptDragDropArea.addEventListener('drop', function(e) {
  e.preventDefault();
  transcriptDragDropArea.classList.remove('drag-over');
  var file = e.dataTransfer.files[0];
  handleTranscriptFile(file);
});

transcriptFileInput.addEventListener('change', function(e) {
  var file = e.target.files[0];
  handleTranscriptFile(file);
});

function handleTranscriptFile(file) {
  // Perform necessary actions with the file
  console.log('Selected transcript file:', file.name);
  transcriptFileNameElement.textContent = file.name;




}


var salarySlipFileInput = document.getElementById('salary-slip');
var salarySlipDragDropArea = document.getElementById('drag-drop-area-salary');
var salarySlipFileNameElement = document.getElementById('file-name-salary');

salarySlipDragDropArea.addEventListener('dragover', function(e) {
  e.preventDefault();
  salarySlipDragDropArea.classList.add('drag-over');
});

salarySlipDragDropArea.addEventListener('dragleave', function() {
  salarySlipDragDropArea.classList.remove('drag-over');
});

salarySlipDragDropArea.addEventListener('drop', function(e) {
  e.preventDefault();
  salarySlipDragDropArea.classList.remove('drag-over');
  var file = e.dataTransfer.files[0];
  handleSalarySlipFile(file);
});

salarySlipFileInput.addEventListener('change', function(e) {
  var file = e.target.files[0];
  handleSalarySlipFile(file);
});

function handleSalarySlipFile(file) {
  // Perform necessary actions with the file
  console.log('Selected salary slip file:', file.name);
  salarySlipFileNameElement.textContent = file.name;
}

var browseButtonSalary = document.getElementById('browse-button-salary');
browseButtonSalary.addEventListener('click', function(e) {
    e.preventDefault(); // Prevent form submission
    salarySlipFileInput.click();
  });

  var browseButtontranscript = document.getElementById('browse-button-transcript');
  browseButtontranscript.addEventListener('click', function(e) {
    e.preventDefault(); // Prevent form submission
    transcriptFileInput.click();
  });