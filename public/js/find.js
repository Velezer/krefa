
function findFormData() {
    const formData = new FormData()

    Webcam.snap(function (data_uri) {
        base64 = data_uri.replace(/^data\:image\/\w+\;base64\,/, '')
        blob = Webcam.base64DecToArr(base64) //uint8array
        imageFile = new File([blob], "image.jpg")

        excludes = ['donald trump'] // input type hidden

        formData.append('file', imageFile)
        formData.append('excludes', excludes)

    })

    return formData
}


goface = true

findInterval = setInterval(async () => {
    if (score >= 0.9) {
        if (goface) {
            goface = false
            formData = findFormData()
            data = await postFormData('http://localhost:8081/find', formData)
            if (data.detected === "unknown") {
                alert('Anda belum terdaftar')
                window.location.replace("http://localhost:8080/face/register")
            }
            alert(data)
            setTimeout(() => {
                goface = true
            }, 5000);
        }
    }
}, config.refreshTime)