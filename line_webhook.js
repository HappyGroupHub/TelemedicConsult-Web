function sendWebhook(type, patient_id) {
    const config = require('./config.json');
    const url = config.Webhook_line.url + config.Webhook_line.base_extension;
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    const messagePayload = JSON.stringify({
        "type": type,
        "patient_id": patient_id
    });
    const requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: messagePayload,
        redirect: 'follow'
    };

    fetch(url, requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
}

sendWebhook("reservation", "A123456789");