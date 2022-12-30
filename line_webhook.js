function sendWebhook(eventType, lineID, data) {
    const config = require('./config.json');
    const url = config.Webhook_line.url + config.Webhook_line.base_extension;
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    const messagePayload = JSON.stringify({
        "eventType": eventType,
        "lineID": lineID,
        data
    });
    console.log(messagePayload);
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

function sendReservationWebhook(lineID, patientName, appointmentID, doctorName, appointmentDate, appointmentTimePeriod) {
    let data = {
        patientName: patientName,
        appointment: {
            id: appointmentID,
            doctorName: doctorName,
            date: appointmentDate,
            timePeriod: appointmentTimePeriod
        }
    }
    sendWebhook("reservation", lineID, data);
}
