

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
    // console.log(formData.get('name'))
    if (formData.get('name')) { console.log(formData.get('name')) }
    goface = true
})


findInterval = setInterval(async () => {
    if (score > 0.9) {
        if (goface === true) {
            goface = false

            let counter = 0
            for (let i = 0; i < 11; i++) {
                formData = registerFormData()
                data = await postFormData('http://localhost:8081/register', formData)
                console.log(data)
                if (data.status == 'success') {
                    counter++
                }
            }

            alert('success capturing ' + counter + ' pictures')

        }
    }
}, config.refreshTime)