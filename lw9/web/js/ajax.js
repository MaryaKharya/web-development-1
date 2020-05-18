async function ajaxQuery() {
    let radios = document.getElementsByName('sex');
    resetErrorsOfFields();
    let sex = null;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            sex = radios[i].value;
            break;
        }
    }
    let fields = {
        'name': document.getElementById('name').value,
        'email': document.getElementById('email').value,
        'country': document.getElementById('country').value,
        'sex': sex,
        'message': document.getElementById('message').value
    };

    let response = await fetch('/src/action_ajax_form.php', {
        method: 'POST',
        body: JSON.stringify(fields)
    });

    if (response.ok) {
        let answer = await response.json();
        if (answer.length === 0) {
            let successMessage = document.getElementById('success_message');
            successMessage.style.opacity = '1';
            document.getElementById('form').reset();
        } else {
            for (field of answer) {
                let elem = document.getElementById(field);
                elem.style.borderColor = '#EE5252';
            }
        }
    } else {
        alert('Что-то пошло не так...');
    }
}

function resetErrorsOfFields() {
    let fields = document.querySelectorAll('.input_cell');
    for (field of fields) {
        field.style.borderColor = '#a6a6a6';
    }
}

function run() {
    addEventListener('submit', ajaxQuery);
}

window.onload = run;