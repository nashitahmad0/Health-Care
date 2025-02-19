
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('registration-form');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); 

            var name = form.elements['name'].value;
            var dob = form.elements['dob'].value;
            var gender = form.elements['gender'].value;
            var mobile = form.elements['mobile'].value;
            var address = form.elements['address'].value;
            var email = form.elements['email'].value;
            var password = form.elements['password'].value;
            form.submit();
        });
    });

    
