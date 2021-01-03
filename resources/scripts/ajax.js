const btn = document.querySelector('#btn')
const form = document.querySelectorAll('#form > input[name]')

btn.addEventListener('click', event => {
    event.preventDefault()
    let user = {}
    
    form.forEach(valor => {
       
        user[valor.name] = valor.value

    })

    console.log(user)

})