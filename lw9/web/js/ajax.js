async function ajaxQuery() {
    const radios = document.getElementsByName('sex');
    let sex = null;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            sex = radios[i].value;
            break;
        }
    }
    const fields = {
        'name': document.getElementById('name').value,
        'email': document.getElementById('email').value,
        'country': document.getElementById('country').value,
        'sex': sex,
        'sms': document.getElementById('sms').value
    };

    const response = await fetch('http://localhost:8080/src/action_ajax_form.php', {
        method: 'POST',
        body: JSON.stringify(fields)
    });

    if (response.ok) {
        const answer = await response.json();
        console.log(answer);
    } else {
        console.log('Упс..')
    }
}

function run() {
    addEventListener('submit', ajaxQuery);
}
window.onload = run;
