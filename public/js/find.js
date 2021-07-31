
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

function attendFormData(idEvents, idPeople) {
    let formData = findFormData()


    formData.append('id_events', idEvents)
    formData.append('id_people', idPeople)
    

    return formData
}

goface = true

findInterval = setInterval(async () => {
    if (score >= 0.8 && goface === true) {
        goface = false
        data = await postFormData('http://' + hostname + ':8000/find', findFormData())

        console.log(data)
        if (data.status == 'success') {
            arrayPerson = data.data
            for (person of arrayPerson) {
                if (person.Name == "Unknown") {
                    alert('Anda belum terdaftar')
                    window.location.replace("http://" + hostname + ":8080/peserta/register")
                    break
                }
                // data = get data api/people/name/(:alpha)
                // console.log(data) // show data as modal
                if (confirm(person.Name)) {
                    // idEvents = 
                    // idPeople =
                    // formData = attendFormData(idEvents, idPeople)
                    // for (let i = 0; i < 5; i++) {
                    //     data = await postFormData('http://' + hostname + ':8080/api/attendance/hadir', formData)
                    //     if (data.status == 'success') {
                    //         alert(`Selamat datang ${person}`)
                    //         break
                    //     }
                    // }
                    // if (data.status != 'success') {
                    //     alert(`Gagal, mohon ulangi`)
                    //     break
                    // }
                    alert(`Welcome ${person.Name}`)
                    break
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
}, config.refreshTime)