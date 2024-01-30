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
                console.log("Data Received:", data)

                //Clear existing table rows
                $('#journal-table tbody').empty();

                //Loop through the data and add rows to the table
                $.each(data, function(index, entry) {

                    //Debug: Process Entry
                    console.log("Processing entry: ", entry); // Log the received data to the console

                    $('#journal-table tbody').append(
                        '<tr>' +
                        '<th scope="row">' + (index + 1) + '</th>' +
                        '<td>' + entry.journal_name + '</td>' +
                        '<td>' + entry.description + '</td>' +
                        '</tr>'
                    );
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