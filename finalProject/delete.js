function deleteJob(jobID) {
  // AJAX request
  $.ajax({
    type: "POST",
    url: "deleteJob.php",
    data: { jobID: jobID },
    success: function(response) {
      if (response.trim() === 'success') {
        // Job deleted successfully
        alert('Job deleted successfully!');
        // Optionally, redirect or perform additional actions
      } else {
        // Deletion failed
        alert('Job deletion failed. Error: ' + response);
      }
    },
    error: function() {
      // Request failed
      alert('Failed to send the delete request.');
    }
  });
}
