console.log("Script Loaded.");
$(document).ready(function() {
    //Function to handle the submission
    $("#new-journal").submit(function(event){
        event.preventDefault(); //Prevents the default submission

        //Serialize the form data
        var formData = $(this).serialize();

        //AJAX request to submit the form
        jQuery.ajax({
            url: 'process_new_journal.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    //If the server responds with success
                    alert("Journal added successfully!");
                    
                    //Clear the form
                    $('#journal_name').val('');
                    $('#description').val('');

                } else {
                    //Handle Errors:
                    alert("Error: " + data.error);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        //Debug:Populate Table
        console.log("Calling populateTable()");
        // Trigger the table update function
        populateTable();

    });
});