

function registerFormData() {
    const formEl = document.querySelector("#form")
    const formData = new FormData(formEl)

    Webcam.snap(function (data_uri) {
        base64 = data_uri.replace(/^data\:image\/\w+\;base64\,/, '')
        blob = Webcam.base64DecToArr(base64) //uint8array
        imageFile = new File([blob], "image.jpeg")
        formData.append('file', imageFile)
    })

    return formData
}

let goface = false

const submitBtn = document.querySelector("#submit")
submitBtn.addEventListener('click', (e) => {
    e.preventDefault()
    const formEl = document.querySelector("#form")
    const formData = new FormData(formEl)
    if (formData.get('name')) { console.log(formData.get('name')) }
    goface = true
})


findInterval = setInterval(async () => {
    if (score > 0.9) {
        if (goface === true) {
            goface = false

            count = 0
            for (let i = 0; i < 9; i++) {
                data = await postFormData('http://' + hostname + ':8000/register', registerFormData())
                console.log(data)
                if (data.status == 'success') {
                    name = data.name
                    count++
                }
            }
            if (count > 0) { 
                alert("Sukses! Menambahkan " + count + " wajah " + name)
                window.location.replace("http://" + hostname + ":8080/presensi")
            } else {
                alert("Gagal mengambil data wajah, mohon ulangi")
            }

            goface = true
        }
    }
}, config.refreshTime)