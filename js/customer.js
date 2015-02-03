window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var createCustomerForm = document.getElementById('createCustomerForm');
    if (createCustomerForm !== null) {
        createCustomerForm.addEventListener('submit', validateCustomerForm);
    }

    function validateCustomerForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var editCustomerForm = document.getElementById('editCustomerForm');
    if (editCustomerForm !== null) {
        editCustomerForm.addEventListener('submit', validateCustomerForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteCustomer');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this customer?")) {
            event.preventDefault();
        }
    }

};