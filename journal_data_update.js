console.log("Script loaded.");
    //Function to fetch and populate the table with data (Globally Defined)
    function populateTable() {
        // AJAX request to fetch data from PHP file
        jQuery.ajax({
            url: 'process_journal_data_update.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {

                //Debug: Received Data
                if(debugMode) {
                    console.log("Data Received:", data)
                }
                //Clear existing table rows
                $('#journal-table tbody').empty();

                //Loop through the data and add rows to the table
                $.each(data, function(index, entry) {

                    //Debug: Process Entry
                    if (debugMode) {
                        console.log("Processing entry: ", entry); // Log the received data to the console
                    }

                    // Create new Row
                    var row = $('<tr>');

                    // Add Table cells for journal_name, description, and the delete button
                    row.append('<th scope="row">' + (index + 1) + '</th>');
                    row.append('<td>' + entry.journal_name + '</td>');
                    row.append('<td>' + entry.description + '</td>');

                    // Create delete button
                    var deleteButton = $('<button>', {
                        text: 'Delete',
                        class: 'btn btn-danger btn-sm', // Bootstrap button styling
                        data: { journal_id: entry.journal_id, journal_name: entry.journal_name }, // Store the journal_id
                        click: function() {
                            // Delete button event handling
                            var journal_id = $(this).data('journal_id');
                            var journal_name = $(this).data('journal_name');

                            // Confirm deletion with a dialog
                            if (window.confirm('Are you sure you wish to delete "' + journal_name + '"?')) {
                            deleteJournal(journal_id);
                            }
                        }
                    });

                    // Add the delete button to the row
                    row.append($('<td>').append(deleteButton));

                    // Add the row to the table body
                    $('#journal-table tbody').append(row);
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Ensures it is only called when the DOM is ready
    $(document).ready(function() {

    // Call the function to populate the table
    populateTable();
});