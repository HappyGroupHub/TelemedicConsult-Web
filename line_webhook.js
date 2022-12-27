function sendWebhook() {
    const url = 'http://127.0.0.1:5000/internal-webhook-for-telemedic-consult-web-and-linebot';
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    const messagePayload = JSON.stringify({
        "message": "Hello World"
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

sendWebhook();