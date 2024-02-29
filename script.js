$(document).ready(function () {
    $("#contactForm").submit(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Disable the form elements while processing
        $("#name, #email, #message, #sendButton").prop("disabled", true);

        // Display the loading animation on the button
        $("#sendButton").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');

        // Serialize the form data
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "main.php", // Replace with the actual path to your PHP script
            data: formData,
            success: function (response) {
                if (response === "success") {
                    // Reset the form
                    $("#contactForm")[0].reset();
                    // Display a success message
                    $("#response").html("Message sent successfully.");
                } else {
                    // Display an error message
                    $("#response").html("Error: " + response);
                }

                // Re-enable the form elements and reset the button
                $("#name, #email, #message, #sendButton").prop("disabled", false);
                $("#sendButton").html("Send");
            },
            error: function (xhr, status, error) {
                // Display an error message
                $("#response").html("Error: " + error);

                // Re-enable the form elements and reset the button
                $("#name, #email, #message, #sendButton").prop("disabled", false);
                $("#sendButton").html("Send");
            }
        });
    });
});
