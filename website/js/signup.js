(function () {
    'use strict'

    // Fetchs all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            //checks is submit is pressed
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    //stops form from submitting
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()