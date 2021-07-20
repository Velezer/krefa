
function findFormData() {
    let formData = new FormData()

    Webcam.snap(function (data_uri) {
        base64 = data_uri.replace(/^data\:image\/\w+\;base64\,/, '')
        blob = Webcam.base64DecToArr(base64) //uint8array
        imageFile = new File([blob], "image.jpg")

        formData.append('file', imageFile)

    })

    return formData
}


goface = true

findInterval = setInterval(async () => {
    if (score >= 0.8) {
        if (goface) {
            goface = false
            data = await postFormData('http://' + hostname + ':8000/find', findFormData())
            console.log(data)
            if (data.detail !== undefined) {
                alert(data.detail)
            }
            if (data.status == 'success') {
                data = data.data
                console.log(data.detected)
                arrayPerson = data.detected
                for (person of arrayPerson) {

                    if (person == "Unknown") {
                        alert('Anda belum terdaftar')
                        window.location.replace("http://" + hostname + ":8080/peserta/register")
                        break
                    } else {
                        rightPerson = confirm(person)
                        if (rightPerson) {
                            alert(`Welcome ${person}`)
                            break
                        }
                    }


                }
            }
            setTimeout(() => {
                goface = true
            }, 5000);
        }
    }
}, config.refreshTime)