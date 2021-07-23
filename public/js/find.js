
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
            if (data.status == 'success') {
                arrayPerson = data.data
                for (person of arrayPerson) {
                    if (person == "Unknown") {
                        alert('Anda belum terdaftar')
                        window.location.replace("http://" + hostname + ":8080/peserta/register")
                        break
                    } else {
                        // data = get data api/people/name/(:alpha)
                        // console.log(data) // show data as modal
                        if (confirm(person)) {
                            // data = await postFormData('http://' + hostname + ':8080/api/attendance/hadir', findFormData())
                            alert(`Welcome ${person}`)
                            break
                        }
                    }
                }
            }
            if (data.detail !== undefined) {
                if (data.detail != 'Wajah tidak terdeteksi') {
                    alert(data.detail)
                }
            }
            goface = true
        }
    }
}, config.refreshTime)