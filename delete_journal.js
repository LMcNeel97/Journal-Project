function deleteJournal(journal_id) {
    //AJAX request to delete the journal entry
    jQuery.ajax({
        url: 'process_delete_journal.php',
        method: 'POST',
        data: { journal_id: journal_id },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                // if the server responds with success
                $('#deleted-toast').toast('show');
                populateTable(); //Refreshes table after successful delete event
            } else {
                // Error Handling:
                alert("Error: " + data.message);
            }
        },
        error: function(xhr, status, error){
            console.error(error);
        }
    });
}