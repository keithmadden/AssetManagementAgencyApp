window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createCustomerForm'
    //-------------------------------------------------------------------------
    var createBranchForm = document.getElementById('createBranchForm');
    if (createBranchForm !== null) {
        createBranchForm.addEventListener('submit', validateBranchForm);
    }

    function validateBranchForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createCustomerForm'
    //-------------------------------------------------------------------------
    var editBranchForm = document.getElementById('editBranchForm');
    if (editBranchForm !== null) {
        editBranchForm.addEventListener('submit', validateBranchForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteCustomer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteBranch');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this branch?")) {
            event.preventDefault();
        }
    }

};